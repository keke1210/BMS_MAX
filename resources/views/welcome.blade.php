@extends('layouts.app')

@section('content')
@if(Auth::guest())
<div class="jumbotron text-center">
        <h1>Bar Managment System</h1>
        <p>This is the web for managing your Lounge Bar</p>
        <p> 
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
        </p>
    </div> 

   

    @else
        @role('admin')
        <h1>Welcome <strong>admini</strong></h1>
        @endrole
        @role('menaxher')
        <h1>Welcome menaxher <strong>{{Auth::user()->name}}</strong></h1>
        @endrole
        @role('ekonomist')
        <h1>Welcome ekonomist <strong>{{Auth::user()->name}}</strong> </h1>
        @endrole
        @role('kamarier')
        <h1>Welcome kamarier <strong>{{Auth::user()->name}}</strong> </h1>
        @endrole
    @endif

    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
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