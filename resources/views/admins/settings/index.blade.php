@extends('admins.layouts.app')
@section('adm-title', 'Settings')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('setting') }}">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Setting</li>
        </ol>
    </nav>
    <a href="{{ route('setting.edit', $setting->id) }}" class="fw-bold" >Edit Settings</a>
</div>
<div class="row">
    <div class="col">
        <div class="card card-body mb-3 shadow-sm">
            <p class="m-0 text-muted">App Name</p>
            <p class="fw-bold">{{ $setting->app_name }}</p>
        </div>
        <div class="card card-body mb-3 shadow-sm">
            <p class="m-0 text-muted">Phone</p>
            <p class="fw-bold">{{ $setting->phone }}</p>
        </div>
        <div class="card card-body mb-3 shadow-sm">
            <p class="m-0 text-muted">Email</p>
            <p class="fw-bold">{{ $setting->email }}</p>
        </div>
        <div class="card card-body mb-3 shadow-sm">
            <p class="m-0 text-muted">Address</p>
            <p class="fw-bold">{{ $setting->address }}</p>
        </div>
        <div class="card card-body mb-3 shadow-sm">
            <p class="m-0 text-muted">TagLine</p>
            <p class="fw-bold">{{ $setting->tagline }}</p>
        </div>
        <div class="card card-body mb-3 shadow-sm">
            <p class="m-0 text-muted">App Url</p>
            <p class="fw-bold">{{ $setting->app_url }}</p>
        </div>
    </div>
</div>
@endsection
