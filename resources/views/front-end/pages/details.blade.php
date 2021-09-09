@extends('front-end.layouts.master')
@section('title', 'Details')


@section('content')
    <section class="py-6 bg-gray-100">
        <div class="container">
            <h2 class="h4 mb-5">Details About The Rooms</h2>
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 mb-md-0">
                   <ul class="list-group">
                       <li  class="list-group-item">300 feet from University </li>
                       <li  class="list-group-item">0.1	mile from Kingsgate Shopping Centre </li>
                       <li  class="list-group-item">0.3	mile from Sainsbury’s</li>
                       <li  class="list-group-item">0.4	mile from Huddersfield Train Station</li>
                       <li  class="list-group-item">0.4 mile from Huddersfield Bus Station</li>
                   </ul>
                </div>
            </div>
        </div>
    </section>


    <div class="map-wrapper-300">
        <div class="h-100" id="map"></div>
    </div>

@endsection
@section('scripts')
    {{-- <script src="{{ asset('front-end') }}/leaflet/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
 <!-- Available tile layers-->
 <script src="{{ asset('front-end') }}/js/map-layers.f6cf9b57.js"> </script>
 <script src="{{ asset('front-end') }}/js/map-detail.ecc97be1.js"></script>
<script>

    createDetailMap({
        mapId: 'detailMap',
        zoom: 12,
        mapCenter: [56.949649, 24.105186],
        markerShow: true,
        markerPosition: [56.949649, 24.105186],
        markerPath: "https://img.icons8.com/doodle/48/000000/google-maps-new.png",
    });

</script> --}}
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script>
        // Initialize and add the map
        function initMap() {

            var mapProp = {
                center: new google.maps.LatLng(53.644592819638724, -1.7787580726749255),
                zoom: 19,
            };
            var map = new google.maps.Map(document.getElementById("map"), mapProp);
            const marker = new google.maps.Marker({
                position: { lat: 53.644592819638724, lng: -1.7787580726749255 },
                map: map,
            });
        }

    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT8zHEUby_-yU0Y7Ir3ITd-bhRs8vuM2U&callback=initMap&libraries=&v=weekly"
        async></script>


@endsection

