@extends('layouts.app')
@extends('layouts.dashboard')
@role('admin')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Administrator</div>
     </h2> 
@endsection
@section('content')
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
@endsection
@endrole
