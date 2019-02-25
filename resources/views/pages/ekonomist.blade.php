@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
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
                                                                <th>Fatura</th>
                                                                <th>Kamarier</th>
                                                                <th>Tavolina</th>
                                                                <th>Koha e krijimit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $orders = App\Order::orderBy('id','desc')->paginate(5);
                                            
                                                            $useradmin =App\User::find(1)->name;
                                                            @endphp
                                            
                                                            @foreach ($orders as $order)
                                                            @php
                                                            App\User::find($order->user_id)?$userfature=App\User::find($order->user_id)->name:$userfature="*admin* ne mungese";
                                                            @endphp
                                                            <tr>
                                                            <td>{{$order->id}}</td>
                                                                <td>DATA</td>
                                                                <td>DATA</td>
                                                                <td>DATA</td>
                                                                {{-- <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td> --}}
                                                               
                                                            </tr>
                                                            @endforeach
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