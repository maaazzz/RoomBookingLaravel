@extends('front-end.layouts.master')
@section('title', 'feedback')

@section('content')
    <section class="py-6 bg-gray-100">
        <div class="container">
            <h2 class="h4 mb-5">Feedback form</h2>
            <div class="row">
                <div class="col-md-7 mb-5 mb-md-0">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form class="form" id="contact-form" method="post" action="{{ route('feedback.store') }}">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name *</label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            placeholder="Enter your firstname" required="required">
                                    </div>
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email *</label>
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Enter your  email" required="required">
                            </div>
                            @error('email')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="form-group">
                                <label class="form-label" for="message">Your message for us *</label>
                                <textarea class="form-control" rows="4" name="message" id="message"
                                    placeholder="Enter your message" required="required"></textarea>
                            </div>
                            @error('message')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <br>

                            <button class="btn btn-outline-warning" type="submit">Send Feedback</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-3">
                    <address class="text-muted" style="font-size: 20px">
                        <i class="fa fa-address-book"></i>
                        Location : HD1 2RD
                        33-35 Queensgate, Huddersfield
                    </address>
                    <p class="text-muted" style="font-size:20px">
                        Email : fizaansajjad@hotmail.com
                    </p>
                    <p class="text-muted" style="font-size:20px">
                        Phone No: 07483828189
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->


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

