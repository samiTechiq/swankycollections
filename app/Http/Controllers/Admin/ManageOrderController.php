<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()->paginate(20);
        return view('admins.orders.index', compact('orders'));
    }

    public function edit(string $id): View
    {
        $order = Order::with('item')->where('tracking_id', $id)->first();
        return view('admins.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['status' => 'required']);
        Order::findOrFail($id)->update(['status_message' => $request->status]);
        flash()->option('position', 'bottom-center')->success('Order Status updated successfully');
        return redirect()->route('order.edit', $id);
    }

    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back();
    }
}
