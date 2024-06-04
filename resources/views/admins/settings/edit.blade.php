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
</div>
<div class="row my-5">
    <form action="{{ route('setting.update', $setting->id) }}" method="post">
        @csrf
        <div class="col-12">
            <div class="mb-3">
                 <label for="app_name" class="form-label">App Name</label>
                 <input type="text" name="app_name" value="{{ $setting->app_name }}"
                 class="form-control @error('app_name') is-invalid @enderror">
                 @error('app_name')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="mb-3">
                 <label for="phone" class="form-label">Phone</label>
                 <input type="text" name="phone" value="{{ $setting->phone }}"
                 class="form-control @error('phone') is-invalid @enderror">
                 @error('phone')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="mb-3">
                 <label for="email" class="form-label">Email</label>
                 <input type="text" name="email" value="{{ $setting->email }}"
                 class="form-control @error('email') is-invalid @enderror">
                 @error('email')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
             </div>
             <div class="mb-3">
                 <label for="address" class="form-label">address</label>
                 <input type="text" name="address" value="{{ $setting->address }}"
                 class="form-control @error('address') is-invalid @enderror">
                 @error('address')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
             </div>
             <div class="mb-3">
                 <label for="tagline" class="form-label">Tagline</label>
                 <input type="text" name="tagline" value="{{ $setting->tagline }}"
                 class="form-control @error('tagline') is-invalid @enderror">
                 @error('tagline')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
             </div>
             <div class="mb-3">
                 <label for="app_url" class="form-label">App Url</label>
                 <input type="text" name="app_url" value="{{ $setting->app_url }}"
                 class="form-control @error('app_url') is-invalid @enderror">
                 @error('app_url')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror
             </div>
             <button type="submit" class="btn btn-primary submit-btn">save settings</button>
         </div>
    </form>
</div>
@endsection
@section('admin-scripts')
<script>

</script>
@endsection
