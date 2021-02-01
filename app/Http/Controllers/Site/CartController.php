<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Facade\FlareClient\Http\Response;

class CartController extends Controller
{
    public function getCart()
    {
        // $product = Product::with(['categories','images','items','attributes','brand'])->where('product_id','=',$id)->first();
        return view('site.pages.cart');
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect('/');
    }

    public function addCoupon(Request $request)
    {
        $couponInput = $request->get('couponInput');

        $product = Product::with('coupons')->whereHas('coupons', function ($q) use ($couponInput) {
            $q->where('coupon_code', '=', $couponInput);
        })->where('product_id', '=', $request->get('id'))->first();

        if($product){
            // if ($product->product_sale_price != "") {
            //     $percent = 0;
                foreach ($product->coupons as $row) {
                    $percent = floatval($row->coupon_discount / 100);
                }
            //     $newSalePrice = floatval($product->product_sale_price * $percent);
            //     $update = DB::table('products')->where('product_id', '=', $request->get('productId'))->update('product_sale_price','=', $newSalePrice);
            // }else{
            //     $percent = 0;
            //     foreach ($product->coupons as $row) {
            //         $percent = floatval($row->coupon_discount / 100);
            //     }
            //     $newPrice = floatval($product->product_price * $percent);
            //     $update = DB::table('products')->where('product_id', '=', $request->get('productId'))->update('product_price','=',$newPrice);
            // }
            return response()->json(['success' => $product,'percent' => $percent]);
        }else{
            return response()->json(['fail' => 'The coupon not exist for product']);
        }
    }
}