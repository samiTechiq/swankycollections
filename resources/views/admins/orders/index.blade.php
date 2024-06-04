@extends('admins.layouts.app')
@section('adm-title', 'Oders')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('order.manage') }}">Orders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Lists</li>
        </ol>
    </nav>
</div>
<div class="table-responsive mb-5">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @forelse ($orders as $order)
                <tr>
                    <td style="vertical-align:middle">{{ $count++ }}</td>
                    <td style="vertical-align:middle">
                      {{ $order->fullname }}
                    </td>
                    <td style="vertical-align:middle">{{ $order->email}}</td>
                    <td style="vertical-align:middle">{{ $order->total }}</td>
                    <td style="vertical-align:middle">
                        {{ $order->status_message }}
                    </td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('order.edit', $order->tracking_id) }}" class="me-2">View</a>
                        <a onclick="confirmBeforeDelete(event)"
                        href="{{ route('order.destroy', $order->id) }}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center">No slider in table.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $orders->links() }}
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
