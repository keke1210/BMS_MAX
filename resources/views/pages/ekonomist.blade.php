@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
{{-- <h2>
    <div>Ekonomist</div>
</h2> --}}
{{-- @php

    foreach($total as $key=>$t){
        dump($t->totali.' '.$t->order_id);
    }

@endphp --}}
@endsection
@section('content')
<script src="{{asset('js/plugins/chartsjs/chart.js')}}"></script>
@role('ekonomist|admin')
<div class="wrapper wrapper-content ng-scope" style="">
    <h2>Info and stats</h2>
    <div class="col-xs-12">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" style="border-radius:5px;">
                    <canvas id="graph" style="width:100%"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content" style="border-radius:5px;">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>PRODUKTET <b>ME TE SHITURA</b></h2>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Produkti</th>
                                        <th>Sasia</th>
                                    </tr>
                                </thead>
                                <tr>
                                   <td>{{$product_name}}</td><td>{{$product_sasia_max}} cope</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content" style="border-radius:5px;">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>TAVOLINA <b>ME E PREFERUAR</b></h2>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tavolina</th>
                                        <th>Totali ne lek</th>
                                    </tr>
                                </thead>
                                <tr>
                                   <td>{{$tavolina_id}}</td><td>{{$totali_max}}</td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    var data = {
        labels: ['E Hënë', 'E Martë', 'E Mërkurë', 'E Enjte', 'E Premte', 'E Shtunë', 'E Diel'],
        datasets: [{
            fillColor: "rgba(67, 93, 125, 0.7)",
            strokeColor: "rgba(67, 93, 125, 1)",
            pointColor: "rgba(67, 93, 125, 1))",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            data: [0,20, 40, 50, 70, 30, 45, 60]
        }]
    };
    var context = document.getElementById("graph").getContext('2d');

    new Chart(context).Line(data);
</script>
@endrole
@endsection