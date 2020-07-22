<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Andrzej Olearka">
    
        <meta name="csrf_token" content="{{ csrf_token() }}" />

        <title>@yield('title')</title>

        <script
            src="https://code.jquery.com/jquery-3.5.0.js"
            integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
            crossorigin="anonymous">
        </script>

        <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
            crossorigin="anonymous">
        </script>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link href="{{ asset('social_icons_fontello/fontello.css') }}" rel="stylesheet"> 

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

        @stack('styles')

        <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>

        @stack('scripts')
        
        <title>@yield('style')</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Milonga" > 
    </head>

    <body>

        <header>

            <h1>MinervA</h1>

        </header>

        @include('nav')

        <main>

            <div class="container-fluid">

                @yield('content')

            </div>

        </main>
        
        <br /><br />

        <h1> Napisz w mediach społecznościowych!</h1>
        
        <div class="row  no-gutters md-4">
        
            <div class="social_media fb col-8 col-sm-3 col-lg-2 offset-2 offset-sm-0 offset-lg-2"><a href="https://www.facebook.com/" target="_blank" class="fblink"><i class="icon-facebook"></i></a></div>
            <div class="social_media yt col-8 col-sm-4 col-lg-2 offset-2 offset-sm-1 offset-lg-1 "><a href="https://www.youtube.com/" target="_blank" class="ytlink"><i class="icon-youtube"></i></a></div>
            <div class="social_media tw col-8 col-sm-3 col-lg-2 offset-2 offset-sm-1 offset-lg-1 mt-4 mt-sm-0"><a href="https://twitter.com/" target="_blank" class="twlink"><i class="icon-twitter"></i></a></div>
            
        </div>
        
        <br /><br />	

    </body>

</html>
