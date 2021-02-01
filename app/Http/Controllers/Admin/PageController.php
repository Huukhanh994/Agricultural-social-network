<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function dashboard()
    {
        // nong nghiep
        $product_agriculture = Product::with('categories')->whereHas('categories',function($q) {
            $q->where('category_name','=', 'Nông Nghiệp');
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
        $this->setPageTitle("Management System", "Management System");
        $orders = Order::with(['items','user'])->get();
        return view('admin.dashboard.index',compact('count_agriculture', 'count_forestry', 'count_seafood', 'count_foods', 'count_medicine','orders'));
    }
}
