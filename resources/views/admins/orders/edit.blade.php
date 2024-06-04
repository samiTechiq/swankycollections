@extends('admins.layouts.app')
@section('adm-title', 'Order Detail')
@section('contents')
<div class="d-flex align-items-center justify-content-between my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('order.manage') }}">Orders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Lists</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
           <div class="card-header">Customer Detail</div>
           <div class="card-body">
            <p>Customer Name: <b>{{ $order->fullname }}</b> </p>
            <p>Customer Email: <b>{{ $order->email }}</b> </p>
            <p>Customer Phone: <b>{{ $order->phone }}</b> </p>
           </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
           <div class="card-header">Shipping Detail</div>
           <div class="card-body">
            <p>State: <b>{{ $order->state->name }}</b> </p>
            <p>LGA: <b>{{ $order->lga->name }}</b> </p>
            <p>Address: <b> {{ $order->address }} </b> </p>
           </div>
        </div>
    </div>
</div>
<div class="table-responsive my-5">
    <h4>Order Items</h4>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Product Image</th>
                <th>Product</th>
                <th>price</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
                $total = 0;
            @endphp
            @forelse ($order->item as $item)
                <tr>
                    <td style="vertical-align:middle">{{ $count++ }}</td>
                    <td style="vertical-align:middle">
                       <img src="{{ asset($item->product->image) }}" alt="image" width="80" height="80">
                      </td>
                    <td style="vertical-align:middle">
                      {{ $item->product->name }}
                    </td>
                    <td style="vertical-align:middle">{{ $item->product->price}}</td>
                    <td style="vertical-align:middle">{{ $item->qty }}</td>
                    <td style="vertical-align:middle">
                        {{ $item->product->price * $item->qty }}
                    </td>
                </tr>
                <tr>
                    <th colspan="5" style="text-align: end">Grand total</th>
                    <th>{{ $total += $item->product->price * $item->qty }}</th>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center">No orders item in table</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="row mb-5">
    <div class="col-12">
        <div class="card card-body">
            <form action="{{ route('order.update', $order->id) }}" method="post">
                @csrf
               <div class="mb-3">
                <label for="status" class="form-label">Order Status</label>
                <input type="text" value="{{ $order->status_message }}" class="form-control @error('status') is-invalid @enderror" name="status">
                @error('status')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
               <button type="submit" class="btn btn-primary">save change</button>
            </form>
        </div>
    </div>
</div>
@endsection

