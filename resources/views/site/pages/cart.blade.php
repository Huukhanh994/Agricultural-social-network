@extends('site.app')
@section('title', 'Shopping Cart')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                @if (\Cart::isEmpty())
                    <p class="alert alert-warning">Your shopping cart is empty</p>
                @else
                    <form action="#" method="post" class="cart-main">
                        <!-- Shop Table Cart -->
                        <table class="shop_table cart">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">ITEM DESCRIPTION</th>
                                    <th class="product-price">UNIT PRICE</th>
                                    <th class="product-quantity">QUANTITY</th>
                                    <th class="product-subtotal">TOTAL</th>
                                    <th class="product-remove">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\Cart::getContent() as $index => $item)
                                    <tr class="cart_item">
                                        <td class="product-thumbnail">
                                            <div class="cart-product__item">
                                                    <a href="{{ asset('images/products/'.$item->attributes->first()) }}" class="product-thumb js-zoom-image">
                                                        <img src="{{ asset('images/products/'.$item->attributes->first()) }}" alt="product"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                    </a>
                                                    <div class="cart-product-content">
                                                        <a href="#" class="product-category">{{$item->associatedModel->product_name}}</a>
                                                        <a href="#" class="h6 cart-product-title">{{$item->name}}</a>
                                                        <ul class="rait-stars">
                                                            <li>
                                                                <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                            </li>
                                        
                                                            <li>
                                                                <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </div>
                                        </td>
                                                <td class="cart_price">
                                                    <p class="price_jq">{{$item->price}}</p>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="form-group label-floating quantity">
                                                        <input type='button' value='-' class='qtyminus' field='quantity' />
                                                        <input type='text' name='quantity' value='{{$item->quantity}}' class='qty' />
                                                        <input type='button' value='+' class='qtyplus' field='quantity' />
                                                    </div>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price"></p>
                                                </td>
                                    
                                        <td class="product-remove">
                                            <a href="{{ route('checkout.cart.remove', $item->id) }}" class="product-del remove" title="Remove this item">
                                                <svg class="olymp-close-icon">
                                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="actions">
                                        <div class="form-inline coupon">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Enter Coupon</label>
                                                <input class="form-control bg-white" placeholder="" name="coupon" value="SALE20" type="text"
                                                    name="coupon_code">
                                            </div>
                                            <button class="btn btn-blue btn-lg" id="btnApply">Apply</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- ... end Shop Table Cart -->
                    </form>
                @endif
            </div>
            <div class="col-md-4">
                <form action="{{route('checkout.index')}}" method="post">
                    @csrf
                    <a href="{{ route('checkout.cart.clear') }}" class="btn btn-danger btn-block mb-4">Clear Cart</a>
                    <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
                    <div class="crumina-module crumina-heading with-title-decoration">
                        <h5 class="heading-title">Order Totals</h5>
                    </div>
                    <!-- Order Totals List -->
                    <ul class="order-totals-list">
                        <li>
                            Cart Subtotal <div id="total"></div>
                        </li>
                        <li>
                            Shipping & Handling <span id="shipping">$20</span>
                        </li>
                        <li>
                            Coupon / Discount <span id="coupon_discount"></span>
                        </li>
                        <li>
                            Total quantity <span id="totalQuantity">{{\Cart::getTotalQuantity()}}</span>
                        </li>
                        <li class="total">
                            Order Total {{ config('settings.currency_symbol') }}<span id="finalTotalPrice"></span>
                        </li>
                    </ul>
                    <hr>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="{{ asset('frontend/images/icons/pay-visa.png') }}"></aside>
                        <div class="text-wrap small text-muted">
                            Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside"> <img src="{{ asset('frontend/images/icons/pay-mastercard.png') }}"> </aside>
                        <div class="text-wrap small text-muted">
                            Pay by MasterCard and Save 40%.
                            <br> Lorem ipsum dolor
                        </div>
                    </figure>
                    <input type="hidden" name="finalTotalPrice" value="">
                    <input type="hidden" name="shipping" value="20">
                    <input type="hidden" name="totalQuantity" value="">
                    <input type="hidden" name="total" value="">
                    <button type="submit" class="btn btn-purple btn-lg full-width">Proceed To Checkout</button>
                    <!-- ... end Form Calculate Shiping -->
                </form>
                <a href="{{route('site.checkout.vnpay')}}" class="btn btn-blue btn-lg full-width">Proceed to VNPay</a>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(function() {
        $('.qtyplus').click(function(e){
            e.preventDefault();
            fieldName = $(this).attr('field');
            
            //Fetch qty in the current elements context and since you have used class selector use it.
            var qty = $(this).closest('tr').find('.qty');
            //var qty = $(this).closest('tr').find('input[name='+fieldName+']');
            
            var currentVal = parseInt(qty.val());
            if (!isNaN(currentVal)) {
                qty.val(currentVal + 1);
            } else {
                qty.val(0);
            }
            
            //Trigger change event
            qty.trigger('change');
        });
        
        $(".qtyminus").click(function(e) {
            e.preventDefault();
            fieldName = $(this).attr('field');
            
            //Fetch qty in the current elements context and since you have used class selector use it.
            var qty = $(this).closest('tr').find('.qty');
            //var qty = $(this).closest('tr').find('input[name='+fieldName+']');
            
            var currentVal = parseInt(qty.val());
            if (!isNaN(currentVal) && currentVal > 0) {
                qty.val(currentVal - 1);
            } else {
                qty.val(0);
            }
            
            //Trigger change event
            qty.trigger('change');
        });
        
        //Bind the change event
        $(".qty").change(function() {
            var sum = 0;
            var total = 0;
            var totalCount = 0;
            var shippingPrice = $("#shipping").text().substr(1);
            $('.price_jq').each(function () {
                var price = $(this);
                var count = price.closest('tr').find('.qty');
                totalCount = totalCount + parseInt(count.val());
                sum = (price.html() * count.val());
                total = total + sum;
                price.closest('tr').find('.cart_total_price').html(sum + "$");
            });
            $('#finalTotalPrice').text((parseFloat(total) + parseFloat(shippingPrice))+'$');
            $('input[name="finalTotalPrice"]').val((parseFloat(total) + parseFloat(shippingPrice)));
            $('#total').html("<h3>$" + total + "</h3>");
            $('input[name="total"]').val(total);
            $("#totalQuantity").text(totalCount);
            $('input[name="totalQuantity"]').val(totalCount);

        }).change(); //trigger change event on page load

    });
    $(document).ready(function () {
        
        var total = 0.0;
        $('input[name^="totalPriceInput"]').each(function(i,child) {
            var id = $(child).attr('data-id');
            var num = $('input[name="total_price'+id+'"]').val();
            var qty = $('input[name="qty'+id+'"]').val();
            var totalPrice = parseFloat(num) * parseFloat(qty);
            var value = parseFloat(totalPrice).toFixed(2);
            $('input[id="totalPrice'+id+'"]').val(value);
            total += parseFloat($(child).val());
        })
        document.getElementById('subTotal').innerHTML = total;
        var totalSecond = 0.0;
        $('input[name^="qty"]').on('change',function() {
            var totalFrom = $('#subTotal').text();
            var idKey = $(this).attr('name').substr(3);
            var id = idKey;
            var num = $('input[name="total_price'+idKey+'"]').val();
            var strId = 'totalPrice' + idKey;
            var totalPrice = parseFloat(num) * parseFloat($(this).val());
            var value = parseFloat(totalPrice).toFixed(2);
            $('input[id="totalPrice'+id+'"]').val(value + '$');
            $('input[name="totalPriceFinal'+idKey+'"]').val(value);
        });
    });
    $('#btnApply').click(function(e) {
        e.preventDefault();
        var totalPrice = $("#total h3").text().substr(1);
        var couponInput = $('input[name="coupon"]').val();
        var productId = $('input[name="productId"]').val();
        var shippingPrice = $("#shipping").text().substr(1);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        type: "POST",
        url: '/cart/addCouponRequest',
        data: {id:productId,couponInput: couponInput},
        success: function (response) {
            if(response.success){
                var newTotalPrice = parseFloat(totalPrice) * parseFloat(response.percent);
                $("#total h3").text('$'+newTotalPrice.toFixed(2));
                $('input[name="total"]').val(newTotalPrice.toFixed(2));
                $('#coupon_discount').text(parseInt(response.percent * 100)+'%');
            }else{
                alert(response.fail);
            }
            }
        });
    })
</script>
@endpush
