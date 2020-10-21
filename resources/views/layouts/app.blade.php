<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/lgrplogo.png')}}" sizes="16x16" type="image/png">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
	<script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
    body {
        padding-top: 54px;
    }

    @media (min-width: 992px) {
        body {
            padding-top: 56px;
        }
    }
    /* Temporary navbar container fix */

    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 1000px) {
        .character-list a.nav-link{
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 100px;
        }
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
        .character-list a.nav-link{
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 50px;
        }
    }
	

    </style>
</head>
<body>
    <div id="app">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse fixed-top navbar-toggleable-md" style="background-color:#2c3e50;">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="container">
              <a class="navbar-brand" href="#"><img src="{{asset('images/lgrplogo.png')}}" alt=""></a>
              <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/statistics')}}">Statistics<span class="sr-only">(current)</span></a>
                  </li>
		              <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('http://forums.liongaming.org')}}">Forum<span class="sr-only">(current)</span></a>
                  </li>
                  <!--
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/donation')}}">Donations<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{url('/blog')}}">Blog <span class="sr-only">(current)</span></a>
                  </li>-->
                </ul>
                <ul class="navbar-nav mr-end">
                  @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link text-white" target="_blank" href="{{ route('register') }}">Register</a></li>
                  @else
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</a>
                      <div class="dropdown-menu" aria-labelledby="profile-menu">
                        <!--<a class="dropdown-item" href="#">Notifications <span class="badge badge-pill badge-info">1</span></a>-->
                        <a class="dropdown-item" href="{{ route('account.index') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('account.edit', Auth::user()->username ) }}">Edit Profile</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                      </div>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  @endif
                </ul>
              </div>
          </div>
      </nav>

        @yield('content')
    </div>
    <hr>
    <footer>
      <center>
        &copy Copyright 2020 Lion Gaming Roleplay - Made by <a href="https://ahnafhf21.github.io" target="_blank">ahnafhf21</a> with ❤ <br>
      </center>
    </footer>

    <!-- Scripts -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156454445-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date()); 

	  gtag('config', 'UA-156454445-1');
	</script>

    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('tether/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
</body>
</html>
