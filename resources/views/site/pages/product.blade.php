@extends('site.app_product')
@section('title-content', 'Show product')
@push('css')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link href="{{ asset('css/site/preview.css') }}" rel="stylesheet">
@endpush
@section('content')
    <section>
        <!-- Shop Product Detail -->
        <div class="shop-product-detail">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="thumbs-wrap">
                            <div class="small-thumbs-wrap js-zoom-gallery">
                                @foreach ($product->images as $item)
                                    @if ($item->full)
                                        <a href="{{asset('images/products/'.$item->full)}}" class="small-thumb">
                                            <img src="{{asset('images/products/'.$item->full)}}" alt="product">
                                        </a>
                                    @else
                                        <a href="https://via.placeholder.com/176" class="small-thumb">
                                            <img src="https://via.placeholder.com/176" alt="product">
                                        </a>
                                    @endif
                                @endforeach
                            </div>
    
                            <div class="shop-product-detail-thumb">
                                @if ($product->images->count() > 0)
                                    <a href="{{ asset('images/products/'.$product->images->first()->full) }}" data-fancybox="">
                                        <img src="{{ asset('images/products/'.$product->images->first()->full) }}" class="main-img" alt="">
                                    </a>
                                @else
                                    <img class="main-img" alt="product" src="https://via.placeholder.com/176">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="shop-product-detail-content">
                            <div class="main-content-wrap">
                                <div class="block-title">
                                    <a href="#" class="product-category">{{$product->categories[0]['category_name']}}</a>
                                    <h2 class="title bold">{{$product->product_name}}</h2>
                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1"
                                        value="{{ $product->userAverageRating }}" data-size="xs">
                                </div>
    
                                <div class="block-price">
                                    <div class="product-price"><span id="productPrice"></span>
                                        <input type="hidden" name="product_price" value="{{$product->product_price}}">
                                    </div>
                                </div>
                            </div>
    
                            <p>{{$product->product_description}}
                            </p>
                            <div class="mb-3">
                                @if ($product->product_sale_price > 0)
                                <var class="price h3 text-danger">
                                    <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num"
                                        id="productPrice">{{ $product->product_sale_price }}</span>
                                    <del class="price-old">
                                        {{ config('settings.currency_symbol') }}{{ $product->product_price }}</del>
                                </var>
                                @else
                                <var class="price h3 text-success">
                                    <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num"
                                        id="productPrice">{{ $product->product_price }}</span>
                                </var>
                                @endif
                            </div>
                            <hr>
                            <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <dl class="dlist-inline">
                                            @foreach($attributes as $attribute)
                                                @php
                                                if (count((array)$product->attributes) > 0)
                                                    $attributeCheck = in_array($attribute->id,
                                                    $product->attributes->pluck('attribute_id')->toArray());
                                                else
                                                $attributeCheck = [];
                                                @endphp
                                                @if ($attributeCheck)
                                                <dt>{{ $attribute->name }}: </dt>
                                                <dd>
                                                    <div class="form-group label-floating is-select">
                                                        <select class="selectpicker form-control" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                            <option data-price="0" value="0"> Select a
                                                                {{ $attribute->name }}</option>
                                                            @foreach($product->attributes as $attributeValue)
                                                            @if ($attributeValue->attribute_id == $attribute->id)
                                                            <option data-price="{{ $attributeValue->price }}" value="{{ $attributeValue->value }}">
                                                                {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                                            </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </dd>
                                                @endif
                                            @endforeach
                                        </dl>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <dl class="dlist-inline">
                                            <dt>Quantity: </dt>
                                            <dd>
                                                <input class="form-control" type="number" min="1" value="1" max="{{ $product->product_quantity }}"
                                                    name="qty" style="width:70px;">
                                                <input type="hidden" name="productId" value="{{ $product->product_id }}">
                                                @if (isset($product->images->first()->full))
                                                    <input type="hidden" name="product_image" value="{{$product->images->first()->full}}">
                                                @else
                                                    <input type="hidden" name="product_image" value="https://via.placeholder.com/176">
                                                @endif
                                                <input type="hidden" name="price" id="finalPrice"
                                                    value="{{ $product->product_sale_price != '' ? $product->product_sale_price : $product->product_price }}">
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i>
                                    Add To Cart</button>
                            </form>
                            <div class="article-number">
                                SKU:<span>{{$product->product_sku}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ... end Shop Product Detail -->
    </section>
    <section class="medium-padding120">
        <div class="container">
            <div class="row">
                <div class="col col-xl-8 m-auto col-lg-8 col-md-12 col-sm-12 col-12">
                    <!-- Product Description -->
                    <div class="product-description">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#additional" role="tab">
                                    Additional Description
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rewievs" role="tab">
                                    Customer Reviews
                                    {{-- <span class="total-topic">{{$reviews[0]->review_count}}</span> --}}
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active align-center" id="additional" role="tabpanel" data-mh="log-tab">
                                <!-- Comment Form  -->
                                <form class="comment-form inline-items" action="{{ route('site.products.rating') }}" method="POST">
                                    @csrf
                                    <div class="post__author author vcard inline-items">
                                        @if (Auth::user()->avatar)
                                            <img src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" alt="author">
                                        @endif
                                        <div class="form-group with-icon-right ">
                                            <textarea class="form-control" placeholder="" name="content"></textarea>
                                            <div class="rating">
                                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1"
                                                    value="{{ $product->userAverageRating }}" data-size="xs">
                                                <input type="hidden" name="id" required="" value="{{ $product->product_id }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg-2 btn-primary">Submit Review</button>
                                    <button class="btn btn-lg-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
                                </form>
                                <script type="text/javascript">
                                    $("#input-id").rating();
                                </script>
                                <!-- ... end Comment Form  -->
                            </div>
    
                            <div class="tab-pane" id="rewievs" role="tabpanel" data-mh="log-tab">
    
                                <div class="comments-title-wrap">
                                    <div class="block-title">
                                        @if (count($reviews) > 0)
                                            <h2 class="title">{{$reviews[0]->review_count}} Reviews</h2>
                                        @else
                                            0
                                        @endif
                                    </div>
                                    <div class="search-friend inline-items">
                                    </div>
                                </div>
                                <ul class="comments__list-review">
                                    @forelse ($users as $user)
                                        <li class="comments__item-review">
                                            <div class="comment-entry comment comments__article">
                                                <div class="comments__body ovh">
                                                    <h5 class="title">{{$user->name}}</h5>
                                                    <ul class="rait-stars">
                                                        @for ($i = 0; $i < $user->rating; $i++)
                                                            <li>
                                                                <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <div class="comment-content comment">
                                                        {{$user->content}}
                                                    </div>
                                                    <header class="comment-meta comments__header-review">
                                                        <time class="published comments__time-review" datetime="2017-10-02 12:00:00">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }} by</time>
                                                        <cite class="fn url comments__author-review">
                                                            <a href="#" rel="external" class=" ">{{$user->name}}</a>
                                                        </cite>
                                                    </header>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <h3>Not found review in this product.</h3>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ... end Product Description -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            var num = $('input[name="product_price"]').val();
            var value = parseFloat(num).toFixed(2);
            document.getElementById("productPrice").innerHTML = value + '$';

            // add to Cart
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
                });
                $('.option').change(function () {
                    $('#productPrice').html("{{ $product->product_sale_price != '' ? $product->product_sale_price : $product->product_price }}");
                    let extraPrice = $(this).find(':selected').data('price');
                    let price = parseFloat($('#productPrice').html());
                    let finalPrice = (Number(extraPrice) + price).toFixed(2);
                    $('#finalPrice').val(finalPrice);
                    $('#productPrice').html(finalPrice);
                });
        });
    </script>
@endpush