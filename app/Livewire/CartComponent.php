<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class CartComponent extends Component
{
    use LivewireAlert;
     // increment item qty
     public function increment($id)
     {
        $cart = Cart::where(['user_id' => Auth::id(), 'id' => $id])->first();
        if($cart->qty < $cart->product->qty){
            Cart::where(['user_id' => Auth::id(), 'id' => $id])->increment('qty');
        }else{
            $this->alert('error', 'You can\'t add more than the unit in stock', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
     }

     // decrement item qty
     public function decrement($id)
     {
        $cart = Cart::where(['user_id' => Auth::id(), 'id' => $id])->first();
        if($cart->qty > 1){
            Cart::where(['user_id' => Auth::id(), 'id' => $id])->decrement('qty');
        }else{
            $this->alert('error', 'unit can not be less than 1', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
     }

    //  remove from cart
    public function remove($id)
    {
        Cart::where(['user_id' => Auth::id(), 'id' => $id])->delete();
        $this->dispatch('showCartCount');
        $this->dispatch('refreshComponent');
        $this->alert('success', 'Item remove from cart successfully', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
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

    public function render()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $subtotal = $this->subtotal($carts);
        return view('livewire.cart-component', [
            'carts' => $carts,
            'subtotal' => $subtotal,
        ]);
    }
}
