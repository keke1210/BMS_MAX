@extends('layouts.app')

@section('content')
@role('kamarier|admin')
    <h1>Kamarier</h1>   
    <a href="/orders" class="btn btn-primary">
        Shiko Faturat e tua
    </a>

    <a href="/orders/create" class="btn btn-primary">
        Krijo Porosi
    </a>

    <br><br>
    <aside>Ktu sheh orarin e vet</aside>
@endrole
@endsection