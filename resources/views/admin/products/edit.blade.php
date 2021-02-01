@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone.min.css') }}" />
@endsection
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
                <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                <li class="nav-item"><a class="nav-link" href="#attributes" data-toggle="tab">Attributes</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                <div class="tile">
                    <div class="card">
                        <form action="{{ route('admin.products.update') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Product Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="product_name">Name</label>
                                    <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                                        placeholder="Enter attribute name" id="product_name" name="product_name"
                                        value="{{ old('product_name', $product->product_name) }}" />
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
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
                                                value="{{ old('product_sku', $product->product_sku) }}" />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_sku')
                                                <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="brand_id">Brand</label>
                                            <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                                <option value="0">Select a brand</option>
                                                @foreach($brands as $brand)
                                                @if ($product->brand_id == $brand->id)
                                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                                @else
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
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
                                                @php $check = in_array($category->category_id,
                                                $product->categories->pluck('category_id')->toArray()) ? 'selected' : ''@endphp
                                                <option value="{{ $category->category_id }}" {{ $check }}>{{ $category->category_name }}
                                                </option>
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
                                                value="{{ old('product_price', $product->product_price) }}" />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_price')
                                                <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="product_sale_price">Special Price</label>
                                            <input class="form-control" type="text" placeholder="Enter product special price"
                                                id="product_sale_price" name="product_sale_price"
                                                value="{{ old('product_sale_price', $product->product_sale_price) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="product_quantity">Quantity</label>
                                            <input class="form-control @error('product_quantity') is-invalid @enderror" type="number"
                                                placeholder="Enter product quantity" id="product_quantity" name="product_quantity"
                                                value="{{ old('product_quantity', $product->quantity) }}" />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_quantity')
                                                <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="product_weight">Weight</label>
                                            <input class="form-control" type="text" placeholder="Enter product weight" id="product_weight"
                                                name="product_weight" value="{{ old('product_weight', $product->product_weight) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="product_description">Description</label>
                                    <textarea name="product_description" id="product_description" rows="8"
                                        class="form-control">{{ old('product_description', $product->product_description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="product_status" name="product_status"
                                                {{ $product->product_status == 1 ? 'checked' : '' }} />Status
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="product_featured" name="product_featured"
                                                {{ $product->product_featured == 1 ? 'checked' : '' }} />Featured
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                            Product</button>
                                        <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i
                                                class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="images">
                <div class="tile">
                    <h3 class="tile-title">Upload Image</h3>
                    <hr>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <button class="btn btn-success" type="button" id="uploadButton">
                                    <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                </button>
                            </div>
                        </div>
                        @if ($product->images)
                        <hr>
                        <div class="row">
                            @foreach($product->images as $image)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('images/products/'.$image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                        <a class="card-link float-right text-danger"
                                            href="{{ route('admin.products.images.delete', $image->id) }}">
                                            <i class="fa fa-fw fa-lg fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="attributes">
                <div class="tile">
                    <h3 class="tile-title">Add attribute</h3>
                    <hr>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <form action="{{route('admin.products.attributes.store')}}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="card-body">
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Attribute</label>
                                                            <select class="form-control custom-select" name="attribute_id">
                                                                @foreach ($attributes as $attribute)
                                                                    <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <small class="form-control-feedback"> Select your gender </small> </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Price</label>
                                                            <input type="number" id="price" name="price" class="form-control form-control-danger" placeholder="Enter your price for attribute">
                                                            <small class="form-control-feedback"> This field has error. </small> </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Value</label>
                                                            <input type="text" id="values" name="value" class="form-control" placeholder="Enter your value">
                                                            <small class="form-control-feedback"> This is inline help </small> </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Quantity</label>
                                                            <input type="number" id="quantity" name="quantity" class="form-control form-control-danger" placeholder="Enter your quantiti for attribute">
                                                            <small class="form-control-feedback"> This field has error. </small> </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="card-body">
                                                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                    <button type="button" class="btn btn-dark">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('vue_script')
<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;

        $( document ).ready(function() {
            $('#categories').select2();

            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{ route('admin.products.images.upload') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
</script>
@endpush