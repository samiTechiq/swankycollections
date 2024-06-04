@extends('admins.layouts.app')
@section('adm-title', 'Edit Banner')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('slider') }}">Sliders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>
<form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
    <div class="row">
        <div class="col-12">
           <div class="mb-3">
                <label for="first_title" class="form-label">First Title</label>
                <input type="text" name="first_title" value="{{ $banner->first_title }}" class="form-control @error('first_title') is-invalid @enderror">
                @error('first_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
           </div>
           <div class="mb-3">
                <label for="second_title" class="form-label">Second Title</label>
                <input type="text" name="second_title" value="{{ $banner->second_title }}" class="form-control @error('second_title') is-invalid @enderror">
                @error('second_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
           </div>
           <div class="mb-3">
                <label for="third_title" class="form-label">Third Title</label>
                <input type="text" name="third_title" value="{{ $banner->third_title }}" class="form-control @error('third_title') is-invalid @enderror">
                @error('third_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

           <div class="mb-3">
                <label for="first_image" class="form-label">First Image</label>
                <input type="hidden" name="old_firt_image" value="{{ $banner->first_image }}">
                <input type="file" name="first_image" class="form-control @error('first_image') is-invalid @enderror">
                @error('first_image')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
           </div>
           <div class="mb-3">
                <label for="second_image" class="form-label">Second Image</label>
                <input type="hidden" name="old_second_image" value="{{ $banner->second_image }}">
                <input type="file" name="second_image" class="form-control @error('second_image') is-invalid @enderror">
                @error('second_image')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="third_image" class="form-label">First Image</label>
                <input type="hidden" name="old_third_image" value="{{ $banner->third_image }}">
                <input type="file" name="third_image" class="form-control @error('third_image') is-invalid @enderror">
                @error('third_image')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
           </div>
           <button type="submit" class="btn btn-primary submit-btn">submit</button>
        </div>
    </div>
</form>
@endsection
@section('admin-scripts')
    <script>
       $(function(){
        $('.submit-btn').click(function(){
           $(this).html(`<div class="spinner-border spinner-border-sm me-2" role="status"></div><span>Loading...</span>`)
        })
       })
    </script>
@endsection
