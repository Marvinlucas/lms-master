@extends('layouts.guest')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div
                        class="col-lg-5 d-none d-lg-flex bg-login-image justify-content-center align-items-center flex-column">
                        <div style="max-width: 100%; display: flex; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/logo/guru-logo-white.png') }}" alt="Login Image"
                                style="max-width: 50%; height: auto;">
                        </div>
                        <p class="text-center text-white custom-quote">Global Unified Resources for Universal</p>
                        <p class="text-center text-white custom-paragraph">Learning Management System</p>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 for="yow"
                                    style="color: #FA5D4E; display: block; text-align: left; font-weight:bold; font-family: Nunito; ">
                                    Sign Up!</h1>
                                <P for="yow" class="log-P">Explore, learn and grow with us enjoy the seamless and
                                    enriching educational journey. Lets begin!</p>
                            </div>


                            @if ($errors->has('username'))
                                <div class="error-message" style="margin-bottom: -10px;">
                                    <i class="fas fa-exclamation-circle" style="color: red; font-size: 14px;"></i>
                                    <span style="color: red; font-size: 14px;">{{ $errors->first('username') }}</span>
                                </div>
                            @endif

                            @if ($errors->has('password'))
                                <div class="error-message" style="margin-bottom: 10px;">
                                    <i class="fas fa-exclamation-circle" style="color: red; font-size: 14px;"></i>
                                    <span style="color: red; font-size: 14px;">{{ $errors->first('password') }}</span>
                                </div>
                            @endif

                            @if ($errors->has('password_confirmation'))
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle" style="color: red; font-size: 14px;"></i>
                                    <span
                                        style="color: red; font-size: 14px;">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                            @endif

                            <form class="user" action="{{ URL::to('/register') }}" method="post">

                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username" class="form-control form-control-user"
                                            id="exampleUsername" placeholder="Username" required>
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="name" type="text" class="form-control form-control-user"
                                            id="exampleInputFName" placeholder="First Name"required>
                                    </div>
                                </div>
                                <div class="form-group row">    
                                    <div class="col-sm-6">
                                        <input name="last_name" type="text" class="form-control form-control-user"
                                            id="exampleInputLName" placeholder="Last Name"required>
                                    </div>

                                    <div class="col-sm-6">
                                        <input name="middle_initial" type="text" class="form-control form-control-user"
                                            id="exampleInputMInitial" placeholder="Middle Initial"required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="input-group">
                                            <input name="password" type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password "></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input name="password_confirmation" type="password"
                                                class="form-control form-control-user" id="password_confirmation"
                                                placeholder="Repeat Password" required>
                                            <div class="input-group-append "> 
                                                <span class="input-group-text">
                                                    <i toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password "></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                                <center>
                                    <label for="email" style="width:101%;">
                                        {{ __('Already have an account?') }} <a href="{{ route('login') }}"
                                            style="color: blue; text-decoration: none;">{{ 'Sign In' }}</a>
                                    </label>

                                  {{--  <a href="https://accounts.google.com/" class="login-with-google-btn">
                                        Sign Up with Google
                                    </a>--}}
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
