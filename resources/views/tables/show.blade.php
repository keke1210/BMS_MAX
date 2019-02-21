@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Tavolina</div>
     </h2> 
@endsection
@section('content')
    @php
        $id = $table->id;
    @endphp
    <h1>Table: {{$id}}</h1>
    <form action="/orders/create/{{$id}}" method="GET">
        <button type="submit" class="btn btn-primary">Create Order on this table</button>
    </form>
@endsection
