@extends('admins.layouts.app')
@section('adm-title', 'View Product Details')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
          <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
    <div class="d-flex">
        <a href="{{ route('product.edit', $product->id) }}" class="text-decoration-none fw-bold me-3">Edit</a>
        <a href="{{ route('product.destroy', $product->id) }}" onclick="confirmBeforeDelete(event)" class="text-decoration-none text-danger fw-bold">Delete</a>
    </div>
</div>
<div class="row mb-5">
    <div class="col">
        <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->image }}">
    </div>
    <div class="col">
        <div class="mb-3">
            <p class="m-0 text-muted">Product name:</p>
            <p class="m-0 fw-bold">{{ $product->name }}</p>
        </div>
        <div class="mb-3">
            <p class="m-0 text-muted">Product Price:</p>
            <p class="m-0 fw-bold">{{ $product->price }}</p>
        </div>
        <div class="mb-3">
            <p class="m-0 text-muted">Product Descriptions:</p>
            <p class="m-0 fw-bold">{{ $product->descriptions }}</p>
            <input type="hidden" value="{{ $product->id }}" id="product_id">
        </div>
        <!-- sizes -->
        <div class="mb-5">
            @livewire('size-component', ['id' => $product->id])
        </div>
        <div class="mb-5">
            @livewire('product-color-component', ['id' => $product->id])
        </div>
        <div class="mb-5">
            @livewire('gallery-component', ['id' => $product->id])
        </div>
    </div>
</div>



@endsection
@section('admin-scripts')
{{-- <script>
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
<script>
    $(document).ready(function(){
        const id = $('#product_id').val();
        getSize()
        // get sizes
        function getSize(){
            $.ajax({
                url: "{{ route('size', ':id') }}".replace(':id', id),
                type: "GET",
                success: function(response){
                    let data = '';
                    if(response.length > 0){
                      $.each(response, function(key, value){
                        data += `
                        <tr>
                            <td>${value.name}</td>
                            <td>
                                ${value.status == 1? 'Yes' : 'No'}
                            </td>
                            <td>
                                <button onclick="openEditSizeModal()" id="1" class="badge bg-warning size_edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                <a href="javascript:void(0)" id="${value.id}" class="badge bg-danger size-delete"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        `
                      })
                    }else{
                        data = `
                        <tr>
                            <td colspan="2" style="text-align:center">No Size for this product yet.</td>
                        </tr>
                        `
                    }

                    $('#size_content').html(data)
                }
            })
        }
        // save sizes
        $('#sizeForm').validate({
            errorElement : 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
            rules:{
                name: "required",
                status: "required",
            },
            messages:{
                name: "Please enter size name",
                status: "Please select size status",
            },
            submitHandler: function(form){
                // Form is valid, submit using AJAX (prevents full page reload)
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
                    beforeSend: function(){
                        $("#exampleModal").modal('hide')
                        $('#layoutSidenav_content').waitMe({
                            effect: 'roundBounce',
                            text: 'Please wait...',
                            bg: 'rgba(255,255,255,0.7)',
                            color: '#000'
                        })
                    },
                    success: function(response) {
                        $('#layoutSidenav_content').waitMe('hide');
                       if(response.status === 'success'){
                        Swal.fire({
                                icon: "success",
                                title: "success!",
                                text: `${response.message}`
                            })
                       }else{
                        Swal.fire({
                                icon: "error",
                                title: "error!",
                                text: `${response.message}`
                            })
                       }
                       getSize()
                       $(form)[0].reset()
                    },
                    error: function(error) {
                        $('#layoutSidenav_content').waitMe('hide');
                        console.error(error)
                        Swal.fire({
                            icon: "error",
                            title: "error",
                            text: "We encounter an error please try again."
                        })
                    }
                });
        }
        })
    })
</script> --}}

@endsection
