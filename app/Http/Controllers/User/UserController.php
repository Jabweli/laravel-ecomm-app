<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
      return view('user.my-account');
   }

   public function dashboard(){
      return view('user.my-account');
   }

   public function orders(){
      return view('user.orders');
   }

   public function orderDetail($id){
      $order = Order::where('id', $id)->first();
      return view('user.order-detail', compact('order'));
   }

   public function inbox(){
      return view('user.inbox');
   }

   public function reviews(){
      return view('user.reviews');
   }

   public function savedItems(){
      return view('user.saved-items');
   }

   public function recentViews(){
      return view('user.recent-views');
   }

   public function trackOrder(){
      return view('user.track-order');
   }

   public function addressBook(){
      return view('user.address');
   }

   public function addressAdd(){
      return view('user.add-address');
   }

   public function accountDetail()
   {
      return view('user.details');
   }
}
