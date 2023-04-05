<?php

namespace App\Services\Category;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryService
{
    public function index()
    {
        $index = Category::query()->get();
        return $index;
    }
    public function create($data)
    {
        $create = Category::create($data);
        return $create;
    }
    public function edit($data, $id)
    {

        // $a = 'ObjectId';
        // $Category_old = $a."("."'".$id."'".")";
        // dd($data);
        $Category = Category::find($id)
            ->update([
                'name' => $data['name'],
                'slug' => $data['slug'],
            ]);
        // $Category = Category::find($obId)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        // ]);
        return $Category;
    }
    public function delete($id)
    {
        $delete = Category::find($id)
            ->delete();
        return $delete;
    }
}
