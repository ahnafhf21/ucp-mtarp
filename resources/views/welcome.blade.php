<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lion Gaming Roleplay</title>
        <link rel="icon" href="{{ asset('images/lgrplogo.png')}}" sizes="16x16" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: linear-gradient(#8e9eab, #eef2f3);background-position: center; /* Center the image */

                background-size: cover; /* Resize the background image to cover the entire container */
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

			iframe{
				width: 500px;
				height: 256px;
			}
            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			@media screen and (max-width: 1000px){
			iframe{
				width: 300px;
				height: 156px;
			}
			.title {
                font-size: 30px;
            }
      .links a{
        padding: 0 8px;
      }
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    Lion Gaming Roleplay
                </div>
                <iframe src="https://www.youtube.com/embed/Vbp2vN4ryPI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br>
                <br>
                <div class="links">
                  @if (Route::has('login'))
                          @auth
                              <a href="{{ url('/home') }}">Home</a>
                          @else
                              <a href="{{ url('/home') }}">Home</a>
                              <a href="{{ route('login') }}">Login</a>
                              <a href="{{ route('register') }} ">Register</a>
                              <a href="{{ url('http://forums.liongaming.org') }} " >Forum</a>
        
                          @endauth
                  @endif
                </div> 
				 <h4>Get in touch with the Community :</h4>
				<div class="links">
					<a href="{{ url('https://www.facebook.com/groups/LionGamingRoleplay/') }} " target="_blank">Facebook Group</a>
					<a href="{{ url('https://chat.whatsapp.com/KGShYV94ZKsC2VabpyhLT1') }} " target="_blank">WhatsApp Group</a>
				</div>

                <h4>Follow our Social Media !!!</h4>
                <a href="http://instagram.com/liongamingrp" target="_blank">
                  <img src="{{asset('images/ig.png')}}"width="40px" alt="">
                </a>
                <a href="http://facebook.com/liongamingroleplay" target="_blank" >
                  <img src="{{asset('images/fb.png')}}" width="40px" alt="">
                </a>
                <a href="https://www.youtube.com/channel/UC-MuNVS4zrgVfBFYjkzc6Xg" target="_blank" >
                  <img src="{{asset('images/yt.png')}}" width="40px" alt="">
                </a>
                <br>

            </div>
        </div>
    </body>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156454445-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156454445-1');
</script>

</html>
