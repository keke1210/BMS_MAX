
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
      {{-- jquery print-page
        <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="js/jquery.printPage.js"></script> --}}
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/myJs.js') }}" defer></script>
     <script src="{{ asset('js/jquery-2.1.1.js') }}" defer></script>
     <script src="{{ asset('js/view-pass.js') }}" defer></script>
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="/css/app.css" rel="stylesheet" type="text/css">
     <link href="/css/myStyle.css" rel="stylesheet" type="text/css">
     
     <!-- Styles -->
    <link href="/css/welcome-style.css" rel="stylesheet" type="text/css">

     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/override.css') }}" rel="stylesheet">
     <link href="{{ asset('css/less_php.css') }}" rel="stylesheet">
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
     <link href="{{ asset('css/welcome-auth.css') }}" rel="stylesheet">
     <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    </head>
    <body id="login" class="gray-bg">
        <div class="loginscreen col-xs-12">
           
    
            <div class="col-xs-12 col-sm-10 col-md-6 col-lg-5 text-center d-flex flex-column flex-nowrap no-m-res" style="height:calc(100% - 65px); margin-top: 65px;">
                   
                   @yield('login')

                </div>

            </div>
        </body>
        </html>
                  
