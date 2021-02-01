@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <h3><b>INVOICE</b> <span class="pull-right">#{{$order->order_number}}</span></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger">Agricultural Social Network Shopping</b></h3>
                                <p class="text-muted m-l-5">College of Information & Communication Technology- Can Tho University,
                                    <br /> Address: 3/2 Street, Ninh Kieu District, Can Tho City, Vietnam,
                                    <br /> Phone: 0333405912,
                                    <br /> Email: khanhb1605219@student.ctu.edu.vn</p>
                            </address>
                        </div>
                        <div class="pull-right text-right">
                            <address>
                                <h3>To,</h3>
                                <h4 class="font-bold">{{$order->order_name}},</h4>
                                <p class="text-muted m-l-30">{{$order->order_email}},
                                    <br /> {{$order->order_address}},
                                    <br /> {{$order->order_city}},
                                    <br /> {{$order->order_tel}}</p>
                                <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($order->created_at)->isoFormat('LLLL')}}</p>
                                <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($order->updated_at)->isoFormat('LLLL')}}</p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Product Name</th>
                                        <th>Product Price</th>
                                        <th class="text-right">Description</th>
                                        <th class="text-right">Sale Price</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($order->items))
                                        @forelse ($order->items as $item)
                                            <tr>
                                                <td class="text-center">{{$item->product['product_name']}}</td>
                                                <td>{{$item->product['product_price']}}</td>
                                                <td class="text-right">{{$item->product['product_description']}} </td>
                                                <td class="text-right"> ${{$item->product['product_sale_price']}} </td>
                                                <td class="text-right"> {{$item->order_item_quantity}} </td>
                                                <td class="text-right"> $ {{$item->order_item_price}}</td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">
                            <h3><b>Total :</b> ${{$order->order_grand_total}}</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i
                                        class="fa fa-print"></i> Print</span> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection