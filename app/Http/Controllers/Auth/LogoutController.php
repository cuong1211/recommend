<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LogoutController extends Controller
{
    
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
