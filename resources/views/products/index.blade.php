@extends('layouts.app')

@section('content')
    <h1>Products:</h1> <a href="products/create" class="btn btn-primary">Krijo Produkt te ri</a> <br> <br>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Cmimi</th>
            <th>Shiko Produkt</th>
        </tr>
    @if(count($products)>0)
        @foreach ($products as $product)
            <tr>
                <td>{{$product->prod_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->cmimi}} Lek</td>
                <td><a href="/products/{{$product->prod_id}}/edit">Ndrysho {{$product->name}}</a></td>
            </tr>
        @endforeach
    </table>
    @endif
@endsection
