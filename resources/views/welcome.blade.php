
@extends('layouts.welcome')
@section('login')

<div class="main-title text-center">
    <img class="site-logo" src="images/BMS-LOGO.png">
</div>

    @if(Auth::guest())
    
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


@else
@section('login')
<div class="row ibox-content no-padding">
    <div class="col-12">
        <div class="row day-columns">
            <div class="day-column">
                <div class="day-header">Monday</div>
                <div class="day-content">
                    <div class="event gray">
                        <span class="title">{{$oraret->user->name}}</span>
                        <footer>
                            <span>Orari</span>
                            <span>{{$oraret->koha_fillimit}} - {{$oraret->koha_mbarimit}}</span>
                        </footer>
                    </div>

                    <div class="event blue">
                        <span class="title">{{$userat->name}}</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>
                        </footer>
                    </div>
                </div>
                <div class="day-footer">4 Kamarier</div>
            </div>
            <div class="day-column">
                <div class="day-header">Tuesday</div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-footer">2 Kamarier</div>
            </div>
            <div class="day-column">
                <div class="day-header">Wednesday</div>
                <div class="day-content">

                    <div class="event blue">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>
                </div>
                <div class="day-footer">4 Kamarier</div>
            </div>
            <div class="day-column">
                <div class="day-header">Thursday</div>
                <div class="day-content">
                    <div class="event navy">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>


                </div>
                <div class="day-footer">5 Kamarier</div>
            </div>
            <div class="day-column">
                <div class="day-header">Friday</div>
                <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>

                    <div class="event red">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>

                </div>
                <div class="day-footer">2 Kamarier</div>
            </div>
            <div class="day-column">
                <div class="day-header">Saturday</div>
                <div class="day-content">

                    <div class="event blue">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>
                </div>
                <div class="day-footer">1 Kamarier</div>
            </div>
            <div class="day-column">
                <div class="day-header">Sunday</div>
                <div class="day-content">
                    <div class="event gray">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                            <span>Orari</span>
                            <span>20:30</span>

                        </footer>
                    </div>

                </div>
                <div class="day-footer">2 Kamarier</div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif
