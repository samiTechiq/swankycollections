<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;

class ProductPage extends Component
{
    use LivewireAlert;
    public $id;
    #[Validate('required')]
    public $qty;
    #[Validate('required')]
    public $color;
    #[Validate('required')]
    public $size;

    public function cartAdd(){
        $this->validate();
        if(!Auth::check()){
            session()->flash('pleaseLogin', 'Please login or create an account to add product to cart');
            return redirect()->route('auth.login');
        }
       if(Cart::where(['user_id' => Auth::id(), 'product_id' => $this->id, 'product_color_id' => $this->color, 'product_size_id' => $this->size])->exists()){
            $this->alert('error', 'Product already in cart', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
       }else{
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $this->id,
                'product_color_id' => $this->color,
                'product_size_id' => $this->size,
                'qty' => $this->qty,
            ]);
            $this->dispatch('showCartCount');
            $this->alert('success', 'Product added to cart successfully', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->reset(['color', 'size', 'qty']);
       }
    }

    public function render()
    {
        $products = Product::inRandomOrder()->limit(8)->get();
        $productList = Gallery::where(['product_id' => $this->id, 'status' => 1])->get();
        $product = Product::find($this->id);
        $sizes = ProductSize::where(['product_id' => $this->id, 'status' => 1])->get();
        $colors = ProductColor::where(['product_id' => $this->id, 'status' => 1])->get();
        return view('livewire.product-page', compact('products','product', 'productList', 'sizes','colors'));
    }
}
