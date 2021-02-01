<!DOCTYPE html>
<html>

<head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        html,
        body,
        #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
    </style>
</head>

<body>
    <div id="map-canvas" style="height: 350px; width: 700px; margin: 0 auto"></div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
    var map;
        
        function initialize() {
            const myLatlng = { lat: 10.762622, lng: 106.660172 };
            var mapOptions = {
                center: myLatlng,
                zoom: 8
            };
            
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            
            // Create the DIV to hold the control and call the constructor passing in this DIV
            var geolocationDiv = document.createElement('div');
            var geolocationControl = new GeolocationControl(geolocationDiv, map);
            
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(geolocationDiv);

            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get Lat/Lng!",
                position: myLatlng,
            });
            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });

                infoWindow.setContent(
                    JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                );
                console.log(infoWindow.content);
                infoWindow.open(map);
            });
        }
        
        function GeolocationControl(controlDiv, map) {
            // Set CSS for the control button
            var controlUI = document.createElement('div');
            controlUI.style.backgroundColor = '#444';
            controlUI.style.borderStyle = 'solid';
            controlUI.style.borderWidth = '1px';
            controlUI.style.borderColor = 'white';
            controlUI.style.height = '28px';
            controlUI.style.marginTop = '5px';
            controlUI.style.cursor = 'pointer';
            controlUI.style.textAlign = 'center';
            controlUI.title = 'Click to center map on your location';
            controlDiv.appendChild(controlUI);
            
            // Set CSS for the control text
            var controlText = document.createElement('div');
            controlText.style.fontFamily = 'Arial,sans-serif';
            controlText.style.fontSize = '10px';
            controlText.style.color = 'white';
            controlText.style.paddingLeft = '10px';
            controlText.style.paddingRight = '10px';
            controlText.style.marginTop = '8px';
            controlText.innerHTML = 'Center map on your location';
            controlUI.appendChild(controlText);
            
            // Setup the click event listeners to geolocate user
            google.maps.event.addDomListener(controlUI, 'click', geolocate);
        }

        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    // Create a marker and center map on user location
                    marker = new google.maps.Marker({
                        position: pos,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        map: map
                    });
                    console.log(position.coords.latitude, position.coords.longitude);
                    map.setCenter(pos);
                });
            }
        }
        initialize();
</script>
</body>

</html>