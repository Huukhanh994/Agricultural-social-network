@extends('site.app')
@push('custom_head_scripts')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
    <div class="row">
        @foreach ($products as $product)
        <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <!-- Product Item -->
            <div class="shop-product-item">
                @if ($product->images->count() > 0)
                <div class="product-thumb">
                    
                    @foreach ($product->images as $item)
                        <img src="{{asset('images/products/'.$item->full)}}" alt="product">
                    @endforeach
                </div>
                @else
                <div class="product-thumb">
                    <img src="{{asset('site/img/shop-product1.png')}}" alt="product">
                </div>
                @endif
                <div class="product-content">
                    <div class="block-title">
                        <a href="#" class="product-category">{{$product->product_name}}</a>
                        <a href="{{route('site.products.show',$product->product_slug)}}" class="h5 title">
                            @if($product->product_code)
                                {{$product->product_code}}
                            @else
                                {{$product->product_name}}
                            @endif</a>
                    </div>
                </div>
            </div>
            <!-- ... end Product Item -->
        </div>
        @endforeach
@endsection
@push('scripts')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('site.products.list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'product_code', name: 'product_code'},
                    {data: 'product_slug', name: 'product_slug'},
                    {data: 'product_price', name: 'product_price'},
                    {data: 'product_description', name: 'product_description'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
            
            });
    </script>
@endpush