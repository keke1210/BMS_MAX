@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Ekonomist</div>
     </h2> 
@endsection
@section('content')
@role('ekonomist|admin')
    <br><br><br>
    <div class="wrapper wrapper-content ng-scope" style="">
    <h2>Info and stats</h2>
    </div>
@endrole
@endsection