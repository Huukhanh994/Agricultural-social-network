<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ManagerOrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle("Manager Order","Manager Order");
        $orders = Order::with(['items', 'user'])->withCount('items')->orderBy('id','desc')->get();
        $order_total_count = DB::table('orders')->sum('orders.order_status');
        $order_total_item_count = DB::table('orders')->sum('orders.order_item_count');        
        $order_pending = DB::table('orders')
        ->where('orders.order_status', '=', 'pending')
        ->sum('orders.order_status');
        $order_processing = DB::table('orders')
        ->where('orders.order_status', '=', 'processing')
        ->sum('orders.order_status');
        // nong nghiep
        $product_agriculture = Product::with('categories')->whereHas('categories', function ($q) {
            $q->where('category_name', '=', 'Nông Nghiệp');
        })->get();
        // lam nghiep
        $product_forestry = Product::with('categories')->whereHas('categories', function ($q) {
            $q->where('category_name', '=', 'Lâm nghiệp');
        })->get();
        // thuy san
        $product_seafood = Product::with('categories')->whereHas('categories', function ($q) {
            $q->where('category_name', '=', 'Thủy Sản');
        })->get();
        $product_foods = Product::with('categories')->whereHas('categories', function ($q) {
            $q->where('category_name', '=', 'Thức ăn');
        })->get();
        // thuoc tru benh
        $product_medicine = Product::with('categories')->whereHas('categories', function ($q) {
            $q->where('category_name', '=', 'Thuốc trừ bệnh');
        })->get();

        $count_agriculture = count($product_agriculture);
        $count_forestry = count($product_forestry);
        $count_seafood  = count($product_seafood);
        $count_foods = count($product_foods);
        $count_medicine = count($product_medicine);
        $lineChart = DB::table('orders')
        ->select(
            DB::raw("year(created_at) as year"),
            DB::raw('SUM(order_grand_total) as order_grand_total'),
            DB::raw('SUM(order_item_count) as order_item_count')
        )->orderBy('created_at')
        ->groupBy(DB::raw('year(created_at)'))
        ->get();
        $result[] = ['Year','Grand_total','Item_count'];
        foreach ($lineChart as $key => $value) {
            $result[++$key] = [$value->year , (int)$value->order_grand_total, (int)$value->order_item_count];
        }

        return view('admin.manager_orders.index',compact('count_agriculture', 'count_forestry', 
        'count_seafood', 'count_foods', 
        'count_medicine', 'orders',
        'order_total_count','order_pending',
        'order_processing','order_total_item_count'))->with('chartLine', json_encode($result));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_number)
    {
        $order = Order::with(['user', 'items'])
        ->withAndWhereHas('items', function($q) {
            $q->with('product');
        })
        ->where('order_number',$order_number)->first();
        $this->setPageTitle("Show Order","Show Order");
        return view('admin.manager_orders.show',compact('order'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
