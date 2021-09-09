<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile position-relative" style="background: url({{ asset('admin') }}/assets/images/background/user-info.jpg) no-repeat;">
            <div class="profile-img"> <img src="{{ asset('admin') }}/assets/images/users/profile.png" alt="user" class="w-100" /> </div>
            <div class="profile-text pt-1 dropdown">
                <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">{{ Str::ucfirst(auth()->user()->name) }}</a>
                <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i data-feather="log-out"
                                class="feather-sm text-danger me-1 ms-1"></i> Logout</a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Dashboard</span></li>
                    <li class="sidebar-item "> <a class="sidebar-link waves-effect waves-dark sidebar-link text-dark"
                        href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-basket"></i><span
                            class="hide-menu text-dark">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('user.index') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span
                            class="hide-menu text-dark">Users</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('room.index') }}" aria-expanded="false"><i class="mdi mdi-hotel"></i><span
                                class="hide-menu text-dark">Rooms</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('booking.index') }}" aria-expanded="false"><i class="mdi mdi-bookmark-plus"></i><span
                                    class="hide-menu text-dark">Bookings</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{ route('feedback.index') }}" aria-expanded="false"><i class="mdi mdi-basket-unfill
                                            "></i><span
                                                class="hide-menu text-dark">Feedback</span></a></li>

            </ul>
        </nav>
    </div>
    <div class="sidebar-footer">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
            <i class="mdi mdi-power"></i>
        </a>
    </div>
</aside>
