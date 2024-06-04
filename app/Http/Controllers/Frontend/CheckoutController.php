<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderConfirmation;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\State;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index():View
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $user = User::findOrFail(Auth::id());
        $total = $this->subtotal($carts);
        $states = State::all();
        return view('frontend.checkout', compact('carts', 'user', 'total', 'states'));
    }

    // calculate cart total
    private function subtotal($carts)
    {
        $total = 0;
        foreach($carts as $cart)
        {
            $total += $cart->qty * $cart->product->price;
        }

        return $total;
    }

    public function store(StoreOrderRequest $request)
    {
        $request->validated();
        $order =  $this->storeOrder($request);
        Cart::where('user_id', Auth::id())->delete();
        $mailOrder = Order::with('item')->findOrFail($order->id);
        Mail::to($mailOrder->email)->send(new OrderConfirmation($mailOrder));
        return redirect()->route('thankyou', $order->tracking_id);
    }

    private function storeOrder($request){
        $order = Order::create([
            'user_id' => Auth::id(),
            'tracking_id' => Str::random(20),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'state_id' => $request->state_id,
            'lga_id' => $request->lga_id,
            'total' => $request->total,
            'status_message' => "In progress",
            'payment_mode' => "Cash On Delivery",
        ]);

        if($order){
            $carts = Cart::where('user_id', Auth::id())->get();
            foreach($carts as $cart){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'product_color_id' => $cart->product_color_id,
                    'product_size_id' => $cart->product_size_id,
                    'qty' => $cart->qty,
                    'price' => $cart->product->price,
                ]);

                $cart->product->where('id', $cart->product_id)->decrement('qty', $cart->qty);
            }
        }

        return $order;
    }

    public function thankYou(string $id){
        return view('frontend.thank-you', compact('id'));
    }
}
