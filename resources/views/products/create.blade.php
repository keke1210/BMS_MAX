@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Krijo Produkte</div>
     </h2> 
@endsection
@section('content')
<div class="container">
    <h1>Create Product</h1>
    <form method="POST" action="/products">
       @csrf  
       <div class="form-group">
        <input type="text" name="name" placeholder="Emer Produkt" required>
        <input type="number" name="cmimi" placeholder="Cmim Produkt" required>
        <button type="submit">Create Produkt</button>
       </div>
    </form>
</div>
@endsection