<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $productservice;
    public function __construct(ProductService $productservice)
    {
        $this->productservice = $productservice;
    }
    public function index()
    {
        $cate = Category::query()->get();
        return view('pages.product.main', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $dowload = $this->productservice->download($id);
        return $dowload;
    }
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $this->productservice->create($data);
        return response()->json(
            [
                'type' => 'success',
                'title' => 'success',
                'content' => 'Thêm thành công'
            ],
            200
        );
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
                $product = $this->productservice->index();
                return Datatables::of($product)
                    ->make(true);
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
    public function update(ProductRequest $request, $id)
    {
        // dd($request->all());
        $data = $request->validated();
        $this->productservice->edit($data, $id);
        return response()->json(
            [
                'type' => 'success',
                'title' => 'success',
                'content' => 'Sửa thành công'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productservice->delete($id);
        return response()->json(
            [
                'type' => 'success',
                'title' => 'success',
                'content' => 'Xóa thành công'
            ],
            200
        );
    }
}
