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
               <div class="row">
                  <div class="col-lg-5">
                     <div class="login_wrap widget-taber-content p-10 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                        <div class="padding_eight_all bg-white">
                           <div class="heading_s1 mb-30">
                              <h3 class="mb-2">Login</h3>
                              <span>Sign in for a wonderful experience!</span>
                           </div>
                           <form method="POST" action="{{ route('login') }}">
                              @csrf

                              <div class="form-group">

                                 <input id="email" type="email" class="form-control" placeholder="Your Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                 @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="form-group">

                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                 @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="login_footer form-group">
                                 @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                       {{ __('Forgot Your Password?') }}
                                    </a>
                                 @endif

                              </div>
                              <div class="form-group">
                                 <button type="submit" class="btn btn-fill-out btn-block hover-up " name="login">{{ __('Login') }}</button>
                              </div>
                              <div class="text-muted"><span>Don't have an account yet?</span> <a href="{{route('register')}}">Sign up</a></div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-6">
                     <img src="{{asset('assets/imgs/login.png')}}">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>


@endsection
