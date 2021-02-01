@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row user">
    <div class="col-md-3">
        <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                <div class="tile">
                    <form action="{{ route('admin.products.store') }}" method="POST" role="form">
                        @csrf
                        <h3 class="tile-title">Product Information</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="product_name">Name</label>
                                <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                                    placeholder="Enter attribute name" id="product_name" name="product_name"
                                    value="{{ old('product_name') }}" />
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_name')
                                    <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="product_sku">SKU</label>
                                        <input class="form-control @error('product_sku') is-invalid @enderror" type="text"
                                            placeholder="Enter product sku" id="product_sku" name="product_sku"
                                            value="{{ old('product_sku') }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_sku')
                                            <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="brand_id">Brand</label>
                                        <select name="brand_id" id="brand_id"
                                            class="form-control @error('brand_id') is-invalid @enderror">
                                            <option value="0">Select a brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('brand_id')
                                            <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="categories">Categories</label>
                                        <select name="categories[]" id="categories" class="form-control" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="product_price">Price</label>
                                        <input class="form-control @error('product_price') is-invalid @enderror" type="text"
                                            placeholder="Enter product price" id="product_price" name="product_price"
                                            value="{{ old('product_price') }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_price')
                                            <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="product_sale_price">Special Price</label>
                                        <input class="form-control" type="text"
                                            placeholder="Enter product special price" id="product_sale_price"
                                            name="product_sale_price" value="{{ old('product_sale_price') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="product_quantity">Quantity</label>
                                        <input class="form-control @error('product_quantity') is-invalid @enderror"
                                            type="number" placeholder="Enter product quantity" id="product_quantity"
                                            name="product_quantity" value="{{ old('product_quantity') }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_quantity')
                                            <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="product_weight">Weight</label>
                                        <input class="form-control" type="text" placeholder="Enter product weight"
                                            id="product_weight" name="product_weight" value="{{ old('product_weight') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="product_description">Description</label>
                                <textarea name="product_description" id="product_description" rows="8" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="product_status"
                                            name="product_status" />Status
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="product_featured"
                                            name="product_featured" />Featured
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i>Save Product</button>
                                    <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i
                                            class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
<script>
    $( document ).ready(function() {
            $('#categories').select2();
        });
</script>
@endpush