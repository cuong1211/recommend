<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Order\OrderService;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderservice;
    public function __construct(OrderService $orderservice)
    {
        $this->orderservice = $orderservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $order = Order::all();
        // return $order;
        // $order = $this->orderservice->index();
        // $order = (object)$order_array;
        // dd($order);
        $product = Product::query()->get();
        return view('pages.order.main', compact('product'));
        // $order = Order::all();
        // return Datatables::of($order)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $store = $this->orderservice->create($data);
        if ($store) {
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Thêm đơn hàng thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Thêm đơn hàng thất bại'
                ]
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case 'get-list':
                $order = $this->orderservice->index();
                return Datatables::of($order)->make(true);
                break;
            default:
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        // dd($request->all());
        $data = $request->validated();
        // dd($data);
        $update = $this->orderservice->edit($data, $id);
        if ($update) {
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Sửa đơn hàng thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Sửa đơn hàng thất bại'
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->orderservice->delete($id);
        if ($delete) {
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Xoá đơn hàng thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Xoá đơn hàng thất bại'
                ]
            );
        }
    }
}
