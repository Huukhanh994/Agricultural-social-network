@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection
@push('scripts_head')
<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endpush
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard 4</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard 4</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                New</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Info box -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">TOTAL VISIT</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash"></div>
                    <div class="ml-auto">
                        <h2 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">8659</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">TOTAL PAGE VIEWS</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash2"></div>
                    <div class="ml-auto">
                        <h2 class="text-purple"><i class="ti-arrow-up"></i> <span class="counter">7469</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">UNIQUE VISITOR</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash3"></div>
                    <div class="ml-auto">
                        <h2 class="text-info"><i class="ti-arrow-up"></i> <span class="counter">6011</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">BOUNCE RATE</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash4"></div>
                    <div class="ml-auto">
                        <h2 class="text-danger"><i class="ti-arrow-down"></i> <span class="counter">18%</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- ============================================================== -->
<!-- End Info box -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Sales Chart and browser state-->
<!-- ============================================================== -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="card-title m-b-40">SALES IN 2018</h5>
                        <p>Lorem ipsum dolor sit amet, ectetur adipiscing elit. viverra tellus. ipsumdolorsitda amet,
                            ectetur adipiscing elit.</p>
                        <p>Ectetur adipiscing elit. viverra tellus.ipsum dolor sit amet, dag adg ecteturadipiscingda
                            elitdglj. vadghiverra tellus.</p>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="chart has-fixed-height" id="pie_basic"></div>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="morris-area-chart" style="height:250px;"></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- ============================================================== -->
<!-- Review -->
<!-- ============================================================== -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ORDER STATUS</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>User</th>
                            <th>Order date</th>
                            <th>Amount</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tracking Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td><a href="{{route('admin.orders.show',$order->order_number)}}" class="link"> Order #{{$order->order_number}}</a></td>
                                <td>{{$order->user->name}}</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</span></td>
                                <td>${{$order->order_grand_total}}</td>
                                <td class="text-center">
                                @switch($order->order_status)
                                    @case('processing')
                                            <div class="label label-table label-success">{{$order->order_status}}</div>
                                        @break
                                    @case('pending')
                                            <div class="label label-table label-info">{{$order->order_status}}</div>
                                        @break
                                    @case('completed')
                                        <div class="label label-table label-warning">{{$order->order_status}}</div>
                                        @break
                                    @case('decline')
                                        <div class="label label-table label-danger">{{$order->order_status}}</div>
                                        @break
                                    @default
                                        <div class="label label-table label-success">{{$order->order_status}}</div>
                                @endswitch
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card-body">
            <div class="card-title">
                Orders
            </div>
            <div class="table-responsive">
                <div id="barchart_material" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
 
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Order Id', 'Grand total', 'Order Name'],
 
            @php
              foreach($orders as $order) {
                  echo "['".$order->id."', ".$order->order_grand_total.", ".$order->order_item_count."],";
              }
            @endphp
        ]);
 
        var options = {
          chart: {
            title: 'Bar Graph | Price',
            subtitle: 'Price, and Product Name: @php echo $orders[0]->created_at @endphp',
          },
          bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>
<script type="text/javascript">
    var pie_basic_element = document.getElementById('pie_basic');
    if (pie_basic_element) {
        var pie_basic = echarts.init(pie_basic_element);
        pie_basic.setOption({
            color: [
                '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
            ],          
            
            textStyle: {
                fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                fontSize: 13
            },

            title: {
                text: 'Pie Chart Example',
                left: 'center',
                textStyle: {
                    fontSize: 17,
                    fontWeight: 500
                },
                subtextStyle: {
                    fontSize: 12
                }
            },

            tooltip: {
                trigger: 'item',
                backgroundColor: 'rgba(0,0,0,0.75)',
                padding: [10, 15],
                textStyle: {
                    fontSize: 13,
                    fontFamily: 'Roboto, sans-serif'
                },
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },

            legend: {
                orient: 'horizontal',
                bottom: '0%',
                left: 'center',                   
                data: ['Product Agriculture', 'Product Forestry','Product Seafood','Product Foods','Product Medicine'],
                itemHeight: 8,
                itemWidth: 8
            },

            series: [{
                name: 'Product Type',
                type: 'pie',
                radius: '70%',
                center: ['50%', '50%'],
                itemStyle: {
                    normal: {
                        borderWidth: 1,
                        borderColor: '#fff'
                    }
                },
                data: [
                    {value: {{$count_agriculture}}, name: 'Product Agriculture'},
                    {value: {{$count_forestry}}, name: 'Product Forestry'},
                    {value: {{$count_seafood}}, name: 'Product Seafood'},
                    {value: {{$count_foods}}, name: 'Product Foods'},
                    {value: {{$count_medicine}}, name: 'Product Medicine'},
                ]
            }]
        });
    }
</script>
@endsection