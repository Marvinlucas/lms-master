
@extends('layouts.guest')

@section('content')
   <div class="container">

       <!-- Outer Row -->
       <div class="row justify-content-center">

           <div class="col-xl-10 col-lg-12 col-md-9">

               <div class="card o-hidden border-0 shadow-lg my-5">
                   <div class="card-body p-0">
                       <!-- Nested Row within Card Body -->
                       <div class="row">
                        
                        <div class="col-lg-6 d-none d-lg-flex bg-login-image justify-content-center align-items-center flex-column">
                            <div style="max-width: 100%; display: flex; justify-content: center; align-items: center;">
                                <img src="{{ asset('img/logo/guru-logo-white.png') }}" alt="Login Image" style="max-width: 50%; height: auto;">
                            </div>
                            <p class="text-center text-white custom-quote">Global Unified Resources for Universal</p>
                            <p class="text-center text-white custom-paragraph">Learning Management System</p>
                        </div>
                       
                                 
                           <div class="col-lg-6">
                            
                               <div class="p-5">
                                   <div class="text-center">
                           <!-- head log in text -->
                                   <h1 for="yow" style="color: #FA5D4E; display: block; text-align: left; font-weight:bold; font-family: Nunito; ">Sign In!</h1>
                                   <P for="yow" class="log-P">Explore, learn and grow with us enjoy the seamless and enriching educational journey. Lets begin!</p>

                                   </div>
                                   <label for="email" class="log-label">Your Email</label>

                                   <form class="user" method="post" action="{{ route('login') }}">
                                       @csrf
                                       <div class="form-group">
                                           <input name="email" type="email" 
                                           class="form-control form-control-user @error('email') is-invalid @enderror"
                                               id="email" aria-describedby="email"
                                               placeholder="Enter Your Email">
                                           @error('email')
                                               <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                               </span>
                                           @enderror    
                                       </div>
                                       <label for="email" class="log-label">Your Password</label>
                                       <div class="form-group">
                                        <div class="input-group">
                                           <input name="password" type="password"
                                           class="form-control form-control-user @error('email') is-invalid @enderror"
                                               id="password" placeholder="Password" value="password">
                                               <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password "></i>
                                                </span>
                                            </div>
                                           @error('password')
                                               <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                               </span>
                                           @enderror  
                                       </div>
                                     
                                        {{--<a href="#" id="forgot" style="display: block; text-align: right; color: #00000099;
                                       ">{{ __('Forgot Password?') }}</a>--}}

                                       <input value="Sign In" type="submit" class="btn btn-primary btn-user btn-block mt-3" />
                                       <center>
                                        <label for="email" style="width:101%;">
                                            {{ __("Don't have an account?") }} <a href="{{ route('register') }}" style="color: blue; text-decoration: none;">{{ __("Sign Up") }}</a>
                                        </label>

                                       {{--<a href="https://accounts.google.com/" class="login-with-google-btn">
                                            Sign In with Google
                                        </a>--}}
                                       </center>
                               
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>

       </div>

   </div>
@endsection