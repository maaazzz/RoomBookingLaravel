@extends('front-end.layouts.master')
@section('title', 'User Profile')

@section('content')
    <section class="py-5">
        <div class="container">
            <!-- Breadcrumbs -->
            <ol class="breadcrumb pl-0  justify-content-start">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ol>
            <h1 class="hero-heading mb-4">Welcome Back <span class="text-info">{{ Str::ucfirst(auth()->user()->name) }}
                </span> !
            </h1>
            <div class="row">
                <div class="col-md-5">
                    <p class="mb-6">
                        <img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/directory/1-6-1/img/illustration/undraw_trip_dv9f.svg"
                            alt="" style="width: 400px;">
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="text-block">
                        <h3 class="mb-4">Update Your Password</h3>
                        <div class="row">
                            <div class="col-sm-8">
                                <h6>Password</h6>
                                <p class="text-sm text-muted">{{ auth()->user()->updated_at->diffForHumans() }}</p>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-link pl-0 text-primary collapsed" type="button"
                                    data-toggle="collapse" data-target="#updatePassword" aria-expanded="false"
                                    aria-controls="updatePassword">Update</button>
                            </div>
                        </div>
                        <div class="collapse" id="updatePassword">
                            <form action="{{ route('user-profile.update', auth()->user()->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mt-4">
                                    <div class="form-group col-12">
                                        <label class="form-label" for="password-current">Current Password</label>
                                        <input class="form-control" type="password" name="current_password"
                                            id="password-current">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="password-new">New Password</label>
                                        <input class="form-control" type="password" name="password" id="password-new">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <input class="form-control" type="password" name="password_confirmation"
                                            id="password-confirm">
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-outline-primary">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- table --}}
            <div class="text-block">
                <h4>Renewal Details</h4>
            </div>
            <div class="row">
                <div class="col-md-10 col-xl-10 col-sm-10 mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Room Name</th>
                                <th>Expired At</th>
                                {{-- <th>Message</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userBookings as $booking)
                            <tr>
                                <td>{{ $booking->room->title }}</td>
                                <td class="{{ Carbon\Carbon::parse($booking->renewal_at) < Carbon\Carbon::now() ? 'text-danger' : '' }}">
                                    @if (Carbon\Carbon::parse($booking->renewal_at) < Carbon\Carbon::now())
                                        <a href="{{ route('select.checkout.payment',$booking->room_id) }}" class="text-danger text-decoration-none">Please Click To Renew The Booking</a>
                                    @else
                                   Next Renewal Date <span class="text-info">( {{date('Y-m-d',strtotime($booking->renewal_at))}} )</span>
                                    @endif

                                </td>
                            </tr>
                            @empty
                                    <td class="text-center text-muted font-weight-bold">No booking found</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end of table --}}

            <h2 class="mb-5">Your past bookings</h2>
            <div class="row">
                <!-- place item-->
                @forelse ($userBookings as $booking)
                    <div class="col-xl-3 col-md-4 col-sm-6 mb-5" data-marker-id="59c0c8e33b1527bfe2abaf92">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-img-top overflow-hidden" style="height: 22vh">
                                <a href="{{ route('room.detail', $booking->room_id) }}">
                                    <img class="img-fluid"
                                        src="{{ asset('room-images/' . $booking->room->galleries[0]->path) }}"
                                        alt="{{ $booking->room->title }}" /></a>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <div class="w-100">
                                    <p class="subtitle font-weight-normal text-sm mb-2">
                                        {{ date('Y-m-d', strtotime($booking->created_at)) }}</p>
                                    <h6 class="card-title">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('room.detail', $booking->room_id) }}">
                                            {{ $booking->room->title }}
                                        </a>
                                    </h6>
                                    <div class="d-flex card-subtitle mb-3">
                                        <p class="flex-grow-1 mb-0 text-muted text-sm">{{ $booking->room->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center text-muted">Bookings not found !</h4>
                @endforelse
            </div>
        </div>
    </section>
@endsection
