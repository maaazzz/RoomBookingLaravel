<header class="header">
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top shadow navbar-light bg-white">
        <div class="container-fluid">
            <div class="d-flex align-items-center"><a class="navbar-brand py-1 text-warning font-weight-bold" href="/" style="letter-spacing: 3px;font-size:20px"><i class="fa fa-star"></i>QUEENS STUDIO</a>
            </div>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <form class="form-inline mt-4 mb-2 d-sm-none" action="#" id="searchcollapsed">
                    <div class="input-label-absolute input-label-absolute-left input-reset w-100">
                        <label class="label-absolute" for="searchcollapsed_search"><i class="fa fa-search"></i><span
                                class="sr-only">What are you looking for?</span></label>
                        <input class="form-control form-control-sm border-0 shadow-0 bg-gray-200"
                            id="searchcollapsed_search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-reset btn-sm" type="reset"><i class="fa-times fas"> </i></button>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a>
                    </li>
                    {{-- <li class="nav-item"><a class="nav-link" href="contact.html">Rooms</a>
                    </li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('feedback') }}">Feedback</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('details') }}">Information</a>
                    </li>
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign in</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign up</a></li>
                    @endguest
                    @auth
                        @if (auth()->user()->role == 1)
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                    @endauth

                    @auth
                        @if (!auth()->user()->role == 1)
                        <li class="nav-item"><a class="nav-link" href="{{ route('user-profile.index') }}">My Dashboard</a></li>
                        @endif

                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                id="homeDropdownMenuLink" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="homeDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->
</header>
