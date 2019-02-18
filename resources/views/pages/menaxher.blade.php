@extends('layouts.app')
@section('content')
@role('menaxher|admin')

    <h1>Menaxher</h1>    
    <a href="/products" class="btn btn-primary">
        Menaxho Produkte
    </a>

    <a href="/users" class="btn btn-primary">
        Menaxho Usera
    </a>

    <a href="/orders" class="btn btn-primary">
        Shiko te gjitha Faturat
    </a>

    <a href="/tables" class="btn btn-primary">
        Menaxho Tavolina
    </a>
@endrole

@endsection
