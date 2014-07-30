<!doctype html>
<html>
<head>
@include('includes.head')
</head>
<body>
  <!-- for navigation -->
  <nav class="navbar navbar-inverse" role="navigation">
      @include('includes.navigation')
  </nav>
  <!-- end of navigation -->

  <!-- main content -->
    <div class="container">    	
      @yield('content')
    
    <!-- end of content -->

      <!-- start of footer -->
      <div class="footer">
        <footer>
          @include('includes.footer')
        </footer>
      </div>
      <!-- end of footer -->
    </div>
@yield('script')
</body>
</html>
