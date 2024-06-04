<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(): View
    {
        return view('frontend.profile');
    }

    public function changeName(Request $request)
    {
        $request->validate(['name' => 'required|string|max:121']);
        User::findOrFail(Auth::id())->update(['name' => $request->name]);
        flash()->option('position', 'bottom-right')->success('name updated successfully');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|max:255|confirmed',
            'password_confirmation' => 'required|min:8|max:255',
        ]);

        $user = User::findOrFail(Auth::id());
        if(Hash::check($request->old_password, $user->password)){
            User::findOrFail($user->id)->update(['password' => Hash::make($request->password)]);
            flash()->option('position', 'bottom-right')->success('password change successfully');
            return redirect()->back();
        }else{
            flash()->option('position', 'bottom-right')->error('password do not match');
            return redirect()->back();
        }
    }
}
