@extends('frontend.layouts.app')
@section('title', 'Reset Password')
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
            <li>Reset Password</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<main id="MainContent" class="content-for-layout">
    <div class="login-page mt-100">
        <div class="container">
            <form action="{{ route('auth.resetpassword.store', $token) }}" class="login-form common-form mx-auto" method="post">
                @csrf
                @if (session()->has('error-message'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error-message'); }}
                </div>
                @elseif (session()->has('success-message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success-message'); }}
                </div>
                @else
                <div class="section-header mb-3">
                Please enter and confirm new password.
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label for="password" class="label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset>
                            <label for="password_confirmation" class="label">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-primary d-block mt-4 btn-signin">RESET PASSWORD</button>
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
        element.innerHTML = `<div class="spinner-border spinner-border-sm" role="status"></div><span class="ms-2">please wait...</span>`;
    })
</script>
@endsection
