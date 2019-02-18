@extends('layouts.app')

@section('content')
    <h1>Tables:</h1> <a href="tables/create" class="btn btn-primary">Krijo Table te ri</a> <br> <br>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Rezervuar</th>
            <th>Ndrysho</th>
        </tr>
    @if(count($tables)>0)
        @foreach ($tables as $table)
            <tr>
                <td>{{$table->id}}</td>
                <td>{{$table->description}}</td>
                <td>{{$table->rezervuar ? "true" : "false"}}</td>
                <td><a href="/tables/{{$table->id}}">Ndrysho {{$table->id}}</a></td>
            </tr>
        @endforeach
    </table>
    @endif
@endsection
