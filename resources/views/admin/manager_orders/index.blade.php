@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection
@push('scripts_head')
    <!-- Footable CSS -->
    <link href="{{asset('/assets/node_modules/footable/css/footable.bootstrap.min.css')}}" rel="stylesheet">
    <!-- Page CSS -->
    <link href="{{asset('dist/css/pages/contact-app-page.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/pages/footable-page.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manager orders</h4>
                    <div class="row m-t-40">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">{{$order_total_count}}</h1>
                                    <h6 class="text-white">Total Tickets</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white">{{$order_total_item_count}}</h1>
                                    <h6 class="text-white">Item count</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white">{{$order_processing}}</h1>
                                    <h6 class="text-white">Processing</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white">{{$order_pending}}</h1>
                                    <h6 class="text-white">Pending</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Order Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($orders))
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{route('admin.orders.show',$order->order_number)}}">#{{$order->order_number}}</a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">
                                                    @if (isset($order->user['avatar']))
                                                        <img src="{{asset('storage/users-avatar/'.$order->user['avatar'])}}" alt="user" class="img-circle" style="width: 30px; height:30px" />
                                                    @else
                                                        <img src="{{asset('/assets/images/users/1.jpg')}}" alt="user" class="img-circle" style="width: 30px; height:30px" />
                                                    @endif
                                                    {{$order->user['name']}}</a>
                                            </td>
                                            <td>{{$order->order_email}}</td>
                                            <td>{{$order->order_payment_method}}</td>
                                            <td>
                                                @switch($order->order_status)
                                                    @case('pending')
                                                        <span class="label label-info">{{$order->order_status}}</span>
                                                        @break
                                                    @case('processing')
                                                        <span class="label label-success">{{$order->order_status}}</span>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </td>
                                            <td>{{$order->order_address}}</td>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card-body">
                            <div class="card-title">
                                Orders
                            </div>
                            <div class="table-responsive">
                                <div id="barchart_material" style="width: 100%; height: 600px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-ld-12 col-md-12">
                        <div class="card-body">
                            <div id="linechart"></div>
                        </div>
                        <script type="text/javascript">
                            var chartLine = <?php echo $chartLine; ?>;
                              console.log(chartLine);
                              google.charts.load('current', {'packages':['corechart']});
                              google.charts.setOnLoadCallback(drawChart);
                              function drawChart() {
                                var data = google.visualization.arrayToDataTable(chartLine);
                                var options = {
                                  title: 'Site ChartLine Line Chart',
                                  curveType: 'function',
                                  legend: { position: 'bottom' }
                                };
                                var chart = new google.visualization.LineChart(document.getElementById('linechart'));
                                chart.draw(data, options);
                              }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- This is data table -->
    <script src="{{asset('/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(function () {
                $('#myTable').DataTable();
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
                // responsive table
                $('#config-table').DataTable({
                    responsive: true
                });
                $('#example23').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
            });
    
    </script>
    {{-- <script src="{{asset('/assets/node_modules/footable/js/footable.min.js')}}"></script>
    <script>
        $(function () {
                $('#demo-foo-addrow').footable();
            });
    </script> --}}
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Order Number', 'Grand total', 'Order Name'],

        @php
        foreach($orders as $order) {
            echo "['".$order->order_number."', ".$order->order_grand_total.", ".$order->order_item_count."],";
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
@endpush