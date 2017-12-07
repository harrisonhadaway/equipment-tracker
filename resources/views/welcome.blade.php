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
                margin: 0;
                overflow-x: hidden; 
                overflow-y: auto;
            }

            h1 {

            font-family: 'Nunito Sans', sans-serif;
            }

            ul {
            margin: auto;
            }

            .fixleft{
            position:fixed;
            bottom:0px;
            left:50%;
            }

            .fixright{
            position:fixed;
            bottom:0px;
            /*right:50%;*/
            }

            .title-height {
                padding-top: 8%;
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
                text-align: center;
                margin-left: 20%;
                margin-right: 20%;
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

            <div class="">
                <div class="flex-center title-height">
                    <h1>Equipment Tracker</h1>
                </div>
                <div class="position-ref content">
                    Create each piece of equipment a 'profile page'. <br><br>Add records and all other equipment documentation to one central location. <br><br> Utilizing Equipment Tracker your records will be accessible from anywhere in world.
                </div>
                <div class="position-ref content" style="padding-top: 5%;">
                    <H2>Go ahead register and give us a try!</H2>
                </div>
                
            </div>
        </div>
        <div class="position-ref">
                    <marquee behavior="scroll" direction="right" scrollamount="10">
                        <img src="../img/tractor.png" style="height: auto; width: 30%;">
                    </marquee>
                    
        </div>
        
    </body>

</html>
