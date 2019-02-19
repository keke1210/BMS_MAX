@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Shfaq Produkte</div>
     </h2> 
@endsection
@section('content')
    <h1>Product: {{$product->prod_id}}:</h1>
            <div class="jumbotron">
                <h4>
                       <strong> {{$product->name}} </strong> kushton {{$product->cmimi}} Lek
                </h4>
                <br><br>
            <a href="/products/{{$product->prod_id}}/edit" class="btn btn-primary">Edit Produkt</a>
            </div>
@endsection