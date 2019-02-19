    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/myJs.js') }}" defer></script>
    
    
        {{-- jquery print-page
        <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}"> --}}
        <script src="{{asset('js/jquery.min.js')}}"></script>
        {{-- <script type="text/javascript" src="js/jquery.printPage.js"></script> --}}
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/myJs.js') }}" defer></script>
     @yield('dashscripts')
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
     <link href="/css/app.css" rel="stylesheet" type="text/css">
     <link href="/css/myStyle.css" rel="stylesheet" type="text/css">
    
     <!-- Styles -->
    <link href="/css/welcome-style.css" rel="stylesheet" type="text/css">

   
     @yield('dashstyles')
    
    </head>
    <body>
        <div id="page">
            @include('inc.navbar')
    
            <div class="container h-100">
                   
                   @yield('login')

                </div>

            </div>
        </body>
        </html>
                  
