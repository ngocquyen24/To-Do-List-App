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
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/tasks') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register-user') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>


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

