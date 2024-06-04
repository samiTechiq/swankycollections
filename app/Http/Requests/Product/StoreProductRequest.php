<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'descriptions' => 'required|string|max:5000',
            'image' => 'required|image|mimes:png,jpg,webp,gif,jpeg|max:3000',
            'status' => 'required|integer|max:1',
            'in_stock' => 'required|integer|max:1',
            'new_stock' => 'required|integer|max:1',
            'qty' => 'required|integer',
        ];
    }
}
