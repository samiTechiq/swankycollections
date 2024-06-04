<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validated();

        $user = User::where('email', $request->email)->first();
        if($user){
            if($user->status == 1){
                if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
                    setcookie('email', $request->email, time() + 86400, '/');
                    setcookie('password', $request->password, time() + 86400, '/');
                    flash()->option('position', 'bottom-center')->success('Login successful');
                    return redirect()->route('home');
                }else{
                    flash()->option('position', 'bottom-center')->error('Invalid credential supplied');
                    return redirect()->back()->with('error-message', 'You enter incorrect login token');
                }
            }else{
                flash()->option('position', 'bottom-center')->error('Your account is blocked, please contact admin.');
                return redirect()->back()->with('error-message', 'Your account is blocked, please contact admin.');
            }
        }else{
            flash()->option('position', 'bottom-center')->error('No account associated with this email.');
            return redirect()->back()->with('error-message', 'No account associated with this email ID.');
        }

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        flash()->option('position', 'bottom-right')->success('Logout successfully');
        return redirect()->route('home');
    }
}
