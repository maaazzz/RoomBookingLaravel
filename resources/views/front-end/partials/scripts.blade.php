{{-- <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET.html", path, true);
        ajax.send();
        ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // to avoid CORS issues when viewing using file:// protocol, using the demo URL for the SVG sprite
    // use your own URL in production, please :)
    //- injectSvgSprite('${path}icons/orion-svg-sprite.69651a96.svg');
    injectSvgSprite('{{ asset("front-end") }}/icons/orion-svg-sprite.svg');
 --}}
  {{-- </script> --}}
    {{-- // --}}
  <script src="{{ asset('front-end') }}/icons/orion-svg-sprite.69651a96.svg"></script>
  <!-- jQuery-->
  <script src="{{ asset('front-end') }}/vendor/jquery/jquery.min.js"></script>
  <!-- Bootstrap JS bundle - Bootstrap + PopperJS-->
  <script src="{{ asset('front-end') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Magnific Popup - Lightbox for the gallery-->
  <script src="{{ asset('front-end') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Smooth scroll-->
  <script src="{{ asset('front-end') }}/vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
  <!-- Bootstrap Select-->
  <script src="{{ asset('front-end') }}/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
  <script src="{{ asset('front-end') }}/vendor/object-fit-images/ofi.min.js"></script>
  <!-- Swiper Carousel                       -->
  <script src="{{ asset('front-end') }}/Swiper/4.4.1/js/swiper.min.js"></script>
  <script src="{{ asset('front-end') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="{{ asset('front-end') }}/js/demo.36f8799a.js"></script>
  <script>var basePath = ''</script>
  <!-- Main Theme JS file    -->
  <script src="{{ asset('front-end') }}/js/theme.55f8348b.js"></script>
