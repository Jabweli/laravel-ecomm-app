@extends('layouts.app')

@section('content')
<main class="main">
   <div class="page-header breadcrumb-wrap">
      <div class="container">
            <div class="breadcrumb">
               <a href="/" rel="nofollow">Home</a>
               <span></span> Checkout
               <span></span> Make payment
            </div>
      </div>
   </div>
   <section class="mt-50 mb-50">
      <div class="container">
         <h3 class="text-center">PLEASE MAKE PAYMENT FOR YOUR ORDER</h3>
         <div class="row mt-20">
            <div class="col-12">
               @if (Cart::instance('cart')->count() > 0)  

                  <form action="{{ route('payment.pay') }}" method="POST">
                     @csrf
                     <div class="row mb-50">
                        {{-- <div class="col-lg-6 col-md-12">
                           @if (session()->has('removed'))
                              <h4 class="text-success">{{session('removed')}}</h4>
                           @endif
                           <div class="table-responsive">
                              <table class="table shopping-summery clean">
                                 <thead>
                                    <tr class="main-heading">
                                       <th scope="col">Image</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Price</th>
                                    </tr>
                                 </thead>
                                 <tbody> 
                                    @foreach (Cart::instance('cart')->content() as $item)                                  
                                       <tr>
                                          <td class="image">
                                             <img src="{{'storage/products/'.$item->model->image}}" alt="{{$item->model->image}}">
                                          </td>
                                          <td class="product-des">
                                             <h5 class="product-name">
                                                <a href="{{url('product/'.$item->model->slug)}}">
                                                   {{$item->name}}
                                                </a>
                                             </h5>
                                             <p class="font-xs">
                                                {{strlen($item->model->short_desc) > 40 ? substr($item->model->short_desc, 0, 40)."..." : $item->model->short_desc}}
                                             </p>
                                          </td>
                                          <td class="price" data-title="Price"><span>${{$item->price}} </span></td>
                                       </tr>
                                    @endforeach                            
                                 </tbody>
                              </table>
                           </div>
                        </div> --}}
   
                        <!--- Cart Totals -->
                        <div class="col-lg-6 col-md-12  mx-auto">
                           <div class="border p-md-4 p-30 border-radius cart-totals">
                              <div class="heading_s1 mb-3">
                                 <h5>Your Order Summary</h5>
                              </div>
                              <div class="table-responsive">
                                 <table class="table">
                                    <tbody>
                                       
                                       @if (Session::has('checkout')) 
                                          <tr>
                                             <td class="cart_total_label">Subtotal</td>
                                             <td class="cart_total_amount">
                                                <spannclass="font-lg fw-900 text-brand">${{Cart::subtotal()}}</span>
                                             </td>
                                          </tr>                                            
                                          <tr>
                                             <th>Shipping</th>
                                             <td colspan="2"><em>Free Shipping</em></td>
                                          </tr>
                                          <tr>
                                             <th>Tax</th>
                                             <td colspan="2"><em>${{Session::get('checkout')['tax']}}</em></td>
                                          </tr>
                                          <tr>
                                             <th><h5>Grand Total</h5></th>
                                             <td colspan="2" class="product-subtotal">                                               
                                                <span class="font-xl text-brand fw-900">${{Session::get('checkout')['total']}}</span>                                              
                                             </td>
                                          </tr>
                                       @endif
                                    </tbody>
                                 </table>
                              </div>
                              {{-- <a href="/checkout" class="btn "> <i class="fi-rs-box-alt mr-10"></i>
                                 Proceed To CheckOut
                              </a> --}}
                              <input type="image" src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/44_Yellow_CheckOut_Pill_Button.png" 
                              alt="Check out with PayPal" style="width: 250px; border: none; padding: 0px">
                              {{-- <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/44_Yellow_CheckOut_Pill_Button.png" alt="Check out with PayPal" /> --}}
                           </div>
                        </div>
                     </div>
                  </form>
               @endif
            </div>
         </div>
      </div>
   </section>
</main>
@endsection