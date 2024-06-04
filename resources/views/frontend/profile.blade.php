@extends('frontend.layouts.app')
@section('home-contents')
@section('title', 'Profile')
<div class="container">
    <div class="row my-5 border p-3 rounded">
        <div class="col-12">
            <form action="{{ route('update.name') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="label">Full name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="label">Email Address</label>
                    <input type="email" readonly class="form-control" value="{{ Auth::user()->email }}">
                </div>
                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
    <div class="row my-5 p-3 rounded border">
        <div class="col-12">
            <form action="{{ route('update.password') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="password" class="label">Old password</label>
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">
                    @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="label">Confirm password</label>
                    <input type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
</div>
@endsection
