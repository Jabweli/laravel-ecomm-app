<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class PayPalController extends Controller
{
   private $gateway;

   public function __construct()
   {
      $this->gateway = Omnipay::create('PayPal_Rest');
      $this->gateway->initialize([
         'clientId' => config('services.paypal.client_id'),
         'secret' => config('services.paypal.secret'),
         'testMode' => config('services.paypal.mode'), 
      ]);
   }

   public function pay(Request $request)
   {
      try{
         $paypal_amount = Session::get('checkout')['total'];
         $response = $this->gateway->purchase([
            'amount' => $paypal_amount,
            'currency' => 'USD',
            'returnUrl' => route('payment.success'),
            'cancelUrl' => route('payment.cancel'),
         ])->send();

         if ($response->isRedirect()) {
            return $response->redirect();
         }

         // Handle the case where the payment was not successful
         return response()->json(['error' => $response->getMessage()], 500);

      }catch(\Throwable $th){
         return $th->getMessage();
      }
   }


   public function success(Request $request)
   {
      if(!session()->has('checkout')){
         return redirect('cart');
      }
      if($request->input('paymentId') && $request->input('PayerID'))
      {
         $response = $this->gateway->completePurchase([
            'payerId' => $request->input('PayerID'),
            'transactionReference' => $request->input('paymentId'),
            'amount' => Session::get('checkout')['total'], // Match with the amount used during purchase
            'currency' => 'USD', // Match with the currency used during purchase 
         ])->send();

         if ($response->isSuccessful()) {
            $arr = $response->getData();
            
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = session()->get('order_id');
            $transaction->mode = "paypal";
            $transaction->status = "paid";
            $transaction->payment_id = $arr['id'];
            $transaction->payer_id = $arr['payer']['payer_info']['payer_id'];
            $transaction->payer_email = $arr['payer']['payer_info']['email'];
            $transaction->amount = $arr['transactions'][0]['amount']['total'];
            $transaction->currency = 'USD';
            $transaction->save();

            Cart::instance('cart')->destroy();
            session()->forget('checkout');

            return redirect()->route('thank-you');
         }else{
            return redirect()->route('payment.failed');
         }
      }
      else{
         return redirect()->route('payment.failed');
      }
   }


   public function cancel()
   {
      // Handle canceled payment
      $transaction = new Transaction();
      $transaction->user_id = Auth::user()->id;
      $transaction->order_id = session()->get('order_id');
      $transaction->mode = "paypal";
      $transaction->status = "cancelled";
      $transaction->save();

      Cart::instance('cart')->destroy();
      session()->forget('checkout');
      return redirect()->route('payment.cancelled');
   }

   public function paypal(){
      if(Session::has('checkout'))
      {
         return view('frontend.paypal');
      }
      else{
         return redirect('cart');
      }
   }
}
