@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Modifiko perdorues</div>
     </h2> 
@endsection
@section('content')
<div class="container">
    @if($user && $user->id > 2)
    <h1>Edit User</h1>
    <form method="POST" action="/users/{{$user->id}}">
       @method('PUT')
       @csrf  
       <div class="form-group">
            <input type="text" name="name" placeholder="Emri" value="{{$user->name}}" required>
            <input type="email" name="email" placeholder="Email" value="{{$user->email}}" required>
            <input type="text" name="password" placeholder="Password" required>
            <div>
                <label>Kamarier</label>
                <input type="radio" value="kamarier" name="radio" required> 
            </div> 
            <div>
                <label>Ekonomist</label><input type="radio" value="ekonomist" name="radio">
            </div> 
            <button type="submit">Update User</button>
       </div>
    </form>

    <form method="POST" action="/users/{{$user->id}}">
        @method('DELETE')
        @csrf
        <button type="submit">Delete User</button>
    </form>
    @else 
    <h1>User cannot be edited</h1>
@endif
</div>
@endsection