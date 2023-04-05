<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Order\OrderService;
use App\Models\in_product;
use Spatie\Searchable\Search;
use App\Models\User_Product;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    protected $orderservice;
    public function __construct(OrderService $orderservice)
    {
        $this->orderservice = $orderservice;
    }
    public function index()
    {

        $product = Product::offset(0)->limit(12)->get();
        // dd($product);

        return view('pages.frontend.main', compact('product'));
    }
    public function recommend($id)
    {
        $userId = $id;
        $items = User_Product::select('product_id')->distinct()->get()->pluck('product_id');
        $similarity = array();
        $total = array();

        foreach ($items as $item) {
            $similarity[$item] = 0;
            $total[$item] = 0;
        }

        $userRatings = User_Product::where('user_id', $userId)->get();

        foreach ($userRatings as $userRating) {
            $otherRatings = User_Product::where('product_id', $userRating->product_id)
                ->where('user_id', '!=', $userId)
                ->get();

            foreach ($otherRatings as $otherRating) {
                $similarity[$otherRating->product_id] += $otherRating->rate * $userRating->rate;
                $total[$otherRating->product_id] += $userRating->rate;
            }
        }

        $product_recom  = array();

        foreach ($items as $item) {
            if ($total[$item] != 0) {
                $product_recom [$item] = $similarity[$item] / $total[$item];
            }
        }

        arsort($product_recom );
        // dd($product_recom );
        $product = [];
        // dd($product_recom);
        foreach ($product_recom  as $key => $value) {
            $product[] = Product::find($key);
        }
        // dd($product);
        return view('pages.frontend.main', compact('product'));
    }
    public function getProduct(Request $request, $id)
    {
        // dd($request->all());
        if ($request->has('query')) {
            $search = $request->input('query');
            $product_search = Product::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $product_search = null;
            $search = null;
        }
        $cate = Category::query()->get();
        $product = Product::query()->where('category_id', $id)->paginate(12);
        return view('pages.frontend.shop', compact('product', 'cate', 'product_search', 'search', 'id'));
    }
    public function getDetail(Request $request, $id)
    {
        dd($request->all());
        $product = Product::find($id);
        return view('pages.frontend.detail', compact('product'));
    }
    public function getSearch(Request $request)
    {
        $search = $request->input('query');

        $product_search = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('pages.frontend.product', compact('product_search'));
    }
}
