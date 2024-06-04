@extends('admins.layouts.app')
@section('adm-title', 'Customers')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('users') }}">Customers</a></li>
          <li class="breadcrumb-item active" aria-current="page">Lists</li>
        </ol>
    </nav>
</div>
<div class="table-responsive mb-5">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Join Date</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @forelse ($users as $user)
                <tr>
                    <td style="vertical-align:middle">{{ $count++ }}</td>
                    <td style="vertical-align:middle">
                       {{ $user->name }}
                    </td>
                    <td style="vertical-align:middle">{{ $user->email }}</td>
                    <td style="vertical-align:middle">{{ $user->created_at->format('d-m-y h:i:s') }}</td>
                    <td style="vertical-align:middle">
                        @if ($user->isAdmin == 1)
                            <span class="badge bg-success">Admin</span>
                        @else
                            <span class="badge bg-danger">User</span>
                        @endif
                    </td>
                    <td style="vertical-align:middle">
                        @if ($user->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('user.disabled', $user->id) }}" class="me-2">Block</a>
                        <a href="{{ route('user.view', $user->id) }}">View Orders</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center">No slider in table.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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
