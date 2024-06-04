@extends('frontend.layouts.app')
@section('title', 'Orders')
@section('home-contents')
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <div class="section-header mb-3">
                <h4 class="section-heading">My Orders</h4>
            </div>
            <div class="table-responsive d-none d-sm-block">
                <table class="table table-striped table-hover">
                   <thead>
                    <tr>
                        <th>#</th>
                        <th>Tracking ID</th>
                        <th>Total</th>
                        <th>Payment Mode</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->tracking_id }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->payment_mode }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->status_message }}</td>
                            <th>
                                <a href="{{ route('orders.show', $order->tracking_id) }}">view</a>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center">No order yet <a href="{{ route('home') }}">shop now</a></td>
                        </tr>
                    @endforelse
                   </tbody>
                </table>
                {{ $orders->links() }}
            </div>
            <!---for mobile device---->
            <section class="d-md-none">
               @forelse ($orders as $order)
               <div class="card card-body mb-3">
                    <p class="m-0 text-muted">Total:</p>
                    <p class="fw-bold">{{ $order->total }}</p>
                    <p class="m-0 text-muted">Payment Mode:</p>
                    <p class="fw-bold">{{ $order->payment_mode }}</p>
                    <p class="m-0 text-muted">Order Date:</p>
                    <p class="fw-bold">{{ $order->created_at }}</p>
                    <p class="m-0 text-muted">Order Status:</p>
                    <p class="fw-bold">{{ $order->status_message }}</p>
                    <p><a href="{{ route('orders.show', $order->tracking_id) }}">View Order</a></p>
                </div>
               @empty
                <div class="card card-body">You have not order anything yet.</div>
               @endforelse
               {{ $orders->links() }}
            </section>
        </div>
    </div>
</div>
@endsection
