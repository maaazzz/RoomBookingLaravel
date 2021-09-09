<footer class="position-relative z-index-10 d-print-none">
    <!-- Main block - menus, subscribe form-->
    <div class="py-6 bg-gray-200 text-muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
                    <h6 class="text-uppercase text-dark mb-3">Pages</h6>
                    <ul class="list-unstyled">
                        <li><a class="text-muted" href="/">Home </a></li>
                        <li><a class="text-muted" href="{{ route('feedback') }}">Feedback </a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-uppercase text-dark mb-3">Phone Support</h6>
                    <p class="mb-3">07483828189.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright section of the footer-->
    <div class="py-4 font-weight-light bg-gray-800 text-gray-300">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left">
                    <p class="text-sm mb-md-0">&copy; 2020, Rooms Booking. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline mb-0 mt-2 mt-md-0 text-center text-md-right">
                        <li class="list-inline-item"><img class="w-2rem" src="{{ asset('front-end') }}/img/visa.svg"
                                alt="..."></li>
                        <li class="list-inline-item"><img class="w-2rem"
                                src="{{ asset('front-end') }}/img/mastercard.svg" alt="..."></li>
                        <li class="list-inline-item"><img class="w-2rem" src="{{ asset('front-end') }}/img/paypal.svg"
                                alt="..."></li>
                        <li class="list-inline-item"><img class="w-2rem"
                                src="{{ asset('front-end') }}/img/western-union.svg" alt="..."></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
