<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
   @include('front-end.partials.styles')
   @yield('styles')
  </head>
  <body style="padding-top: 72px;">
   @include('front-end.partials.header')
   @yield('content')
   <!-- Footer-->
  @include('front-end.partials.footer')
    <!-- JavaScript files-->

    @include('sweetalert::alert')
   @include('front-end.partials.scripts')
   @yield('scripts')
  </body>
</html>
