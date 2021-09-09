@extends('front-end.layouts.master')
@section('title', 'Booking | Room Details')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="text-block">
                    <p class="text-warning"><i class="fa-map-marker-alt fa mr-1"></i> {{ $room->address }}</p>
                    <h1>{{ $room->title }}</h1>
                    {{-- <p class="text-muted text-uppercase mb-4">{{ $room->category->name }} </p> --}}
                    <ul class="list-inline text-sm mb-4">
                        {{-- attributes --}}
                        @php
                            $attributes = explode(',', $room->attributes);
                        @endphp
                        @foreach ($attributes as $attr)
                            <li class="list-inline-item mr-3 text-warning font-weight-bold">{{ $attr }}</li>
                        @endforeach
                    </ul>
                    {!! $room->description !!}
                </div>

                {{-- aminities --}}
                @php
                    $aminities = explode(',', $room->aminities);
                @endphp
                <div class="text-block">
                    <h4 class="mb-0">Amenities</h4>
                    <ul class="list-inline">
                        @foreach ($aminities as $aminitie)
                            <li class="list-inline-item mb-2"><span
                                    class="badge badge-pill badge-light p-3 text-muted font-weight-bold">{{ $aminitie }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="text-block">
                    <h5 class="mb-4">Gallery</h5>
                    <div class="row gallery mb-3 ml-n1 mr-n1">
                        @foreach ($room->galleries as $gallery)
                            <div class="col-lg-4 col-6 px-1 mb-2"><a href="{{ asset('room-images/' . $gallery->path) }}"
                                    data-fancybox="gallery" title="{{ $room->title }}"><img class="img-fluid"
                                        src="{{ asset('room-images/' . $gallery->path) }}" alt="..."></a></div>
                        @endforeach
                    </div>
                </div>
                <div class="text-block">
                    <p class="text-warning">Fix Deposit Cash: £500</p>
                </div>
            </div>
            @php
                $user_bookings = App\models\Booking::where('room_id', $room->id)
                    ->get();
            @endphp
            <div class="col-lg-4">
                <div class="p-4 shadow ml-lg-4 rounded sticky-top" style="top: 100px;">
                    @if (!count($user_bookings) > 0)
                    <p class="text-muted"><span class="text-warning h2">£{{ round($room->price) }}</span> for 30 days</p>
                    <hr class="my-4">
                        <form class="form" id="booking-form" method="get" action="#" autocomplete="off">
                            <div class="form-group">
                                <a href="{{ route('select.checkout.payment', $room->id) }}"
                                    class="btn btn-warning btn-block" type="submit">Book your stay</a>
                            </div>
                            <p class="text-muted text-center">Room contract length is 52 weeks </p>
                        </form>
                    @else
                        <h4 class="text-muted">Room is already booked !!</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
