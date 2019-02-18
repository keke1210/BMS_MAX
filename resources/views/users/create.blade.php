@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>
    <form method="POST" action="/users">
       @csrf  
       <div class="form-group">
            <input type="text" name="name" placeholder="Emri" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="password" placeholder="Password" required>
            <input type="text" name="c_password" placeholder="Confirm password" required>
            
            <div><label>Kamarier</label><input type="radio" value="kamarier" name="radio" required> </div> 
            <div><label>Ekonomist</label><input type="radio" value="ekonomist" name="radio"></div> 

            <button type="submit">Create User</button>
       </div>
    </form>
</div>
@endsection