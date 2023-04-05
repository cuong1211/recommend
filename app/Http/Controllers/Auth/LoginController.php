<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user) {
                return redirect()->route('home.recommend', ['id' => $user->id]);
            } else {
                Auth::logout();
                return redirect('/login');
            }
        } else {
            return view('pages.auth.login');
        }
    }
    public function postLogin(Request $request)
    {
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($user)) {
            return redirect()->route('home.recommend', ['id' => Auth::user()->id]);
        } else {
            return redirect('/login');
        }
    }
    public function getLogout()
    {
        User::where('id', Auth::user()->id)->update(['status' => 0]);
        Auth::logout();
        return redirect('/login');
    }
}
