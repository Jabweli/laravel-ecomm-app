@extends('layouts.app')


@section('content')


<div class="vh-90 mt-10 mb-20 d-flex justify-content-center align-items-center">
   <div class="col-md-6">
      <div class="borderdd border-3dd border-success"></div>
      <div class="carddd  bg-white shadowdd p-5">
         <div class="mb-4 text-center">
            <img src="{{asset('assets/imgs/failed.png')}}" alt="failed" style="width: 120px">
         </div>
         <div class="text-center">
            <h1>Order payment has failed !</h1>
            <p class="mb-20">Sorry, your payment could not be processed, please try again after some time!</p>
            <a href="{{url('/shop')}}" class="btn btn-outline-success">Continue shopping <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
   </div>
</div>
@endsection