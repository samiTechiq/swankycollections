<?php

namespace App\Livewire;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductSize;
use Livewire\Component;

class Products extends Component
{
    private $amount = 20;
    public function loadMore(){
        $this->amount += 10;
    }

    public function render()
    {
        $products = Product::latest()->where('status', 1)->take($this->amount)->get();
        $count = Product::count();
        return view('livewire.products', compact('products', 'count'));
    }
}
