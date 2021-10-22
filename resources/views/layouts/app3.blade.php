<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

    <title>Salud mental</title>

    <link rel="stylesheet" href="{{ asset('/propiosPublico/vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/propiosPublico/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('/propiosPublico/assets/css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/propiosPublico/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('/propiosPublico/assets/css/lightbox.css') }}">

    @yield('style')
  </head>

  <body>
    <div id="page-wraper">
      <!-- Sidebar Menu -->
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
              <a href="#"><img src="{{asset('logo.jpg')}}" alt="" /></a>
            </div>
            <div class="author-content">
              <h4>Salud mental</h4>
              <span>Cápsulas</span>
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a onclick="location.href='{{url('/')}}'" class="active" style="color:white;cursor: pointer;">Home</a></li>
                <li><a onclick="location.href='{{url('/capsulas')}}'" style="color:white;cursor: pointer;">Cápsulas</a></li>
                <li><a onclick="location.href='{{url('/psicologos')}}'" style="color:white;cursor: pointer;">Psicólogos</a></li>
                <li><a onclick="location.href='{{url('/recomendaciones')}}'" style="color:white;cursor: pointer;">Recomendaciones</a></li>
              </ul>
            </nav>

            <div class="copyright-text">
              <p>Salud mental</p>
            </div>
          </div>
        </div>
      </div>

      <section class="section about-me" data-section="section1">
        <div class="container">
          @yield('content')
        </div>
      </section>


    </div>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('/propiosPublico/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/propiosPublico/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/propiosPublico/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('/propiosPublico/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('/propiosPublico/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('/propiosPublico/assets/js/custom.js') }}"></script>

    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/custom.js"></script> --}}
    <script>
      //according to loftblog tut
      // $(".main-menu li:first").addClass("active");
      //
      // var showSection = function showSection(section, isAnimate) {
      //   var direction = section.replace(/#/, ""),
      //     reqSection = $(".section").filter(
      //       '[data-section="' + direction + '"]'
      //     ),
      //     reqSectionPos = reqSection.offset().top - 0;
      //
      //   if (isAnimate) {
      //     $("body, html").animate(
      //       {
      //         scrollTop: reqSectionPos
      //       },
      //       800
      //     );
      //   } else {
      //     $("body, html").scrollTop(reqSectionPos);
      //   }
      // };
      //
      // var checkSection = function checkSection() {
      //   $(".section").each(function() {
      //     var $this = $(this),
      //       topEdge = $this.offset().top - 80,
      //       bottomEdge = topEdge + $this.height(),
      //       wScroll = $(window).scrollTop();
      //     if (topEdge < wScroll && bottomEdge > wScroll) {
      //       var currentId = $this.data("section"),
      //         reqLink = $("a").filter("[href*=\\#" + currentId + "]");
      //       reqLink
      //         .closest("li")
      //         .addClass("active")
      //         .siblings()
      //         .removeClass("active");
      //     }
      //   });
      // };
      //
      // $(".main-menu").on("click", "a", function(e) {
      //   e.preventDefault();
      //   showSection($(this).attr("href"), true);
      // });
      //
      // $(window).scroll(function() {
      //   checkSection();
      // });
    </script>
  </body>
</html>
