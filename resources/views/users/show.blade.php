@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Perdorues</div>
     </h2> 
@endsection
@section('content')
    @if($user && $user->id > 2)
    <h1>User: {{$user->id}}:</h1>
            <div class="jumbotron">
                <h4>
                   <strong> Useri:</strong>  {{$user->name}} <br> 
                   <strong>Nr Telit:</strong>  {{'+355'}} {{rand(67, 69)}} {{rand(10, 99)}} {{rand(10, 99)}} {{rand(100, 999)}} 
                </h4>
                <br><br>
            <a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit User</a>
            </div>
    @else 
            <h1>User not found</h1>
    @endif
@endsection