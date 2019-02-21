@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
<h2>
    <div>Porosi</div>
</h2>
@endsection
@section('content')

@role('kamarier')
<a href="orders/create" class="btn btn-primary">Krijo Porosi te re</a> <br> <br>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Liste <b>Porosish</b></h2>
            </div>
            
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Order_ID</th>
                        <th>Kamarier</th>
                        <th>Tavolina</th>
                        <th>Koha e krijimit</th>
                        <th class="text-center">Detaje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    @php $userfature=App\User::find($order->user_id)->name @endphp
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$userfature}}</td>
                        <td>{{$order->T_id}}</td>
                        <td>{{isset($order->created_at)?$order->created_at->format('H:i:s d/m/Y'):"no date"}}</td>
                        {{-- <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td> --}}
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
</div>
@endrole

@role('menaxher|admin|ekonomist')
<a href="orders/create" class="btn btn-primary">Krijo Porosi te re</a> <br> <br>
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
                    <th>Order_ID</th>
                    <th>Kamarier</th>
                    <th>Tavolina</th>
                    <th>Koha e krijimit</th>
                    <th class="text-center">Detaje</th>
                </tr>
            </thead>
            <tbody>
                @php
                $orders = App\Order::orderBy('id','desc')->paginate(9);

                $useradmin =App\User::find(1)->name;
                @endphp

                @foreach ($orders as $order)
                @php
                App\User::find($order->user_id)?$userfature=App\User::find($order->user_id)->name:$userfature="*admin*
                ne
                mungese";
                @endphp
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$userfature}}</td>
                    <td>{{$order->T_id}}</td>
                    <td>{{isset($order->created_at)?$order->created_at->format('H:i:s d/m/Y'):"no date"}}</td>
                    {{-- <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td> --}}
                    <td class="text-center">
                        <a href="/orders/{{$order->id}}">
                            <i class="fa fa-file edit" data-toggle="tooltip" title="Shiko Faturen"></i>
                        </a>
                    </td>
                </tr>

                @endforeach

                {{$orders->links()}}
            </tbody>
        </table>
    </div>
</div>

@endrole
@endsection
