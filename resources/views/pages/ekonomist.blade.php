@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
<h2>
    <div class="m-l-lg">{{$orders->order_id}}</div>
</h2>
@php
    $collection = $nen_total->groupBy('order_id');
    foreach ($collection as $i => $nt) {

        $sum= $collection[$i]->sum('nen_total');
       
    }
    //dd($collection[$i]->first());
    foreach ($collection as $i => $nt) {
        // $collection = $nen_total->groupBy('order_id');
        // $crat= $collection[$i]->groupBy('created_at');
        // echo $crat->first();
        echo $collection[$i]->first()->order_id. ' ';
    }

@endphp
<p>{{$nen_total}}</p>
@endsection
@section('content')
<script src="{{asset('js/plugins/chartsjs/chart.js')}}"></script>
@role('ekonomist|admin')
<br><br><br>
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
                        @php
                        //  $totali = $orders = DB::table('orders')
                        //                 ->select('department', DB::raw('SUM(cmimi) as total_sales'))
                        //                 ->groupBy('department')
                        //                 ->havingRaw('SUM(price) > ?', [2500])
                        //                 ->get();   
                        
                        @endphp  
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Fatura</th>
                                        <th>Kamarier</th>
                                        <th>Tavolina</th>
                                        <th>Koha e krijimit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                    $orders = App\Order::orderBy('id','asc')->get();

                                    $useradmin =App\User::find(1)->name;
                                    @endphp --}}

                                    {{-- @foreach ($orders as $key=>$order)
                                    @php
                                    App\User::find($order->user_id)?$userfature=App\User::find($order->user_id)->name:$userfature="*admin*
                                    ne mungese";
                                    @endphp --}}
                                    {{-- @foreach ($collection as $key=>$item)
                                        @php $shuma =$collection[$key]->sum('nen_total') @endphp
                                        <tr>
                                        <td>{{$collection[$key]->first()->order_id}}</td>
                                        <td>{{$shuma}}</td>
                                        <td>DATA</td>
                                        <td>DATA</td>
                                    @endforeach --}}
                                    
                                        {{-- <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td>
                                        --}}

                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
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
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{{-- @foreach ($collection as $key=>$item)
                                        @php $shuma =$collection[$key]->sum('nen_total') @endphp
                                        <td>{{$collection[$key]->first()->order_id}}</td>
                                        <td>{{$shuma}}</td>
                                        <td>DATA</td>
                                        <td>DATA</td> --}}
 {{-- @endforeach --}}

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