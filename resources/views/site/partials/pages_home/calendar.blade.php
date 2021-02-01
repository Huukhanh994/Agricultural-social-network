@section('custom_head_js')
    <!-- Date picker plugins css -->
    <link href="{{asset('/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
    <div class="ui-block">
        <div class="col-md-4">
            <div class="text-center">
                <center>
                    <div id="datepicker-inline"></div>
                </center>
            </div>
        </div>
    </div>
@push('scripts')
    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script>
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
    </script>
@endpush