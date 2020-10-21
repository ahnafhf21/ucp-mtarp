<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale'), false); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

    <title><?php echo e(config('app.name', 'Laravel'), false); ?></title>
    <link rel="icon" href="<?php echo e(asset('images/lgrplogo.png'), false); ?>" sizes="16x16" type="image/png">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/bootstrap.min.css'), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css'), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sweetalert.css'), false); ?>" rel="stylesheet">
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
              <a class="navbar-brand" href="#"><img src="<?php echo e(asset('images/lgrplogo.png'), false); ?>" alt=""></a>
              <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo e(url('/home'), false); ?>">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo e(url('/statistics'), false); ?>">Statistics<span class="sr-only">(current)</span></a>
                  </li>
		              <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo e(url('http://forums.liongaming.org'), false); ?>">Forum<span class="sr-only">(current)</span></a>
                  </li>
                  <!--
                  <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo e(url('/donation'), false); ?>">Donations<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="<?php echo e(url('/blog'), false); ?>">Blog <span class="sr-only">(current)</span></a>
                  </li>-->
                </ul>
                <ul class="navbar-nav mr-end">
                  <?php if(Auth::guest()): ?>
                    <li class="nav-item"><a class="nav-link text-white" href="<?php echo e(route('login'), false); ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link text-white" target="_blank" href="<?php echo e(route('register'), false); ?>">Register</a></li>
                  <?php else: ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->username, false); ?></a>
                      <div class="dropdown-menu" aria-labelledby="profile-menu">
                        <!--<a class="dropdown-item" href="#">Notifications <span class="badge badge-pill badge-info">1</span></a>-->
                        <a class="dropdown-item" href="<?php echo e(route('account.index'), false); ?>">Profile</a>
                        <a class="dropdown-item" href="<?php echo e(route('account.edit', Auth::user()->username ), false); ?>">Edit Profile</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                      </div>
                      <form id="logout-form" action="<?php echo e(route('logout'), false); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field(), false); ?>

                      </form>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
          </div>
      </nav>

        <?php echo $__env->yieldContent('content'); ?>
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

    <script src="<?php echo e(asset('jquery/jquery.min.js'), false); ?>"></script>
    <script src="<?php echo e(asset('tether/tether.min.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.min.js'), false); ?>"></script>
    <!-- Include this after the sweet alert js file -->
    <?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
