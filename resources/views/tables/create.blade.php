@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Tables</h1>
    <form method="POST" action="/tables">
       @csrf  
       <div class="form-group">
        <select name="description"> 
            <option>Zgjidh llojin</option>
            <option name="dysh" value="dysh">Dysh</option>
            <option name="tek" value="tek">Tek</option>
        </select>
        <button type="submit">Create Table</button>
       </div>
    </form>
</div>
@endsection