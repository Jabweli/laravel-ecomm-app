@extends('layouts.app')

@section('content')


<main class="main">
   <div class="page-header breadcrumb-wrap">
      <div class="container">
      <div class="breadcrumb">
         <a href="/" rel="nofollow">Home</a>                    
         <span></span> Login
      </div>
      </div>
   </div>
   <section class="pt-50 pb-50">
      <div class="container">
         <div class="row">
            <div class="col-lg-10 m-auto">
               <div class="row align-items-center">
                  
                  <div class="col-lg-5">
                     <img src="{{asset('assets/imgs/login.png')}}">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-6">
                     <div class="login_wrap widget-taber-content p-10 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                        <div class="padding_eight_all bg-white">
                           <div class="heading_s1 mb-30">
                              <h3 class="mb-2">Reset Password</h3>
                              <span>Let's help you recover your password</span>
                           </div>
                           <form method="POST" action="{{ route('password.update') }}">
                              @csrf
                              <input type="hidden" name="token" value="{{ $token }}">

                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                                    value="{{ $email ?? old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>

                                    @error('email')
                                       <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                    name="password" placeholder="Password" required autocomplete="new-password">

                                    @error('password')
                                       <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" 
                                    name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                 </div>
                              </div>

                              <div class="row mb-0">
                                 <div class="col-md-12">
                                    <button type="submit" class="btn">
                                       {{ __('Reset Password') }}
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection
