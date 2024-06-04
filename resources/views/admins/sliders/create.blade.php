@extends('admins.layouts.app')
@section('adm-title', 'Create Slider')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('slider') }}">Sliders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>
<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
    <div class="row">
        <div class="col-12">
           <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
           </div>
           <div class="mb-3">
                <label for="sub_title" class="form-label">Sub title</label>
                <input type="text" name="sub_title" value="{{ old('sub_title') }}" class="form-control @error('sub_title') is-invalid @enderror">
                @error('sub_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
           </div>
           <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">--select--</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
           <div class="mb-3">
                <label for="image" class="form-label">Slider Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
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
