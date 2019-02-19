@extends('layouts.welcome')
@section('login')
        <div class="main-title text-center">
                <img class="site-logo" src="images/BMS-LOGO.png">
            </div>
    <div class="row align-middle" style="margin-top: 20%;">
                
        <div class="col-md-16 col-lg-6 column">
            <div class="card gr-1 gr-6">
                <div class="txt">
                    <h1>LOG IN </br>
                        </h1>
                    <p>Log in with email and password</p>
                </div>
                <a href="/login" role="button">Login</a>
                <div class="ico-card">
                    <i class="manager-logo"></i>
                </div>
            </div>
        </div>
    
        <div class="col-md-16 col-lg-6 column">
            <div class="card gr-2 gr-6">
                <div class="txt">
                    <h1>REGISTER </br>
                        </h1>
                    <p>Register and start working</p>
                </div>
                <a href="register" role="button">Register</a>
                <div class="ico-card">
                    <i class="kamarier-logo"></i>
                </div>
            </div>
        </div>

    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script>
        function getMessage() {
           $.ajax({
              type:'GET',
              dataType: "json",
              url:'http://127.0.0.1:8000/api/products/2',
              success:function(data) {
                 $("#msg").html(data.name);
              }
           });
        }
     </script>
  </head>
  
     <div id = 'msg'>This message will be replaced using Ajax. 
        Click the button to replace the message.</div>
     <?php
        echo "<form><button type='button' onClick='getMessage()'>Submit</button></form>";
     ?>


@endsection