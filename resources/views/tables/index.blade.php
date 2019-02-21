@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Tavolina</div>
     </h2> 
@endsection
@section('content')
    <h1>Tables:</h1> <a href="tables/create" class="btn btn-primary">Krijo Table te ri</a> <br> <br>
    <div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Liste <b>Produktesh</b></h2>
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
                    <th>ID</th>
                    <th>Description</th>
                    <th>Rezervuar</th>
                    <th class="text-right">Modifiko</th>
                    <th class="text-right">Fshi</th>
                </tr>
            </thead>
            <tbody>
    @if(count($tables)>0)
        @foreach ($tables as $table)
            <tr>
                <td>{{$table->id}}</td>
                <td>{{$table->description}}</td>
                <td>{{$table->rezervuar ? "true" : "false"}}</td>
                <td><a href="/tables/{{$table->id}}">Ndrysho {{$table->id}}</a></td>
                <td class="text-right">
                    <button href="#editProductModal" class="btn edit" data-target="#editProductModal" data-toggle="modal" data-pid="{{$table->id}}" >
                                <i class="material-icons edit" data-toggle="tooltip" title="Edito">&#xE254;</i>
                    </button>
                </td>
                <td class="text-right">
                    <a href="#deleteProductModal" class="btn delete" data-toggle="modal" id="{{$table->id}}" data-pname={{$table->id}}>
                        <i class="material-icons" data-toggle="tooltip" title="Fshi">&#xE872;</i></a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
    </div>
@endsection
