<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/myJs.js') }}" defer></script>
    <meta name="_token" content="{{csrf_token()}}" />

  <!-- jquery print-page
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="js/jquery.printPage.js"></script> --}}
  Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
 <script src="{{ asset('js/myJs.js') }}" defer></script>
 @yield('dashscripts')
 <!-- Fonts -->

 <link href="/css/app.css" rel="stylesheet" type="text/css">
 <link href="/css/myStyle.css" rel="stylesheet" type="text/css">

 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 @yield('dashstyles')

</head>
<body>
    <div id="page">
        @include('inc.navbar')
        
        <div class="container h-100">
               
            
              
            <div id="page-wrapper" style="min-height: calc(100vh - 55.5px) !important;">
                <div class="row wrapper page-heading" style="margin-top: 55px">
                    <div class="col-lg-5 col-xs-12 col-md-5 no-padding">
                        @yield('dash-title')
                  
                        @include('sweet::alert')
                    </div>
                </div>
                
                        <div class="row m-t-sm" id="dashboard-page">
                                <div class="col-xs-12" id="dashboard">
                                       @yield('content')
                      </div>     
                </div>
            </div>
            
        </div>

    </div>
    <script>
        //  $(document).ready(function () {

    
        //         // $('#ajaxSubmit').click(function (e) {
        //         //     e.preventDefault();
        //         //     $.ajaxSetup({
        //         //         headers: {
        //         //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //         //         }
        //         //     });
        //         //     $.ajax({
        //         //         url: "{{url('produkte/post')}}",
        //         //         method: 'POST',
        //         //         data: {
        //         //             name: $('#emri').val(),
        //         //             price: $("#cmimi").val()
        //         //         },
        //         //         success: function (result) {
        //         //             swal(result.success)
        //         //         },
        //         //         error: function (result) {
        //         //             swal(result.error)
        //         //             console.log(result);
        //         //         }
        //         //     });
        //         // });

                
        // //         $("#shtoPerdorues").click(function(e){
        // //     e.preventDefault();
        // //     $.ajaxSetup({
        // //         headers:{
        // //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        // //             }
        // //     });
        // //     $.ajax({
        // //         url:"{{url('users/post')}}",
        // //         method: "POST",
        // //         data: {
        // //             'name' : $('#emri').val(), 
        // //             'email' :  $('#email').val(), 
        // //             'password' :  $('#password').val(), 
        // //             'c_password' :  $('#c_password').val(),
        // //             'roli' : $('input[name=radio]:checked').val()
        // //         },
        // //         success: function (result) {
        // //                 swal("Rezultati: " + result.success)
        // //             },
        // //     });
        // // });
        //     });
           
        </script>
</body>
</html>
