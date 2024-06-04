<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $total_orders = Order::sum('total');
        $today_orders = Order::where('created_at', Carbon::now())->sum('total');
        $total_customers = User::count();
        $total_products = Product::count();
        return view('admins.dashboard', compact(
            'total_orders',
            'today_orders',
            'total_customers',
            'total_products',
        ));
    }
}
