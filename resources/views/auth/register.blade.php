@extends('layouts.welcome-auth')

@section('login')
<div class="col-xs-12 col-sm-10 col-md-6 col-lg-5 text-center d-flex flex-column flex-nowrap no-m-res" style="height:calc(100% - 65px); margin-top: 65px;">
    <div class="d-flex flex-center flex-wrap" style="height:90%;align-content: start;">
        <div class="box-login global-box-back" style="padding-top: 20px !important;padding-bottom: 0 !important;">
            <h1 class="m-t-xl m-b-sm flex-row flex-center" id="logo">
                <a href="#" target="_blank" escape="false">
                    <img src="images/official-logo.png" alt="BMS" style="max-width:350px; max-height:105px"> </a><br>
            </h1>
            <h2 id="baseline" class="m-t-sm m-b-none col-xs-12 flex-row flex-center">
                Log In
            </h2>
            <form method="POST" action="{{ route('register') }}" accept-charset="utf-8" class="p-lg col-xs-12" style="padding-top:5px;">

                @csrf
                <div class="input-field">
                    <div class="input text">

                        <input id="name" type="text" class="validate global-box-full  form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name" value="{{ old('name') }}" placeholder="Emri" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="input-field">
                    <div class="input text">

                        <input id="email" type="email" class="validate global-box-full form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" value="{{ old('email') }}" placeholder="Email@entreprise.com" required
                            autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>
                <div class="input-field">
                    <div class="input password">
                        <input id="password" type="password" placeholder="Password" class="validate global-box-full form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>


                <div class="input-field">
                    <div class="input password">
                        <input id="password-confirm" type="password" placeholder="Konfirmo Password" class="validate global-box-full form-control"
                            name="password_confirmation" required>
                    </div>
                    <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>



                <button type="submit" class="btn  btn-orange">Log In</button>

            </form>
        </div>
    </div>
</div>


@endsection
