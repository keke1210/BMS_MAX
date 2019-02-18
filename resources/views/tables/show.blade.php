@extends('layouts.app')

@section('content')
    <h1>Table: {{$table->id}}</h1>
    <form action="/orders/create" method="GET">
        <button type="submit" class="btn btn-primary">Create Order on this table</button>
    </form>
{{-- 
    @php
        $btn = Request::get('btn');  
        if('btn') {
            $table->id
        } 
    @endphp --}}

    {{-- <form method="POST" action="/tables/{{$table->id}}">
        <button type="submit" name="btn" {{$rezervuar?"disabled":""}}>{{$rezervuar?"E rezervuar":"Rezervo"}}</button>
    </form> --}}

@endsection
