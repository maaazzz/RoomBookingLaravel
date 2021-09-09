<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, material admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template">
    <meta name="description" content="MaterialPro is powerful and clean admin dashboard template, inpired from Google's Material Design">
    <meta name="robots" content="noindex,nofollow">
    <title>
        @yield('title')
    </title>
   @include('admin.partials.styles')
   <style>
       .active{
           background-color: #ffb22b!important;
           color: #000 !important;
       }
       #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin6] .sidebar-nav ul .sidebar-item.selected>.sidebar-link{
        background-color: #ffb22b!important;
        color: #000 !important;
       }

   </style>
   @yield('styles')
</head>

<body>
    @include('admin.partials.preloader')
    <div id="main-wrapper">
        @include('admin.partials.header')
        @include('admin.partials.sidebar')
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-muted mb-0">
                        @yield('content-header')
                    </h3>
                </div>
            </div>
            <div class="container-fluid">
                @yield('content')
            </div>
          @include('admin.partials.footer')
        </div>
    </div>

   @include('admin.partials.scripts')
   @yield('scripts')
</body>

</html>
