@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Produkte</div>
     </h2> 
@endsection
@section('content')
    @role('kamarier')
    <h1>Orders:</h1> <a href="orders/create" class="btn btn-primary">Krijo Porosi te re</a> <br> <br>
    <table class="table table-striped">
        <tr>
            <th>Order_ID</th>
            <th>Kamarier</th>
            <th>Tavolina</th>
            <th>Koha e krijimit</th>
            <th>Shiko Detaje</th>
        </tr>
        @foreach ($orders as $order)
        @php $userfature=App\User::find($order->user_id)->name @endphp
            <tr>
                <td>{{$order->id}}</td>          
                <td>{{$userfature}}</td>         
                <td>{{$order->T_id}}</td>
                <td>{{isset($order->created_at)?$order->created_at->format('H:i:s d/m/Y'):"no date"}}</td>
                <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td>
            </tr>
        @endforeach
        @endrole

        @role('menaxher|admin')
        <h1>Orders:</h1> <a href="orders/create" class="btn btn-primary">Krijo Porosi te re</a> <br> <br>
    <table class="table table-striped">
        <tr>
            <th>Order_ID</th>
            <th>Kamarier</th>
            <th>Tavolina</th>
            <th>Koha e krijimit</th>
            <th>Shiko Detaje</th>
        </tr>
        @php
           $orders = App\Order::orderBy('id','desc')->paginate(9);
           
           $useradmin =App\User::find(1)->name;
        @endphp

        @foreach ($orders as $order)
        @php 
           App\User::find($order->user_id)?$userfature=App\User::find($order->user_id)->name:$userfature="*admin* ne mungese";
        @endphp
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$userfature}}</td>
                <td>{{$order->T_id}}</td>
                <td>{{isset($order->created_at)?$order->created_at->format('H:i:s d/m/Y'):"no date"}}</td>
                <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td>
            </tr>

        @endforeach
        
            {{$orders->links()}}

        @endrole
@endsection
