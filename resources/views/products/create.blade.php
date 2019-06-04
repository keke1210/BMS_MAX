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
        {{-- <input type="number" name="category_id" placeholder="Category" required> --}}
        @php

         $categoryID = App\Category::all()->map(function ($category, $key){
            return $category->category_id;
        });

        $categoryName = App\Category::all()->map(function ($category, $key){
            return $category->name;
        });
        @endphp

        <select name="category_id">
           @for($i=0;$i<count($categoryID); $i++)
               <option value={{$categoryID[$i]}}>{{$categoryName[$i]}}</option>
           @endfor
        </select>
        <input type="number" name="gjendja" placeholder="Gjendja" required> cope
        <button type="submit">Create Produkt</button>
       </div>
    </form>
</div>
@endsection