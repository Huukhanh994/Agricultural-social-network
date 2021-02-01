@extends('site.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <!-- Today Events -->

                <div class="today-events calendar">
                    <div class="today-events-thumb">
                        <div class="date">
                        <div class="day-number">{{date('d', strtotime($dateToday))}}</div>
                            <div class="day-week">{{date('l', strtotime($dateToday))}}</div>
                            <div class="month-year">{{date('m', strtotime($dateToday))}} year {{date('Y', strtotime($dateToday))}}</div>
                        </div>
                    </div>
                        
                    </div>
                    <div class="ui-block-content">
                        <form>
                            <div class="crumina-module crumina-heading with-title-decoration">
                                <h5 class="heading-title">Order Totals</h5>
                            </div>
                            <!-- Order Totals List -->
                            <ul class="order-totals-list">
                                <li>
                                    Cart Subtotal <input type="text" name="price" id="price" value="">
                                </li>
                                <li>
                                    <input type="number" name="quantity" id="quantity" placeholder="Enter your Quantity" value="10" required>
                                </li>
                                <li class="total">
                                    Order Total <span>$95</span>
                                </li>
                            </ul>
                            <!-- ... end Order Totals List -->
                            <!-- Payment Methods List -->
                            <ul class="payment-methods-list">
                                <!-- Set up a container element for the button -->
                                <div id="paypal-button-container" style="width: 350px"></div>
                            </ul>
                        <!-- Include the PayPal JavaScript SDK -->
                        <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
                        <script>
                            // Render the PayPal button into #paypal-button-container
                            paypal.Buttons({
                                // Set up the transaction
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: '0.01'
                                            }
                                        }]
                                    });
                                },
                                // Finalize the transaction
                                onApprove: function(data, actions) {
                                    return actions.order.capture().then(function(details) {
                                        // Show a success message to the buyer
                                        alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                    });
                                }
                            }).render('#paypal-button-container');
                        </script>
                            <!-- ... end Payment Methods List -->
                        
                            <a href="#" class="btn btn-purple btn-lg full-width">Place Order</a>
                        </form>
                    </div>
                </div>

                <!-- ... end Today Events -->
            </div>
        <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Forms Order</h6>
                </div>
                <div class="ui-block-content">
                    <form action="{{route('site.orders.store')}}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-8 col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" placeholder="Enter your Name" value="{{Auth::user()->name}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" placeholder="Enter your Email"
                                                    value="{{Auth::user()->email}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" id="address" placeholder="Enter your Address"
                                                    value="{{Auth::user()->address}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" id="quantity" placeholder="Enter your Quantity" value="10" required>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" name="city" id="city" placeholder="Enter your City" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tel">Tel</label>
                                                <input type="text" name="tel" id="tel" placeholder="Enter your Phone" value="{{Auth::user()->tel}}"required>
                                            </div>
                                            <div class="form-group">
                                                <label for="notes">Notes</label>
                                                <input type="text" name="notes" id="notes" placeholder="Enter your Notes"required>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="">Product price</label>
                                                    <input type="hidden" id="product_price" name="product_price" value="{{$product['post_price']}}">
                                                    <input type="hidden" name="product_type" value="{{$product->categories->category_code}}">
                                                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                                   
                                                    <input type="text" name="price" id="price" value="">
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary">Back</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function () {
               var price = $("#product_price").val();
               $("#price").val($('#quantity').val() * price);
               $('#quantity').on('change', function() {
                   var total = $(this).val() * price;
                   $("#price").val(total.toFixed(1));
               })
            });
    </script>
@endsection