@extends('layouts.app')

@section('content')
    <h1> Users :</h1> <a href="/users/create" class="btn btn-primary">Create New Users</a> <br><br>
     <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Roli</th>
            <th>Email</th>
            <th>Nr Tel</th>
            <th>Ndrysho</th>
        </tr>
    @if(count($users)>0)
        @foreach ($users as $key=>$user)
        @php
            $role = $user->getRoleNames()->first();
            if($role === 'admin' || $role === 'menaxher') {
                continue;
            }
        @endphp
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$role}}</td>
                <td>{{$user->email}}</td>
                <td>{{'+355'}} {{rand(67, 69)}} {{rand(10, 99)}} {{rand(10, 99)}} {{rand(100, 999)}}</td>
                <td><a href="/users/{{$user->id}}/edit">Ndrysho {{$user->name}}</a></td>
            </tr>
        @endforeach
    </table>
    @endif
@endsection
