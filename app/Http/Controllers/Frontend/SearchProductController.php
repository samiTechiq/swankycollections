<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function index(Request $request)
    {   $query =  $request->search;
        $result = Product::whereAny(['name', 'descriptions', 'price'], 'LIKE',"%$query%")->get();
        return response()->json($result);
    }
}
