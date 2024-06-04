@extends('admins.layouts.app')
@section('adm-title', 'Products')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
          <li class="breadcrumb-item active" aria-current="page">Lists</li>
        </ol>
    </nav>
    <a href="{{ route('product.create') }}" class="">Create</a>
</div>
<div class="table-responsive mb-5">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>New Stock</th>
                <th>In Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @forelse ($products as $product)
                <tr>
                    <td style="vertical-align:middle">{{ $count++ }}</td>
                    <td style="vertical-align:middle">{{ $product->name }}</td>
                    <td style="vertical-align:middle">{{ $product->price }}</td>
                    <td style="vertical-align:middle">
                        <img src="{{ asset($product->image) }}" alt="{{$product->name}}"
                        width="60" height="60">
                    </td>
                    <td style="vertical-align:middle">{{ $product->qty }}</td>
                    <td style="vertical-align:middle">
                        @if ($product->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td style="vertical-align:middle">
                        @if ($product->new_stock == 1)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td style="vertical-align:middle">
                        @if ($product->in_stock == 1)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('product.show', $product->id) }}">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center">No Product in table.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links("pagination::bootstrap-5") }}
</div>
@endsection
@section('admin-scripts')
<script>
    function confirmBeforeDelete(event){
        event.preventDefault()
        const url = event.currentTarget.getAttribute('href')
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=url
                Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
                });
            }
        });
    }
</script>
@endsection
