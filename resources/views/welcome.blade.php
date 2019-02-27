@extends('layouts.welcome')
@section('login')

<div class="main-title text-center">
        @if(Auth::guest()) <img class="site-logo" src="images/BMS-LOGO.png">
        @else <a href="{{ URL::previous() }}"><img class="site-logo" src="images/BMS-LOGO.png"></a> @endif
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
          
                @php
                $dite_jave=array('E Hënë', 'E Martë', 'E Mërkurë','E Enjte','E Premte','E Shtunë','E Diel');    
                $i=0;
                @endphp
                @for($i=0;$i<7;$i++)
                <div class="day-column">
            <div class="day-header"><?php echo $dite_jave[$i]?></div>
                <div class="day-content">
                      
                    @foreach ($orar1 as $orari)
                        <div class="event gray">
                            <span class="title">{{$orari->user->name}}</span>
                            <span>{{$orari->koha_fillimit}} -<span>{{$orari->koha_fillimit}}</span>
                            
                        </div>
                    @endforeach


                    {{-- @foreach ($orar1 as $orari)
                        
                    <div class="event blue">
                        <span class="title">{{$orari->user->name}}</span>
                        <footer>
                            <span>{{$orari->koha_fillimit}} -<span>{{$orari->koha_fillimit}}</span>
                        </footer>
                    </div>
                    @endforeach --}}

                    <footer>
                            <span>Orari</span>
                            <span></span> </span>
                                {{-- {{$oraret[0]->id}}</span> --}}
                        </footer>
                </div>
                <div class="day-footer">Nr Punonjësish</div>
                
            </div>
            @endfor
            
        </div>
    </div>
</div>
@endsection
@endif
