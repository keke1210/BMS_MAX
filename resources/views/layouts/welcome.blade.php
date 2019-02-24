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
            <script>
                $(document).ready(function(){
                    $('.login-body').html(logbody);
                });

            var regbody=$('<div class="input-section"> <i class="fas fa-user"></i> <input class="validate user-input{{$errors->has('name') ? ' is-invalid' : ''}}" name="name" value="{{old('name')}}" placeholder="Emri" required autofocus> @if ($errors->has('name')) <span class="invalid-feedback" role="alert"> <strong>{{$errors->first('name')}}</strong> </span> @endif </div><div class="input-section"> <i class="fas fa-envelope"></i> <input class="validate user-input{{$errors->has('email') ? ' is-invalid' : ''}}" id="email" type="email" name="email" value="{{old('email')}}" placeholder="Email@entreprise.com" required autofocus> @if ($errors->has('email')) <span class="invalid-feedback" role="alert"> <strong>{{$errors->first('email')}}</strong> </span> @endif </div><div class="input-section"> <i class="fas fa-lock"></i> <input id="password" type="password" placeholder="Password" class="validate user-input{{$errors->has('password') ? ' is-invalid' : ''}}" name="password" required> @if ($errors->has('password')) <span class="invalid-feedback" role="alert"> <strong>{{$errors->first('password')}}</strong> </span> @endif </div><div class="input-section"> <input id="password-confirm" type="password" placeholder="Konfirmo Password" class="validate user-input" name="password_confirmation" required></div><div> <button class="btn  btn-orange" id="btn-login">Regjistrohu</button>');
            var logbody=$('<div class="input-section"> <i class="fas fa-user"></i> <input class="validate user-input{{$errors->has('email') ? ' is-invalid' : ''}}" id="email" type="email" name="email" placeholder="Email" value="{{old('email')}}" required autofocus > @if ($errors->has('email')) <span class="invalid-feedback" role="alert"> <strong>{{$errors->first('email')}}</strong> </span> @endif </div><div class="input-section"> <i class="fas fa-lock"></i> <input class="validate user-input{{$errors->has('password') ? ' is-invalid' : ''}}" id="password" type="password" name="password" placeholder="Password" required> @if ($errors->has('password')) <span class="invalid-feedback" role="alert"> <strong>{{$errors->first('password')}}</strong> </span> @endif </div><div> @if (Route::has('password.request')) <a id="forgot-password" href="{{route('password.request')}}" style="color:#c1c1c1" >Harruat password-in ?</a> @endif </div><button class="btn  btn-orange" id="btn-login">Login</button>');
            $('.toggle-register').click(function(){
                $(this).addClass('active');
                $('.toggle-login').removeClass('active');
                $('.login-body').slideUp("slow");
                $('.login-body').empty();
                $('.register-body').html(regbody);
                $('.register-body').delay(625).slideDown("slow");
                $('#forme').attr('action','{{ route('register') }}');
              });
              
              $('.toggle-login').click(function(){
                $(this).addClass('active');
                $('.register-body').empty();
                $('.toggle-register').removeClass('active');
                $('.register-body').slideUp("slow");
                $('.login-body').html(logbody);
                $('.login-body').delay(625).slideDown("slow");
                $('#forme').attr('action','{{ route('login') }}');
              });
              
              $('#registered').click(function(){
                $('.toggle-login').click();
              });
            </script>
        </body>
        </html>
                  
