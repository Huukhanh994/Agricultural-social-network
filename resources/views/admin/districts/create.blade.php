@extends('admin.app')

@section('content')
    <h1>Create district</h1>
    <form method="post" action="{{route('admin.districts.store')}}">
        @csrf
        <div class="form-group">
        <label for="address_address">Address</label>
        <input type="text" id="address-input" name="address_address" class="form-control map-input">
        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
        </div>
        <div id="address-map-container" style="width:100%;height:400px; ">
            <div style="width: 100%; height: 100%" id="address-map"></div>
        </div>
    </form>
@endsection
@section('scripts')
@parent
<script async defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBJ4T7uMRtSWCTL-A7ce21J6rkYRGmK5do&callback=initialize&libraries=places&sensor=false" type="text/javascript"></script>
{{-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ4T7uMRtSWCTL-A7ce21J6rkYRGmK5do&callback=initialize"
    type="text/javascript"></script> --}}
<script src="/js/mapInput.js"></script>
@stop
