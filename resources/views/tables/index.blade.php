@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
<h2>
    <div class="m-l-lg">Tavolina</div>
</h2>
@endsection
@section('content')
<a href="tables/create" class="btn btn-primary">Krijo Table te ri</a> <br> <br>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Liste <b>Tavolinash</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="#addTableModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                    <span>Shto te ri</span></a>

            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Rezervuar</th>
                    <th>Ndrysho</th>
                    <th class="text-right">Modifiko</th>
                    <th class="text-right">Fshi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($tables)>0)
                @foreach ($tables as $table)
                <tr>
                    <td>{{$table->id}}</td>
                    <td>{{$table->description}}</td>
                    <td>{{$table->rezervuar ? "true" : "false"}}</td>
                    <td><a href="/tables/{{$table->id}}">Ndrysho {{$table->id}}</a></td>
                    <td class="text-right">
                        <button href="#editTableModal" class="btn edit" data-target="#editTableModal" data-toggle="modal"
                            data-pid="{{$table->id}}" data-tlloj="{{$table->description}}">
                            <i class="material-icons edit" data-toggle="tooltip" title="Edito">&#xE254;</i>
                        </button>
                    </td>
                    <td class="text-right">
                        <a href="#deleteTableModal" class="btn deleteTable" data-toggle="modal" id="{{$table->id}}"
                            data-tlloj="{{$table->description}}">
                            <i class="material-icons" data-toggle="tooltip" title="Fshi">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    @endif
</div>
@endsection

<!-- Popup Shtim HTML -->
<div id="addTableModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/tables">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Shto Tavolinë</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    @include('tables.form')
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" id="shtoTavoline" value="Shto">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editTableModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" action="tables">
                @method('PUT')
                {{csrf_field()}}
                {{-- {{method_field('PUT')}} --}}
                {{-- <input type="hidden" name="_method" value="PUT" id="prod_id"> --}}
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" id="" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    @include('tables.form')
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" class="btn btn-info" value="Edito">Edito</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fshi Tavoline -->
<div id="deleteTableModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" class="delete_form" action="/tavoline/">
                @method('DELETE')
                @CSRF
                <div class="modal-header">

                    <h4 class="modal-title">Fshi Tavolinë</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <p>Je i sigurt që dëshiron t'i fshish tavolinë?</p>
                    <h1 type="form-control text" class="Table"></h1>
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
<script>
