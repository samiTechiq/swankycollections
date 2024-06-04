<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', Auth::id())->latest()->simplePaginate(10);
        return view('frontend.orders', compact('orders'));
    }

    public function show(string $id): View
    {
        $order = Order::with('item')->where(['user_id' => Auth::id(), 'tracking_id' => $id])->first();
        return view('frontend.order-page', compact('order'));
    }

    public function previewMail(): View
    {
        return view('mail.order-confirmation');
    }
}
