@extends('layouts.app')
@extends('layouts.dashboard')
@include('inc.liste')
@section('dash-title')
@endsection
@section('content')
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Liste <b>Produktesh</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                    <span>Shto te ri</span></a>
                </div>
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Emri</th>
                    <th>Cmimi</th>
                    <th>Gjendja</th>
                    <th>Kategori</th>
                    <th class="text-right">Modifiko</th>
                    <th class="text-right">Fshi</th>
                </tr>
            </thead>
            <tbody>
               @if(count($products)>0)
        @foreach ($products as $product)
            <tr>
                <td>{{$product->prod_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->cmimi}} Lek</td>
                <td>{{$product->gjendja}} cope</td>
                <td>{{$product->category_id?App\Category::where('category_id',$product->category_id)->first()->name:"S'ka kategori"}}</td>
                <td class="text-right">
                <button href="#editProductModal" class="btn edit" data-target="#editProductModal" data-toggle="modal" data-pid="{{$product->prod_id}}"  data-pem="{{$product->name}}"  data-pc="{{$product->cmimi}}" data-pq="{{$product->gjendja}}" data-pcat="{{$product->category_id?App\Category::where('category_id',$product->category_id)->first()->name:"S'ka kategori"}}">
                    <i class="material-icons edit" data-toggle="tooltip" title="Edito">&#xE254;</i>
                    </button>
                </td>
                    <td class="text-right">
                    <a href="#deleteProductModal" class="btn delete" data-toggle="modal" id="{{$product->prod_id}}" data-pname={{$product->name}}>
                    <i class="material-icons" data-toggle="tooltip" title="Fshi">&#xE872;</i></a>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div> 
        <div>
            <script src="{{asset('js/sweetalert.min.js')}}"></script>
            @include('sweet::alert')
        </div>
		@endif
    </div>
    {{$products->links()}}
    
<!-- Popup Shtim HTML -->
<div id="addProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                    <form method="POST">
                        @CSRF
                    <div class="modal-header">
                        <h4 class="modal-title">Shto Produkt</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        @include('products.form')
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-success" id="ajaxSubmit">Shto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Popup  Editim HTML -->
<div id="editProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            <form id="editForm" method="POST" action="products">
            @method('PUT')
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" id="" aria-hidden="true" >&times;</button>
                    </div>
                    <div class="modal-body">
                        @include('products.form')
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-info" value="Edito">Edito</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@extends('inc.message')
<!-- Popup Fshirje -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" class="delete_form" action="products/">
                @method('DELETE')
				@CSRF
                <div class="modal-header">
                    
                    <h4 class="modal-title">Fshi Produkt</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   
                </div>
                <div class="modal-body">
                    <p>Je i sigurt që dëshiron t'i fshish këto të dhëna?</p>
                    <H1 type="form-control text" class="Produkti"></h1>
                    <p class="text-warning"><small>Ky veprim nuk mund të zhbëhet.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" class="btn btn-danger" id value="Fshi">Fshi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
