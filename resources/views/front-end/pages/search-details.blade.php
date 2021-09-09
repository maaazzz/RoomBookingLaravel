@extends('front-end.layouts.master')
@section('title')
    Search Details
@endsection

@section('content')
<div class="container-fluid py-5 px-lg-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center flex-column flex-md-row mb-4">
          <div class="mr-3">
            <p class="mb-3 mb-md-0"><strong>{{ count($results) }}</strong> results found</p>
          </div>
        </div>
        <div class="row">
          <!-- place item-->
          @foreach ($results as $result)
          <div class="col-sm-6 col-xl-4 mb-5 hover-animate" data-marker-id="59c0c8e33b1527bfe2abaf92">
            <div class="card h-100 border-0 shadow">
              <div class="card-img-top overflow-hidden gradient-overlay" style="height:30vh"> <img class="img-fluid"src="{{ asset('room-images/'.$result->galleries[0]->path) }}" alt="{{ $result->title }}" ><a class="tile-link" href="{{ route('room.detail',$result->id) }}"></a>
              </div>
              <div class="card-body d-flex align-items-center">
                <div class="w-100">
                  <h6 class="card-title"><a class="text-decoration-none text-dark" href="{{ route('room.detail',$result->id) }}">{{ $result->title }}</a></h6>
                  <div class="d-flex card-subtitle mb-3">

                    </p>
                  </div>
                  <p class="card-text text-muted"><span class="h4 text-warning">${{ $result->price }}</span> per month</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>

@endsection

{{--
<div class="row">
    <!-- place item-->
    <div class="col-sm-6 col-xl-4 mb-5 hover-animate" data-marker-id="59c0c8e33b1527bfe2abaf92">
        @foreach ($results as $result)
      <div class="card h-100 border-0 shadow">
        <div class="card-img-top overflow-hidden gradient-overlay"> <img class="img-fluid" src="{{ $result->galleries[0]->path }}" alt="Modern, Well-Appointed Room"/><a class="tile-link" href="detail-rooms.html"></a>
        <div class="card-body d-flex align-items-center">
          <div class="w-100">
            <h6 class="card-title"><a class="text-decoration-none text-dark" href="{{ route('room.detail',$result->id) }}">{{ $result->title }}</a></h6>
            <p class="card-text text-muted"><span class="h4 text-warning">${{ $result->price }}</span> per month</p>
          </div>
        </div>
      </div>
      @endforeach
    </div> --}}
