@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1 style="text-align: center"><strong>MAPA-GRAFO</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div id="map" style="height: 600px; width:100%"></div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        var connections = @json($connections); // Convertir las conexiones a JSON para usarlas en JavaScript
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARRrWndtDjcchbMXJ279srQZ1blLbYYB0"></script>
    <script>
        var connections = @json($connections); // Convertir las conexiones a JSON para usarlas en JavaScript
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: {
                    lat: -4.0342774,
                    lng: -79.206469
                }
            });

            connections.forEach(function(connection) {
                var originLatLng = new google.maps.LatLng(connection.origin_latitude, connection.origin_longitude);
                var destinationLatLng = new google.maps.LatLng(connection.destination_latitude, connection
                    .destination_longitude);

                var originMarker = new google.maps.Marker({
                    position: originLatLng,
                    map: map,
                    title: connection.origin_name
                });

                var destinationMarker = new google.maps.Marker({
                    position: destinationLatLng,
                    map: map,
                    title: connection.destination_name
                });
                var originInfoWindow = new google.maps.InfoWindow({
                    content: connection.origin_name
                });

                var destinationInfoWindow = new google.maps.InfoWindow({
                    content: connection.destination_name
                });

                originMarker.addListener('click', function() {
                    originInfoWindow.open(map, originMarker);
                });

                destinationMarker.addListener('click', function() {
                    destinationInfoWindow.open(map, destinationMarker);
                });
                var polyline = new google.maps.Polyline({
                    path: [originLatLng, destinationLatLng],
                    geodesic: true,
                    strokeColor: 'blue',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });

                polyline.setMap(map);
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });
    </script>
@stop
