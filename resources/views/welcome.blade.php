<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Equipment Tracker</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300|Nunito:300" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
            background-color: white;
            color: black;
            font-family: sans-serif;
            font-weight: 100;
            height: 100vh;
            overflow-x: hidden; 
            overflow-y: auto;
            background: url("../img/mechanic.jpg")no-repeat center center fixed;
            background-repeat: no-repeat;
            background-position: bottom;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            }

            h1 {

            font-size: 4rem;
            font-family: 'Nunito Sans', sans-serif;
            text-shadow: 2px 2px #88dba3;
            }

            .textbox{
            background-color: rgba(218,219,219,0.6);
            border-radius: 20px;
            border: 2px solid #3ac569;
            padding: 15px; 
            
            }

            .title-height {
                padding-top: 0%;
            }

            .content-height {
                height: 10vh;
                margin-left: 20%;
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
                margin-left: 25%;
                margin-right: 25%;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #3ac569;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            <div>
                <div class="flex-center title-height">
                    <h1>Equipment Tracker</h1>
                </div>
                <div class="textbox content">
                    <div class="position-ref">
                        <p><strong>Track your equipment's information, documentation and maintenance records all in one location.</strong></p>
                    </div>
                    <div class="position-ref" style="padding-top: 5%;">
                        <H2>Sign up today!</H2>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
