@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
@endsection
@section('content')

@role('kamarier')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Listë <b>faturash</b></h2>
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
                    <th>Totali</th>
                    <th class="text-center">Detaje</th>
                </tr>
            </thead>
		<tbody>
        @foreach ($orders as $order)
        @php
         $userfature=App\User::find($order->user_id)->name;
         $totali_query = DB::table('order_totali')
                ->select('totali')
                ->where('order_id','=', $order->id)
                ->get();

        $totali = json_decode($totali_query)[0]->totali;
        @endphp
            <tr>
                <td>{{$order->id}}</td>          
                <td>{{$userfature}}</td>         
                <td>{{$order->T_id}}</td>
                <td>{{isset($order->created_at)?$order->created_at->format('H:i:s d/m/Y'):"no date"}}</td>
                <td>{{$totali}} Lek</td>
                <td class="text-center">
                    <a href="/orders/{{$order->id}}">
                        <i class="fa fa-file edit" data-toggle="tooltip" title="Shiko Faturen"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
{{$orders->links()}}

@endrole

@role('menaxher|admin|ekonomist')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Liste <b>Porosish</b></h2>
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
                    <th>Totali</th>
                    <th class="text-center">Detaje</th>
                </tr>
            </thead>
            <tbody>
                @php
                // $orders = App\Order::orderBy('id','desc')->paginate(5);

                $useradmin =App\User::find(1)->name;
                @endphp

                @foreach ($orders as $order)
                @php
                App\User::find($order->user_id)?$userfature=App\User::find($order->user_id)->name:$userfature="*admin* ne mungese";
                
                $totali_query = DB::table('order_totali')
                ->select('totali')
                ->where('order_id','=', $order->id)
                ->get();
                
                $totali = json_decode($totali_query)[0]->totali;
                @endphp
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$userfature}}</td>
                    <td>{{$order->T_id}}</td>
                    <td>{{isset($order->created_at)?$order->created_at->format('H:i:s d/m/Y'):"no date"}}</td>
                    <td>{{$totali}} Lek</td>
                    <td class="text-center">
                        <a href="/orders/{{$order->id}}">
                            <i class="fa fa-file edit" data-toggle="tooltip" title="Shiko Faturen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{$orders->links()}}

@endrole
@endsection
