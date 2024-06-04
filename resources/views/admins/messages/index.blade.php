@extends('admins.layouts.app')
@section('adm-title', 'Chats')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('contact.chat') }}">Contacts</a></li>
          <li class="breadcrumb-item active" aria-current="page">Chats</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        @forelse ($chats as $chat)
            <div class="card card-body mb-3">
                <p class="fw-bold">{{ $chat->name }} - {{ $chat->email }}</p>
                <p>{{ $chat->subject }}</p>
                <p>{{ $chat->message }}</p>
                <p>Phone: {{ $chat->phone }}</p>
                <p> Date: {{ $chat->created_at }}</p>
                <a href="{{ route('message.destroy', $chat->id) }}"
                    class="text-decoration-none fw-bold text-danger"
                    onclick="confirmBeforeDelete(event)">Delete message</a>
            </div>
        @empty
        <div class="card card-body">No Message Found</div>
        @endforelse
        {{ $chats->links() }}
    </div>
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
