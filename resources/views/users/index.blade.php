@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
<h2>
    <div class="m-l-lg">Përdorues</div>
</h2>
@endsection
@section('content')
<a href="/users/create" class="btn btn-primary">Create New Users</a> <br><br>

<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Liste <b>Përdoruesish</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                    <span>Shto te ri</span></a>

            </div>
        </div>
    </div>
    <table class="table table-striped table-hover table-responsive">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Roli</th>
                <th>Email</th>
                <th>Nr Tel</th>
                <th>Ndrysho</th>
                <th class="text-right">Modifiko</th>
                <th class="text-right">Fshi</th>
            </tr>
        </thead>
        <tbody>
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
                <td class="text-right">
                    <button href="#editProductModal" class="btn edit" data-target="#editProductModal" data-toggle="modal"
                        data-pid="{{$user->id}}" data-pem="{{$user->name}}" data-pc="{{$user->email}}">
                        <i class="material-icons edit" data-toggle="tooltip" title="Edito">&#xE254;</i>
                    </button>
                </td>
                <td class="text-right">
                    <a href="#deleteProductModal" class="btn delete" data-toggle="modal" id="{{$user->prod_id}}"
                        data-pname={{$user->name}}>
                        <i class="material-icons" data-toggle="tooltip" title="Fshi">&#xE872;</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endif
{{-- <script src="{{asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert') --}}
</div>
@endsection
