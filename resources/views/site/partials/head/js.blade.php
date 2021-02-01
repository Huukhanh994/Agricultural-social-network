<script src="{{asset('site/js/libs/webfontloader.min.js')}}"></script>
<script>
    WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
</script>

@yield('custom_head_js')

@stack('custom_head_scripts')