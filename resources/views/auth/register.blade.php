@extends('layouts.app')

@section('content')


<main class="main">
   <div class="page-header breadcrumb-wrap">
      <div class="container">
         <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>                    
            <span></span> Register
         </div>
      </div>
   </div>
   <section class="pt-50 pb-50">
      <div class="container">
         <div class="row">
            <div class="col-lg-10 m-auto">
               <div class="row">
                  <div class="col-lg-6">
                  <div class="login_wrap widget-taber-content p-10 background-white border-radius-5">
                        <div class="padding_eight_all bg-white">
                           <div class="heading_s1 mb-30">
                              <h3 class="mb-2">Create an Account</h3>
                              <span>Sign up today and enjoy a wonderful shopping experience!</span>
                           </div>                                        
                           <form method="POST" action="{{ route('register') }}">
                              @csrf
                              
                              <div class="form-group">

                                 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name">

                                 @error('name')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                 @enderror
                              </div>

                              <div class="form-group">

                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror

                              </div>

                              <div class="form-group">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                              </div>

                              <div class="login_footer form-group">
                                 <div class="chek-form">
                                    <div class="custome-checkbox">
                                       <input class="form-check-input" type="checkbox" name="terms" id="exampleCheckbox12" value="1">
                                       <label class="form-check-label" for="exampleCheckbox12"><span>I agree to the <a href="{{url('terms-&-conditions')}}">Terms & conditions</a> &amp; <a href="{{url('privacy-policy')}}">Privacy policy</a>.</span></label>
                                    </div>
                                    @error('terms')
                                       <span class="text-danger">
                                          Please agree to the terms and conditions
                                       </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="form-group">
                                 <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                              </div>
                           </form>                                        
                           <div class="text-muted text-centerdd">Already have an account? <a href="{{route('login')}}">Sign in</a></div>
                        </div>
                     </div>
                  </div>                            
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
