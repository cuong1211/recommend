<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    protected $companyservice;
    public function __construct(CompanyService $companyservice)
    {
        $this->companyservice = $companyservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.company.main');
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
    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        $this->companyservice->create($data);
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
                $company = $this->companyservice->index();
                return DataTables::of($company)
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
    public function update(CompanyRequest $request, $id)
    {
    
        $data = $request->validated();
        $this->companyservice->edit($data, $id);
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
        $this->companyservice->delete($id);
        return response()->json(
            [
                'type' => 'success',
                'title' => 'success',
                'content' => 'Xoá thành công'
            ],
            200
        );
    }
}
