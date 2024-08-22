
  @include('frontend.layouts.header')

<body>
    <!-- navbar start -->
    @include("frontend.layouts.navbar_header")
    <!-- navbar end -->

    @yield('content')

   @include("frontend.layouts.footer")