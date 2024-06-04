<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index(string $token)
    {
        $user = DB::table('password_reset_tokens')->where('token', $token)->first();
        if($user){
            return view('auth.reset-password', compact('token'));
        }

        return redirect()->route('auth.forgotpassword')->with('error-message', 'invalid token');
    }

    public function store(Request $request, string $token)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $user = DB::table('password_reset_tokens')->where('token', $token)->first();
        if($user){
            User::where('email', $user->email)->update(['password' => Hash::make($request->password)]);
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
            flash()->option('position', 'bottom-center')->success('Password reset was successful');
            return redirect()->route('auth.login')->with('success-message', 'password reset successfully');
        }

        return redirect()->route('auth.forgotpassword')->with('error-message', 'invalid token');
    }
}
