<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\InProduct\InProductService;
use Illuminate\Http\Request;
use App\Http\Requests\InProductRequest;
use App\Models\company;
use App\Models\Product;
use Yajra\DataTables\DataTables;

class InProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $inproductservice;
    public function __construct(InProductService $inproductservice)
    {
        $this->inproductservice = $inproductservice;
    }
    public function index()
    {
        $product = Product::query()->get();
        $company = company::query()->get();
        return view('pages.inproduct.main',compact('product','company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InProductRequest $request)
    {
        $data = $request->validated();
        $this->inproductservice->create($data);
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
                $ip = $this->inproductservice->index();
                return DataTables::of($ip)
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
    public function update(InProductRequest $request, $id)
    {
        $data = $request->validated();
        $this->inproductservice->edit($data, $id);
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
        $this->inproductservice->delete($id);
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
