<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->paginate(10);
        return view('admins.users.index', compact('users'));
    }

    public function disabled(string $id)
    {
        $user = User::findOrFail($id);
        User::findOrFail($id)->update(['status' => !$user->status]);
        flash()->option('position', 'bottom-center')->success('user updated successfully');
        return redirect()->back();
    }

    public function show(string $id)
    {
        $user = User::with('orders')->findOrFail($id);
        return view('admins.users.user-orders', compact('user'));
    }
}
