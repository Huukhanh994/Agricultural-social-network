<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;

class ProductAttributeController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadAttributes()
    {
        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function productAttributes(Request $request)
    {
        $product = Product::findOrFail($request->id);

        return response()->json($product->attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->id);

        return response()->json($attribute->values);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::create($request->data);

        if ($productAttribute) {
            return response()->json(['message' => 'Product attribute added successfully.']);
        } else {
            return response()->json(['message' => 'Something went wrong while submitting product attribute.']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::findOrFail($request->id);
        $productAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Product attribute deleted successfully.']);
    }

    public function store(Request $request)
    {
        $product_attribute = new ProductAttribute();
        $product_attribute->attribute_id = $request->get('attribute_id');
        $product_attribute->value = $request->get('value');
        $product_attribute->quantity = $request->get('quantity');
        $product_attribute->price = $request->get('price');
        $product_attribute->product_id = $request->get('product_id');
        $product_attribute->save();

        if (!$product_attribute) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully', 'success', false, false);
    }
}
