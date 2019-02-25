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
    <div class="col-xs-12">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                    <div class="ibox-content" style="border-radius:5px;">
                    </div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-radius:5px;">
                        </div>
                </div>
            </div>
    </div>
    <div class="col-xs-12">
            <div class="col-md-6">
                <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-radius:5px;">
                        </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="ibox float-e-margins">
                            <div class="ibox-content" style="border-radius:5px;">
                            </div>
                    </div>
                </div>
        </div>
    </div>
@endrole
@endsection