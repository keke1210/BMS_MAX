@extends('layouts.app')
@section('content')
@role('admin')

    <h1>Admino</h1>    
    <a href="/products" class="btn btn-primary">
        Menaxho Produkte
    </a>

    <a href="#" class="btn btn-primary">
        Menaxho Kamariere
    </a>

    <a href="#" class="btn btn-primary">
        Menaxho Fatura
    </a>
@endrole

@endsection
