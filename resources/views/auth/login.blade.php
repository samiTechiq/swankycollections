@extends('frontend.layouts.app')
@section('title', 'Login')
@section('home-contents')
 <!-- breadcrumb start -->
 <div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="/">Home</a></li>
            <li>
                <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path
                            d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                            fill="#000" />
                    </g>
                </svg>
            </li>
            <li>Login</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="login-page mt-100">
        <div class="container">
            <form action="{{ route('auth.store') }}" class="login-form common-form mx-auto" method="post">
                @csrf
                @if (session()->has('pleaseLogin'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('pleaseLogin'); }}
                </div>
                @elseif (session()->has('success-message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success-message'); }}
                </div>
                @elseif (session()->has('error-message'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error-message'); }}
                </div>
                @else
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Login</h2>
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label for="email" class="label">Email address</label>
                            <input type="email" name="email" value="{{ $_COOKIE['email'] ?? '' }}" class="form-control @error('email') is-invalid @enderror" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label for="password" class="label">Password</label>
                            <input type="password" value="{{ $_COOKIE['password'] ?? '' }}" name="password" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <a href="{{ route('auth.forgotpassword') }}" class="text_14 d-block">Forgot your password?</a>
                        <button type="submit" class="btn-primary d-block mt-4 btn-signin">SIGN IN</button>
                        <a href="{{ route('auth.register') }}" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
@section('frontend-scripts')
<script>
    let element = document.querySelector('.btn-signin');
    element.addEventListener('click', function() {
        element.innerHTML = `<div class="spinner-border spinner-border-sm" role="status"></div><span class="ms-2">Loging...</span>`;
    })
</script>
@endsection
