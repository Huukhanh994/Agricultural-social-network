<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('site/Bootstrap/dist/css/bootstrap-reboot.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/Bootstrap/dist/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/Bootstrap/dist/css/bootstrap-grid.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
<!-- Main Styles CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('site/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/css/fonts.min.css')}}">
<style>
        #upload_link {
            text-decoration: none;
        }
    
        #upload {
            display: none
        }
    
        #paginate {
            margin: auto;
            width: 50%;
            position: relative;
            left: 52px;
        }
    </style>
@yield('custom_css')

@yield('private_css')

@stack('css')