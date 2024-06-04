@extends('admins.layouts.app')
@section('adm-title', 'Create Products')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('name') is-invalid @enderror">
            @error('price')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="descriptions" class="form-label">Descriptions</label>
            <textarea name="descriptions" class="form-control @error('descriptions') is-invalid @enderror" rows="10">{{ old('descriptions') }}</textarea>
        </div>
        @error('descriptions')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="row mb-3">
        <div class="col">
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
        <div class="col">
            <label for="new_stock" class="form-label">New Stock ?</label>
            <select name="new_stock" class="form-select @error('new_stock') is-invalid @enderror">
                <option value="">--select--</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('new_stock')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="in_stock" class="form-label">In Stock ?</label>
            <select name="in_stock" class="form-select @error('in_stock') is-invalid @enderror">
                <option value="">--select--</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('in_stock')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="qty" class="form-label">Product Qty</label>
        <input type="text" name="qty" value="{{ old('qty') }}" class="form-control @error('qty') is-invalid @enderror">
        @error('qty')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>
@endsection
@section('admin-scripts')
    <script>
       $(function(){
        $('.btn').click(function(){
           $(this).html(`<div class="spinner-border spinner-border-sm me-2" role="status"></div><span>Loading...</span>`)
        })
       })
    </script>
@endsection
