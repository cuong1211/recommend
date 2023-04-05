<?php

namespace App\Services\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;


class ProductService
{
    function checkFile($data)
    {
        if (isset($data['img'])) {
            $file = $data['img'];
            if (config('app.env') == 'production') {
                $destination_path = "backend/assets/images/product/";
            } else {
                $destination_path = "public/backend/assets/images/product/";
            }
            $filename = $file->getClientOriginalName();
            $file->storeAs($destination_path, $filename);
            return $filename;
        }
    }
    public function index()
    {
        $index = Product::query()->with('category')->get();
        return $index;
    }
    public function create($data)
    {
        // dd($data);
        if (isset($data['img'])) {
            $image = $this->checkfile($data);
            // dd($image);
            $create = Product::create([
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'price' => $data['price'],
                'img' => $image,
                'description' => $data['description'],
            ]);
        }
        return $create;
    }
    public function edit($data, $id)
    {
        $data = (object)$data;
        $product = Product::find($id);
        if (isset($data->img)) {
            $image = $this->checkfile($data);
        } else {
            $image = $product->img;
        };
        $product->update([
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
            'category_id' => $data->category_id,
            'img' => $image,
        ]);
        return $product;
    }
    public function delete($id)
    {
        $delete = Product::where('id', $id)
            ->delete();
        return $delete;
    }
    public function download($filename)
    {
        if (config('app.env') == 'production') {
            $path = storage_path("backend/assets/images/product/" . $filename);
        } else {
            $path = storage_path("app/public/backend/assets/images/product/" . $filename);
        }

        if (!file_exists($path)) {
            abort(404);
        }
        $file = file_get_contents($path);
        $type = mime_content_type($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
