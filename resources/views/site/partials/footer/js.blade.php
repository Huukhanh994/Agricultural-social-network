<!-- JS Scripts -->
<script src="{{asset('site/js/jQuery/jquery-3.4.1.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{asset('site/js/libs/jquery.appear.js')}}"></script>
<script src="{{asset('site/js/libs/jquery.mousewheel.js')}}"></script>
<script src="{{asset('site/js/libs/perfect-scrollbar.js')}}"></script>
<script src="{{asset('site/js/libs/jquery.matchHeight.js')}}"></script>
<script src="{{asset('site/js/libs/svgxuse.js')}}"></script>
<script src="{{asset('site/js/libs/imagesloaded.pkgd.js')}}"></script>
<script src="{{asset('site/js/libs/Headroom.js')}}"></script>
<script src="{{asset('site/js/libs/velocity.js')}}"></script>
<script src="{{asset('site/js/libs/ScrollMagic.js')}}"></script>
<script src="{{asset('site/js/libs/jquery.waypoints.js')}}"></script>
<script src="{{asset('site/js/libs/jquery.countTo.js')}}"></script>
<script src="{{asset('site/js/libs/popper.min.js')}}"></script>
<script src="{{asset('site/js/libs/material.min.js')}}"></script>
<script src="{{asset('site/js/libs/bootstrap-select.js')}}"></script>
<script src="{{asset('site/js/libs/smooth-scroll.js')}}"></script>
<script src="{{asset('site/js/libs/selectize.js')}}"></script>
<script src="{{asset('site/js/libs/swiper.jquery.js')}}"></script>
<script src="{{asset('site/js/libs/moment.js')}}"></script>
<script src="{{asset('site/js/libs/daterangepicker.js')}}"></script>
<script src="{{asset('site/js/libs/fullcalendar.js')}}"></script>
<script src="{{asset('site/js/libs/isotope.pkgd.js')}}"></script>
<script src="{{asset('site/js/libs/ajax-pagination.js')}}"></script>
<script src="{{asset('site/js/libs/Chart.js')}}"></script>
<script src="{{asset('site/js/libs/chartjs-plugin-deferred.js')}}"></script>
<script src="{{asset('site/js/libs/circle-progress.js')}}"></script>
<script src="{{asset('site/js/libs/loader.js')}}"></script>
<script src="{{asset('site/js/libs/run-chart.js')}}"></script>
<script src="{{asset('site/js/libs/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('site/js/libs/jquery.gifplayer.js')}}"></script>
<script src="{{asset('site/js/libs/mediaelement-and-player.js')}}"></script>
<script src="{{asset('site/js/libs/mediaelement-playlist-plugin.min.js')}}"></script>
<script src="{{asset('site/js/libs/ion.rangeSlider.js')}}"></script>
<script src="{{asset('site/js/libs/leaflet.js')}}"></script>
<script src="{{asset('site/js/libs/MarkerClusterGroup.js')}}"></script>

<script src="{{asset('site/js/main.js')}}"></script>
<script src="{{asset('site/js/libs-init/libs-init.js')}}"></script>
<script defer src="{{asset('site/fonts/fontawesome-all.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="{{asset('site/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
<script>
    $('#search').focusin(function(){
        fetch_customer_data();
        $('.show_list').show();
        });
        function fetch_customer_data(query = '')
        {
        $.ajax({
        url:"/ajaxSearch",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
        $('.show_list').html(data.table_data);
        }
        })
        }
        $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
        });
</script>
@yield('custom_js')
@stack('scripts')
