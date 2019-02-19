@extends('layouts.app')
@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form method="POST" action="/products/{{$product->prod_id}}">
       @method('PATCH')
       @csrf  
       <div class="form-group">
            <input type="text" name="name" placeholder="Emer Produkt" value="{{$product->name}}">
            <input type="number" name="cmimi" placeholder="Cmim Produkt" value="{{$product->cmimi}}">

            {{-- <input type="hidden" name="_method" value="put"> --}}

            <button type="submit" class="btn btn-primary">Update Produkt</button>
       </div>
    </form>

    <form method="POST" action="/products/{{$product->prod_id}}">
        @method('DELETE')
        @csrf

        <button type="submit" class="btn btn-danger">Delete Produkt</button>

    </form>
</div>
@endsection