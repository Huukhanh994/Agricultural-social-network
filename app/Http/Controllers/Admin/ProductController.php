<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductFormRequest;
use App\Models\Attribute;
use App\Contracts\AttributeContract;
class ProductController extends BaseController
{
    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;
    protected $attributeRepository;
    public function __construct(BrandContract $brandRepository, CategoryContract $categoryRepository, ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $products = Product::with(['categories','brand','images'])->get();
        
        $this->setPageTitle('Products', 'Products List');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name','asc');
        $categories = $this->categoryRepository->listCategories('category_name', 'asc');

        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create', compact('categories','brands'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->createProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully', 'success', false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);

        $brands = $this->brandRepository->listBrands('name', 'asc');

        $categories = $this->categoryRepository->listCategories('category_name', 'asc');

        $attributes = Attribute::with('values')->get();

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'product','attributes'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully', 'success', false, false);
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully', 'success', false, false);
    }

}
