<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Models\Product;
use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;
use App\Models\Rating;
use Cart;
use Illuminate\Support\Facades\Auth;
use DataTables;
use PayPal\Api\Search;
use Response;
use DB;

class ProductController extends BaseController
{
    protected $productRepository;
    protected $attributeRepository;
    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::with(['categories','items','images', 'attributes','brand'])->get();
        $this->setPageTitle("Products","Products");
        return view('site.products.index',compact('products'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $users = DB::table('users')->join('ratings','ratings.user_id','=','users.id')
        ->join('products','ratings.rateable_id','=','products.product_id')
        ->select('ratings.*','users.*','products.*')
        ->where('products.product_id',$product->product_id)
        ->get();
        // dd($users);
        $reviews = DB::table('ratings')
        ->join('products','products.product_id','=', 'ratings.rateable_id')
        ->select(DB::raw('count(rating) as review_count, rateable_id'))
        ->where('products.product_id',$product->product_id)
        ->groupBy('rateable_id')
        ->orderBy('id','desc')
        ->get();
        $attributes = $this->attributeRepository->listAttributes();

        return view('site.pages.product', compact('product', 'attributes','reviews','users'));
    }
    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        \Cart::add(array(
            'id' => uniqid(),
            'name' => $product->product_name,
            'price' => $request->input('price'),
            'quantity' => $request->input('qty'),
            'attributes' => $request->get('product_image'),
            'options' => $options,
            'associatedModel' => $product
        ));
        // Cart::add(uniqid(), $product->product_name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function rating(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $post = Product::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->content = $request->get('content');
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);

        return redirect()->back();
    }
}
