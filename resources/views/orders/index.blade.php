@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Produkte</div>
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
                <div class="col-sm-6">
                    <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                        <span>Shto te ri</span></a>
                  
                </div>
            </div>
        </div>
		        <table class="table table-striped table-hover table-responsive">
				<thead>
        <tr>
            <th>Order_ID</th>
            <th>Kamarier_id</th>
            <th>Tavolina_ID</th>
            <th>Koha e krijimit</th>
            <th>Shiko Detaje</th>
        </tr>
		</thead>
		<tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->T_id}}</td>
                <td>{{$order->created_at->format('H:i:s d/m/Y')}}</td>
                <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td>
            </tr>
        @endforeach
		</tbody>
		</table>
		</div>
        @endrole

        @role('menaxher|admin|ekonomist')
        <h1>Orders:</h1> <a href="orders/create" class="btn btn-primary">Krijo Porosi te re</a> <br> <br>
    	<div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Liste <b>Porosish</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                        <span>Shto te ri</span></a>
                  
                </div>
            </div>
        </div>
		        <table class="table table-striped table-hover table-responsive">
				<thead>
        <tr>
            <th>Order_ID</th>
            <th>Kamarier_id</th>
            <th>Tavolina_ID</th>
            <th>Koha e krijimit</th>
            <th>Shiko Detaje</th>
        </tr>
                </thead>
                <tbody>
        @php
           $orders = App\Order::orderBy('id','desc')->paginate(2);
        @endphp

        @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->T_id}}</td>
                <td>{{$order->created_at->format('H:i:s d/m/Y')}}</td>
                <td><a href="/orders/{{$order->id}}">Shiko Faturen {{$order->id}}</a></td>
            </tr>

        @endforeach
        
            {{$orders->links()}}
        </tbody>
    </table>
    </div>
        @endrole
@endsection
