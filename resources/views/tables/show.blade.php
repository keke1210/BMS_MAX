@extends('layouts.app')

@section('content')
    @php
        $id = $table->id;
    @endphp
    <h1>Table: {{$id}}</h1>
    <form action="/orders/create" method="GET">
        <button type="submit" name="table" value="{{$id}}" class="btn btn-primary">Create Order on this table</button>
    </form>
@endsection
