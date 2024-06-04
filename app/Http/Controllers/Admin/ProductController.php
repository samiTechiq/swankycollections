<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Models\Product;
use App\Traits\DeleteFileTrait;
use App\Traits\ProductImageHandler;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    use ProductImageHandler;
    use DeleteFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view('admins.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();
        $image = $this->handle($request->image);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'descriptions' => $request->descriptions,
            'image' => $image,
            'status' => $request->status,
            'in_stock' => $request->in_stock,
            'new_stock' => $request->new_stock,
            'qty' => $request->qty,
        ]);
        flash()->option('position', 'bottom-right')->success("Product Saved successfully");
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('admins.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admins.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $request->validated();
        $image = $request->old_image;
        if($request->hasFile('image')){
            $image = $this->handle($request->image);
            $this->delete($request->old_image);
        }
        Product::findOrFail($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'descriptions' => $request->descriptions,
            'image' => $image,
            'status' => $request->status,
            'in_stock' => $request->in_stock,
            'new_stock' => $request->new_stock,
            'qty' => $request->qty,
        ]);
        flash()->option('position', 'bottom-right')->success("Product updated successfully");
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $this->delete($product->image);
        $product->delete();
        flash()->option('position', 'bottom-right')->success('Product deleted');
        return redirect()->route('product');
    }
}
