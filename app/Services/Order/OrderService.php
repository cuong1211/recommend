<?php

namespace App\Services\Order;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class OrderService
{
    public function index()
    {
        $oder = Order::query()->with('product')->latest();
        return $oder;
    }
    public function create($data)
    {
        $date = Carbon::now();
        $date = $date->toDateString();
        // dd($data);
        $create = Order::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'product_id' => $data['product_id'],
            'quantity' => $data['soluong'],
            'note'=>$data['note'],
            'date' => $date,
            'total' => $data['total'],
            'status' => $data['status'],
            'user_id' => $data['user_id'],
        ]);
        return $create;
    }
    public function edit($data, $id)
    {
        // dd($data);
        $date = Carbon::now();
        $date = $date->toDateString();
        if(isset($data['email'])){
            $email = $data['email'];
        }
        else{
            $email = '';
        }
        
        $order = Order::where('id', $id);
        $order->update([
                'name' => $data['name'],
                'email' => $email,
                'address' => $data['address'],
                'phone' => $data['phone'],
                'product_id' => $data['product_id'],
                'quantity' => $data['soluong'],
                'total' => $data['total'],
                'date' => $date,
                'status' => $data['status'],
            ]);
        return $order;
    }
    public function delete($id)
    {
        $delete = Order::where('id', $id)
            ->delete();
        return $delete;
    }
}
