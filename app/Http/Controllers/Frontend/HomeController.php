<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->get();
        $banner = Banner::first();
        return view('frontend.index', compact('sliders', 'banner'));
    }

    public function productPage(string $id): View
    {
        return view('frontend.product-detail', compact('id'));
    }

    public function shop(): View
    {
        return view('frontend.shop');
    }

}
