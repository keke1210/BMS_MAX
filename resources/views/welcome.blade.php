@extends('layouts.welcome')
@section('login')
<div class="main-title text-center">
        @if(Auth::guest()) <img class="site-logo" src="images/BMS-LOGO.png">
        @else <a href="{{ URL::previous() }}"><img class="site-logo" src="images/BMS-LOGO.png"></a> @endif
</div>
@if(Auth::guest()) 
<div class="wrap" style="margin-top:5%;">
    <form class="login" id="forme" method="POST" action="{{ route('login') }}" accept-charset="utf-8">
        @csrf
        <div class="toggle-bar">
            <div class="toggle-login active">
                <span>Login</span>
            </div>
            <div class="toggle-register">
                <span>Register</span>
            </div>
        </div>
        <div class="login-body">
                
        </div>
        <div class="login-ajax"><button id="login-button" class="btn btn-red">Login</button></div>
        <div class="register-body">
        </div>
    </form>
</div>
<style>
    .login-ajax{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    }
</style>

<script>
        jQuery(document).ready(function ($) {
            
    $("#login-button").on("click",function(){
        $email=$("#email").val();
        $password=$("#password").val();

        alert("Email: "+$email+"\n Password: "+$password);
    
        $.ajax({
                url: 'http://127.0.0.1:8000/api/login',
                type: 'POST',
                data: {email:$email, password:$password},
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                success: function (data, status) { 
                    localStorage.setItem('appname_token', data.success.token);
                    alert(data, status); 
                    alert(localStorage.getItem('appname_token') );

                },
                error: function( xhr, status, error ) {
                    alert(error, status);//...
                }
            });
    });
        });
    </script>
@endsection


@else
@section('login')
<div class="row ibox-content no-padding">
    <div class="col-12">
        <div class="row day-columns">
          
                @php
                $dite_jave=array('E Hënë', 'E Martë', 'E Mërkurë','E Enjte','E Premte','E Shtunë','E Diel');    
                $i=0;
                @endphp
                @for($i=0;$i<7;$i++)
                <div class="day-column">
            <div class="day-header"><?php echo $dite_jave[$i]?></div>
                <div class="day-content">
                    @php $count=0 @endphp
                

    @php $users = App\User::where('id','<>',1)->get() @endphp

    @foreach ($users as $user)
      

                        @if($count%3==1)
                     <div class="event blue">
                        <span class="title">{{$user->name}}</span>
                        <footer>
                            <span> {{$user->orari}} </span>
                        </footer>
                    </div>
                    @php $count++ @endphp
                    @elseif($count%3==0)
                    @php $count++ @endphp
                    <div class="event red">
                        <span class="title">{{$user->name}}</span>
                        <footer>
                            <span> {{$user->orari}} </span>
                        </footer>
                    </div>
                    @else
                    @php $count++ @endphp
                    <div class="event green">
                        <span class="title">{{$user->name}}</span>
                        <footer>
                            <span> {{$user->orari}} </span>
                        </footer>
                    </div>
                    @endif
                    @endforeach
                </div>
                {{-- <div class="day-footer">{{count($user)}} Punonjës</div> --}}
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection

@endif