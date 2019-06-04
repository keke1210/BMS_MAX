@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Produkte</div>
     </h2> 
@endsection
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
            <div>
               <label>Kamarier</label>
               <input type="radio" value="kamarier" name="radio" required> 
            </div> 
            <div>
               <label>Ekonomist</label>
                  <input type="radio" value="ekonomist" name="radio">
            </div> 

            {{-- <input type="text" name="orari" placeholder="Orari" required> --}}
            <select name="orari">
               <option selected disabled>orari</option>
               <option value="08:00-15:00">08:00-15:00</option>
               <option value="15:00-21:00">15:00-21:00</option>
               <option value="13:00-19:00">13:00-19:00</option>
            </select>

            <button type="submit">Create User</button>
       </div>
    </form>
</div>
@endsection