@extends('admins.layouts.app')
@section('adm-title', 'Banner')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('banner') }}">Banners</a></li>
          <li class="breadcrumb-item active" aria-current="page">Lists</li>
        </ol>
    </nav>
    <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-secondary">Edit</a>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
       <div class="mb-3">
            <p>{{ $banner->first_title }}</p>
            <img src="{{ asset($banner->first_image) }}" alt="image" class="img-fluid">
       </div>
       <div class="mb-3">
            <p>{{ $banner->second_title }}</p>
            <img src="{{ asset($banner->second_image) }}" alt="image" class="img-fluid">
        </div>
        <div class="mb-3">
            <p>{{ $banner->third_title }}</p>
            <img src="{{ asset($banner->third_image) }}" alt="image" class="img-fluid">
        </div>
    </div>
</div>
@endsection
