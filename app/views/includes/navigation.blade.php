<!-- navigation -->
  <div class="container">
  	<!-- navbar collapse -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">Hasta</a>
    </div>

    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="{{URL::to('/')}}">Home</a></li>
        <li><a href="login">Login</a></li>
        <li><a href="register">Register</a></li>
      <!-- @if(Auth::check())        
        <li><a href="{{URL::to('/logout')}}">Welcome {{Auth::user()->username}}(Logout)</a></li>
      @else
        <li><a href="login">Login</a></li>
        <li><a href="{{URL::to('/register')}}">Register</a></li>
      @endif -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
