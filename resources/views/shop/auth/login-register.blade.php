@extends('shop.layouts.shop')

@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Login Register</li>
            </ul>
        </div>
    </div>
</div>

<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Mobile<span class="text-danger">*</span></label>
                                <input class="mb-0" type="number" name="user_id" placeholder="Mobile Number" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password<span class="text-danger">*</span></label>
                                <input class="mb-0" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-8">
                                {{-- <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div> --}}
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-md-right">
                                <a href="#"> Forgotten pasward?</a>
                            </div>

                            @if(session()->has('message'))
                                <div class="col-12 mb-20">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Login Failed!</strong> {{ session()->get('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <button class="register-button mt-0" type="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-12 mb-20">
                                <label>Name<span class="text-danger">*</span></label>
                                <input class="mb-0 @error('name') is-invalid @enderror" name="name" type="text" placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Mobile<span class="text-danger">*</span></label>
                                <input class="mb-0 @error('user_id') is-invalid @enderror" name="user_id" type="number" placeholder="Mobile Number">

                                @error('user_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password<span class="text-danger">*</span></label>
                                <input class="mb-0 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password<span class="text-danger">*</span></label>
                                <input class="mb-0" type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0" type="submit">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection