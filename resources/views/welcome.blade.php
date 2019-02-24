@extends('layouts.welcome')
@section('login')
@if(Auth::guest()) 
        <div class="main-title text-center">
                <img class="site-logo" src="images/BMS-LOGO.png">
            </div>
   
        <div class="wrap" style="margin-top:10%;">
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
              <div class="register-body">
              </div>
            </form>  
          </div>

@endsection

@endif

