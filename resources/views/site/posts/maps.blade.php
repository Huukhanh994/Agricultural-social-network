<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>All Article map</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 500px;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <!-- page css -->
    <link href="{{asset('dist/css/pages/google-vector-map.css')}}" rel="stylesheet">
</head>

<body>
    <div id="map" style="height: 100%"></div>
    <script>
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var labelIndex = 0;
        var posts = <?php echo $posts; ?>;
        function initMap() {
            var uluru = {lat: 10.0310, lng: 105.7689};
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: uluru,
            });
            posts.forEach(function(child){
                if (typeof child.post_lat !== 'undefined' || typeof child.post_lng !== 'undefined') {
                    addMarker({
                    coords: {lat:parseFloat(child.post_lat) ,lng:parseFloat(child.post_lng)},
                    iconImage: '',
                    content: '<div id="content">'+
                        '<div id="siteNotice">'+
                            '</div>'+
                        '<h3 id="firstHeading" class="firstHeading">"'+child.post_title+'"</h3>'+
                        '<div id="bodyContent">'+
                            '<p><b>Địa chỉ:</b>"'+child.post_content+'"' +
                                '<p><b>Fax:</b>+"'+child.post_price+'"' +
                                    '<p><b>Hotline:</b>"'+child.users['tel']+'"' +
                                    '<p><b>Email:</b>"'+child.users['name']+'"' +
                                    '<br>' +
                                    '<a href="https://www.google.com/maps/search/?api=1&query='+child.post_lat+','+child.post_lng+'" target="_blank" jstcache="15" jsaction="mouseup:placeCard.largerMap">View larger map</a>'+
                                    '</div>'
                    
                        });
                }
            })
            
            infoWindow = new google.maps.InfoWindow();
            const locationButton = document.createElement("button");
            locationButton.textContent = "Pan to Current Location";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
            locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("<h4>Here your location!!!!</h4>");
                    infoWindow.open(map);
                    map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            });
            function addMarker(props) {
                var marker = new google.maps.Marker({
                    position: props.coords,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    map: map,
                    title: 'Click to seen content',
                    label: labels[labelIndex++ % labels.length],
                });
                // Check show iconImage of marker
                if(props.iconImage) {
                    marker.setIcon(props.iconImage);
                }

                // Show content of marker
                if(props.content) {
                    var infowindow = new google.maps.InfoWindow({
                        content: props.content,
                        maxWidth: 200
                    });
                    // Click to seen content
                        marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                }
            

                // Animation marker
                function toggleBounce() {
                    if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                    } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                }
            }
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
        browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ4T7uMRtSWCTL-A7ce21J6rkYRGmK5do&callback=initMap&language=vn&region=VN"
        async defer>
    </script>
    <script src="{{asset('/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('/assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- google maps api -->
    <script src="{{asset('/assets/node_modules/gmaps/gmaps.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/gmaps/jquery.gmaps.js')}}"></script>
</body>

</html>