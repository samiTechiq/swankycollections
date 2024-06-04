@extends('admins.layouts.app')
@section('adm-title', 'Sliders')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('slider') }}">Sliders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Lists</li>
        </ol>
    </nav>
    <a href="{{ route('slider.create') }}" class="btn btn-secondary">Create</a>
</div>
<div class="table-responsive my-5">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @forelse ($sliders as $slider)
                <tr>
                    <td style="vertical-align:middle">{{ $count++ }}</td>
                    <td style="vertical-align:middle">
                        <img src="{{ asset($slider->image) }}" alt="slider"
                        width="60" height="60">
                    </td>
                    <td style="vertical-align:middle">{{ $slider->title }}</td>
                    <td style="vertical-align:middle">{{ $slider->sub_title }}</td>
                    <td style="vertical-align:middle">
                        @if ($slider->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td style="vertical-align:middle">
                        <a href="{{ route('slider.edit', $slider->id) }}" class="me-2">Edit</a>
                        <a onclick="confirmBeforeDelete(event)"
                        href="{{ route('slider.destroy', $slider->id) }}">Delete</a>
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
