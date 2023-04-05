<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\in_product;
use App\Models\Order;
use App\Models\Company;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Enums\StatusType;
use Illuminate\Support\Carbon;


class StatisticalController extends Controller
{
    public function Product()
    {
        $product = Product::query()->get();
        // dd($sale);
        return view('pages.statistic.product',compact('product'));
    }
    public function SaleReport(Request $request)
    { 
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $now = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        if($start_date && $end_date){
            $order = Order::query()->with('product')->where('status', '1')->get()->whereBetween('date', [$request->start_date, $request->end_date]);
        }
        else{
            $order = Order::query()->with('product')->where('status', '1')->where('date',$now)->get();
    
        };
      
        return view('pages.statistic.report',compact('order','start_date','end_date','now'));
    }
}
