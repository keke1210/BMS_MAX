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
                <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
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
                <td>{{'0'}}{{rand(67, 69)}} {{rand(10, 99)}}{{rand(10, 99)}} {{rand(100, 999)}}</td>
                <td><a href="/users/{{$user->id}}/edit">Ndrysho {{$user->name}}</a></td>
                <td class="text-right">
                    <button href="#editUserModal" class="btn edit" data-target="#editUserModal" data-toggle="modal"
                        data-pid="{{$user->id}}" data-pem="{{$user->name}}" data-pc="{{$user->email}}">
                        <i class="material-icons edit" data-toggle="tooltip" title="Edito">&#xE254;</i>
                    </button>
                </td>
                <td class="text-right">
                    <a href="#deleteUserModal" class="btn deleteUser" data-toggle="modal" id="{{$user->id}}"
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

    

<script src="{{asset('js/sweetalert.min.js')}}"></script>

</div>
<!-- Popup Shtim HTML -->
<div id="addUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                    <form method="POST" action="/users">
                                @CSRF
                    <div class="modal-header">
                        <h4 class="modal-title">Shto Përdorues</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        @include('users.form')
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Shto">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Popup  Editim User -->
<div id="editUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="editForm" method="POST" action="/users">
        @method('PUT')
                {{csrf_field()}}
                {{-- {{method_field('PUT')}} --}}
                {{-- <input type="hidden" name="_method" value="PUT" id="prod_id"> --}}
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal" id="" aria-hidden="true" >&times;</button>
                </div>
                <div class="modal-body">
                    @include('users.form')
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Edito">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Popup Fshirje HTML -->
    <div id="deleteUserModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" class="delete_form" action="/users/">
                        @method('DELETE')
                        @CSRF
                        <div class="modal-header">
                            
                            <h4 class="modal-title">Fshi Përdorues</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           
                        </div>
                        <div class="modal-body">
                            <p>Je i sigurt që dëshiron t'i fshish përdoruesin?</p>
                            <h1 type="form-control text" class="User"></h1>
                            <p class="text-warning"><small>Ky veprim nuk mund të zhbëhet.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-danger" id value="Fshi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('sweet::alert')
@endsection
