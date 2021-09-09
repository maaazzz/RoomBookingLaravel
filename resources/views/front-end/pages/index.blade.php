@extends('front-end.layouts.master')
@section('title','Booking | Home')

@section('content')
<section class="hero-home">
    <div class="swiper-container hero-slider">
      <div class="swiper-wrapper dark-overlay">
        <div class="swiper-slide" style="background-image:url({{ asset('front-end') }}/img/photo/photo-1501621965065-c6e1cf6b53e2.jpg)"></div>
        <div class="swiper-slide" style="background-image:url({{ asset('front-end') }}/img/photo/photo-1519974719765-e6559eac2575.jpg)"></div>
        <div class="swiper-slide" style="background-image:url({{ asset('front-end') }}/img/photo/photo-1490578474895-699cd4e2cf59.jpg)"></div>
        <div class="swiper-slide" style="background-image:url({{ asset('front-end') }}/img/photo/photo-1534850336045-c6c6d287f89e.jpg)"></div>
      </div>
    </div>
    <div class="container py-6 py-md-7 text-white z-index-20">
      <div class="row">
        <div class="col-xl-10">
          <div class="text-center text-lg-left">
            <p class="subtitle letter-spacing-4 mb-2 text-warning text-shadow">The best holiday experience</p>
            <h1 class="display-3 font-weight-bold text-shadow">Stay like a local</h1>
          </div>
          <div class="search-bar mt-5 p-3 p-lg-1 pl-lg-4">
            <form action="{{ route('search') }}" method="get">
              <div class="row">
                <div class="col-lg-5 d-flex align-items-center form-group">
                  <input class="form-control border-0 shadow-0" type="text" name="search" placeholder="What are you searching for?">
                </div>
                <div class="col-lg-5 d-flex align-items-center form-group">
                  <div class="input-label-absolute input-label-absolute-right ">
                    <label class="label-absolute" for="location"><span class="sr-only">City</span></label>
                    <input class="form-control border-0 shadow-0" type="text" name="location" placeholder="Location" id="location">
                  </div>
                </div>
                <div class="col-lg-2">
                  <button class="btn btn-warning btn-block rounded-xl h-100" type="submit">Search </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-6 bg-gray-100">
    <div class="container">
      <div class="text-center pb-lg-4">
        <p class="subtitle text-warning">One-of-a-kind vacation rentals</p>
        <h2 class="mb-5">Booking with us is easy</h2>
      </div>
      <div class="row">
        <div class="col-lg-4 mb-3 mb-lg-0 text-center">
          <div class="px-0 px-lg-3">
            <div class="icon-rounded bg-warning-light mb-3">
              <svg class="svg-icon text-warning w-2rem h-2rem">
                <use xlink:href="#destination-map-1"> </use>
              </svg>
            </div>
            <h3 class="h5">Find the perfect rental</h3>
            <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed in</p>
          </div>
        </div>
        <div class="col-lg-4 mb-3 mb-lg-0 text-center">
          <div class="px-0 px-lg-3">
            <div class="icon-rounded bg-warning-light mb-3">
              <svg class="svg-icon text-warning w-2rem h-2rem">
                <use xlink:href="#pay-by-card-1"> </use>
              </svg>
            </div>
            <h3 class="h5">Book with confidence</h3>
            <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pit</p>
          </div>
        </div>
        <div class="col-lg-4 mb-3 mb-lg-0 text-center">
          <div class="px-0 px-lg-3">
            <div class="icon-rounded bg-warning-light mb-3">
              <svg class="svg-icon text-warning w-2rem h-2rem">
                <use xlink:href="#heart-1"> </use>
              </svg>
            </div>
            <h3 class="h5">Enjoy your vacation</h3>
            <p class="text-muted">His room, a proper human room although a little too small, lay peacefully between its four familiar </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-6 bg-gray-100">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-8">
          <p class="subtitle text-warning">Hurry up, these are expiring soon.        </p>
          <h2>Rooms For Booking</h2>
        </div>
      </div>
      <!-- Slider main container-->
      <div class="swiper-container swiper-container-mx-negative swiper-init pt-3" data-swiper="{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:20,&quot;loop&quot;:true,&quot;roundLengths&quot;:true,&quot;breakpoints&quot;:{&quot;1200&quot;:{&quot;slidesPerView&quot;:3},&quot;991&quot;:{&quot;slidesPerView&quot;:2},&quot;565&quot;:{&quot;slidesPerView&quot;:1}},&quot;pagination&quot;:{&quot;el&quot;:&quot;.swiper-pagination&quot;,&quot;clickable&quot;:true,&quot;dynamicBullets&quot;:true}}">
        <!-- Additional required wrapper-->
        <div class="swiper-wrapper pb-5">
          <!-- Slides-->
          @forelse ($rooms as $room)
          <div class="swiper-slide h-auto px-2">
            <!-- place item-->
            <div class="w-100 h-100 hover-animate" data-marker-id="59c0c8e33b1527bfe2abaf92">
              <div class="card h-100 border-0 shadow">
                <div class="card-img-top overflow-hidden gradient-overlay" style="height: 20vh;">
                    <img class="img-fluid" src="{{ asset('room-images/'.$room->galleries[0]->path) }}" alt="Modern, Well-Appointed Room"/><a class="tile-link" href="{{ route('room.detail',$room->id) }}"></a>
                </div>
                <div class="card-body d-flex align-items-center">
                  <div class="w-100">
                    <h6 class="card-title"><a class="text-decoration-none text-dark" href="{{ route('room.detail',$room->id) }}">{{ $room->title }}</a></h6>
                    <div class="d-flex card-subtitle mb-3">

                      </p>
                    </div>
                    <p class="card-text text-muted"><span class="h4 text-warning">£{{ $room->price }}</span> per month</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
          <h2 class="text-center text-warning">Not found</h2>
          @endforelse

        </div>
        <!-- If we need pagination-->
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- Divider Section-->
  <section class="py-7 position-relative dark-overlay" ><img class="bg-image" src="{{ asset('front-end') }}/img/photo/photo-1497436072909-60f360e1d4b1.jpg" alt="">
    <div class="container">
      <div class="overlay-content text-white py-lg-5">
        <h3 class="display-3 font-weight-bold text-serif text-shadow mb-5">Ready for your next holidays?</h3>
        @guest
        <a class="btn btn-outline-warning" href="{{ route('login') }}">Get started</a>
        @endguest
      </div>
    </div>
  </section>

@endsection
