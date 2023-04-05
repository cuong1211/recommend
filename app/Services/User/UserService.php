<?php

namespace App\Services\User;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserService
{
    public function index()
    {
        $oder = User::query()->get();
        return $oder;
    }
    public function create($data)
    {
        $create = User::create($data);
        return $create;
    }
    public function edit($data, $id)
    {
        // dd($data);
        $User = User::where('id', $id)
            ->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        return $User;
    }
    public function delete($id)
    {
        $delete = User::where('id', $id)
            ->delete();
        return $delete;
    }
}
