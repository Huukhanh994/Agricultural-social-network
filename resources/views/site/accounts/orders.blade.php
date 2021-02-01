@extends('site.app')
@section('title', 'Orders')
@section('content')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">My Account - Orders</h2>
    </div>
</section>
<section class="section-content bg padding-y border-top">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <main class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Order No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Order Amount</th>
                            <th scope="col">Qty.</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <th scope="row">
                                <a href="{{route('site.accounts.showOrder',$order->order_number)}}">#{{ $order->order_number }}</a>
                            </th>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ config('settings.currency_symbol') }}{{ round($order->order_grand_total, 2) }}</td>
                            <td>{{ $order->order_item_count }}</td>
                            @switch($order->order_status)
                                @case('processing')
                                    <td><span class="badge badge-success" style="background: #1dff1d;">{{ strtoupper($order->order_status) }}</span></td>
                                    @break
                                @case('pending')
                                    <td><span class="badge badge-success">{{ strtoupper($order->order_status) }}</span></td>
                                    @break
                                @default
                                    <td><span class="badge badge-success">{{ strtoupper($order->order_status) }}</span></td>
                            @endswitch
                            <td>
                                {{\Carbon\Carbon::parse($order->created_at)->isoFormat('LLLL')}}
                            </td>
                        </tr>
                        @empty
                        <div class="col-sm-12">
                            <p class="alert alert-warning">No orders to display.</p>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</section>
@stop