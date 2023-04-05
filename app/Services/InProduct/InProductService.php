<?php

namespace App\Services\InProduct;

use App\Http\Requests\InProductRequest;
use App\Models\in_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class InProductService
{
    public function index()
    {
        $oder = in_product::query()->with('company','product')->get();
        return $oder;
    }
    public function create($data)
    {
        $create = in_product::create($data);
        return $create;
    }
    public function edit($data, $id)
    {
        $data = (object)$data;
        $InProduct = in_product::where('id', $id)
            ->update([
                'product_id' => $data->product_id,
                'company_id' => $data->company_id,
                'quantity' => $data->quantity,
                'total' => $data->total,
            ]);
        return $InProduct;
    }
    public function delete($id)
    {
        $delete = in_product::where('id', $id)
            ->delete();
        return $delete;
    }
}
