<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todolist</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            .login{
                text-decoration: none;
                font-family: Arial, Helvetica, sans-serif;
                margin-right: 200px;
            }
            .register{
                text-decoration: none;
                font-family: Arial, Helvetica, sans-serif;
                margin-right: 200px;
            }
            .dot{
                text-align: right;
            }
            .antialiased{
                margin-top: 40px;
                margin-bottom: 40px;
            }
            a{
                padding: 10px 20px;
                background: #cfcfcf;
                color: black;
                text-align: center;
                border: 1px solid #cfcfcf;
                border-radius: 5px;
            }
            .images{
                margin-top: 30px;
                width: 100%;
                height: 600px;
                display: flex;
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            @if (Route::has('login'))
                <div class="dot">
                    @auth
                        <a href="{{ url('/home') }}" class="home">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="login">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <img src="https://i.pinimg.com/564x/98/31/07/983107041d7d8382cf65189a93d65816.jpg" class="images" alt="" srcset="">
                    
                </div>
            </div>
        </div>
    </body>
</html>
