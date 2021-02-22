<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/svg+xml" href="{{asset('assets/global_assets/images/logo-main.svg')}}">
        <title>Social Store</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background: url(public/assets/global_assets/images/rectangle48.png);
                background-size: cover;
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

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 20px 53px;
                font-size: 19px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background: #1a1634;
                border-radius: 8px;
                background-image: linear-gradient(to right top, #e72864, #eb4560, #ee5b5f, #ef6e60, #f08064);
            }
            .img-div1{
                width: 43%;
                display: inline-flex;
                text-align: center;
                border: none;
                height: 276px;
                border-radius: 10px;
                box-shadow: 0 0 34px #ffffff2e;
            }
            .img-div1 .img-div{
                width: 50%;
                vertical-align: middle;
                align-items: center;
                /* height: 100%; */
                align-content: center;
                background: #1a1634;
                padding-top: 70px;
            }
            .img-div1 .img-div img{
                height: 155px;
            }
            .img-div1 .links{
                width: 50%;
                background: #1a1634;
                padding-top: 124px;
                border-left: 2px solid #eeee;
            }
            .img-div1 .links a{

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="img-div1">
        <div class="img-div"><img src="{{asset('assets/global_assets/images/main-screen-logo.png')}}"></div>
            @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    @endauth
                </div>
            @endif
            </div>
            <!-- <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div> -->
               

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->

                <!-- <div class="main-d">
                    <div class="col1"></div>
                    <div class="col2"><a href="#"></a></div>
                </div> -->
            </div>
        </div>
    </body>
</html>
