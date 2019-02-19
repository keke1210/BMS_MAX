@extends('layouts.welcome-auth')

@section('login')
<div class="col-xs-12 col-sm-10 col-md-6 col-lg-5 text-center d-flex flex-column flex-nowrap no-m-res" style="height:calc(100% - 65px); margin-top: 65px;">
    <div class="d-flex flex-center flex-wrap" style="height:90%;align-content: start;">
        <div class="box-login global-box-back" style="padding-top: 20px !important;padding-bottom: 0 !important;">
            <h1 class="m-t-xl m-b-sm flex-row flex-center" id="logo">
                <a href="#" target="_blank" escape="false">
                    <img src="/images/official-logo.png" alt="BMS" style="max-width:350px; max-height:105px"> </a><br>
            </h1>
            <h2 id="baseline" class="m-t-sm m-b-none col-xs-12 flex-row flex-center">
                Reset Password
            </h2>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" accept-charset="utf-8" class="p-lg col-xs-12"
                style="padding-top:5px;">

                @csrf

                <div class="input-field">
                    <div class="input text">

                        <input id="email" type="email" class="validate global-box-full form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <button type="submit" class="btn  btn-orange">Send Reset Password Link</button>

            </form>
        </div>
    </div>
</div>


@endsection

