<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Order\OrderService;
use App\Models\in_product;
use App\Models\Order;
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
                $product_recom[$item] = $similarity[$item] / $total[$item];
            }
        }

        arsort($product_recom);
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
    public function getProductDetail($id)
    {
        // $product_info = Product::findOrFail($id);
        $product = Product::query()->where('id', $id)->with('category')->first();
        $userRatings = User_Product::where('product_id', $id)->get();
        // dd($userRatings);
        $similarItems = [];
        foreach ($userRatings as $rating) {
            $similarRatings = User_Product::where('user_id', $rating->user_id)
                ->where('product_id', '!=', $id)
                ->get();
            foreach ($similarRatings as $similarRating) {
                if (!array_key_exists($similarRating->product_id, $similarItems)) {
                    $similarItems[$similarRating->product_id] = [
                        'id' => $similarRating->product_id,
                        'score' => 0,
                        'count' => 0,
                    ];
                }
                $similarItems[$similarRating->product_id]['score'] += $similarRating->rate;
                $similarItems[$similarRating->product_id]['count']++;
            }
        }
        // dd($similarItems);
        foreach ($similarItems as $key => $item) {
            $similarItems[$key]['score'] = $item['score'] / $item['count'];
        }

        uasort($similarItems, function ($a, $b) {
            // dd($a, $b);
            return $b['score'] - $a['score'];
        });
        // $similarItems contain information of item
        foreach ($similarItems as $key => $item) {
            // find product by id and add category
            $similarItems[$key] = Product::find($item['id']);
            //add category
            $similarItems[$key]['category'] = $similarItems[$key]->category;
        }
        // dd($similarItems, $product);
        return view('pages.frontend.product-detail', compact('product', 'similarItems'));
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
    public function getOrder($id)
    {
        $order = Order::where('user_id', $id)
            ->where('status', 1)
            ->whereNotIn('product_id', function ($query) use ($id) {
                $query->select('product_id')
                    ->from('user_product')
                    ->where('user_id', $id);
            })
            ->with('product')
            ->get();
        return view('pages.frontend.order', compact('order'));
    }
    public function postRate(Request $request)
    {
        // dd($request->all());
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $rate = $request->rate;
        $user_rating = User_Product::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'rate' => $rate
        ]);
        return redirect()->back();
    }
}
