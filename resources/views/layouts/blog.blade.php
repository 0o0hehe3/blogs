  @include('layouts.header')

  <body>
    @include('layouts.nav')
    @include('layouts.slider')

    @yield('content')

    @include('layouts.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    
    @yield('js')
    <script src="/js/clean-blog.min.js"></script>
  </body>
</html>
