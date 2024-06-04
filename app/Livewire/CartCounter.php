<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCounter extends Component
{
    public $cartCount;
    protected $listeners = [
        'showCartCount' => 'renderCartCount',
        'refreshComponent' => 'refresh'
    ];

    public function renderCartCount(){

        if(Auth::check()){
            return $cartCount = Cart::where('user_id', Auth::id())->count();
        }else{
            return $cartCount = 0;
        }
    }

    // increment item qty
    public function increment($id)
    {
        Cart::where(['user_id' => Auth::id(), 'id' => $id])->increment('qty');
    }

    // decrement item qty
    public function decrement($id)
    {
        Cart::where(['user_id' => Auth::id(), 'id' => $id])->decrement('qty');
    }

    // calculate cart total
    public function subtotal($carts)
    {
        $total = 0;
       foreach($carts as $cart)
       {
            $total += $cart->qty * $cart->product->price;
       }

       return $total;
    }

    public function refresh()
    {
        $this->render();
    }

    public function render()
    {
        $this->cartCount = $this->renderCartCount();
        $carts = Cart::where('user_id', Auth::id())->get();
        $subtotal = $this->subtotal($carts);
        return view('livewire.cart-counter', [
            'cartCount' => $this->cartCount,
            'carts' => $carts,
            'subtotal' => $subtotal,
        ]);
    }
}
