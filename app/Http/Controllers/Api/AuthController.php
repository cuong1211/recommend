<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;


class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255|email|unique:users',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'isAdmin' => 'required'

            ],[
            'name.required'=>'Bạn chưa nhập tên',    
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Xin mời nhập lại',
            'password.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
         
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'isAdmin' => $fields['isAdmin'],
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        return response($response, 201);
    }
    //log in
    public function login(Request $request){
        $fields = $request->validate([
         
            'email'=>'required|max:255|email',
            'password' => 'min:8',
           

            ]);
        //check email
        $user = User::where('email', $fields['email'])->first();
        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        return response($response, 201);
    }




    public function logout(){
       
        // Get user who requested the logout
    $user = request()->user(); //or Auth::user()
    // Revoke current user token
    $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        
       
        return [
            'message' => 'Logged out'
        ];
    }
}
