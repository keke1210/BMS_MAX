@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div>Krijo Porosi</div>
</h2>
@endsection
@section('content')

<div class="container">

    <div class="wrapper wrapper-content ng-scope" style="">
        
        <a href="/orders" class="btn btn-primary">Anulo order</a> <br><br>
        <form method="GET" action="/orders/create/{{$table[0]->id}}">
            @csrf
            @php
            $products = App\Product::all();
            $tables = App\Table::all();
            $nrProduktesh = count($products);
            
            @endphp
            <style>
            .produktet {
     list-style-type:none;
     margin:25px 0 0 0;
     padding:0;
}

.produktet li {
    float:left;
    margin:0 5px 0 0;
    height:40px;
    position:relative;
}

.produktet label, .produktet input {
    display:block;
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
}

.produktet input[type="radio"] {
    opacity:0.00;
    z-index:100;
}

.produktet input[type="radio"]:checked + label,
.Checked + label {
    background:#06b877;
    border-color:#06b877;
    border-radius: 3px;
}

.produktet label {
     padding:5px;
     cursor:pointer;
    z-index:90;
}
            </style>
        <div class="produktet">
            @include('inc.liste')
            @if($nrProduktesh>0)
            @php $count=1; @endphp
            {{-- Forma --}}
            @foreach($products as $key=>$product)
            @if ($count%3==1)
            <div class="col-sm-12 ">
                @endif
                <div class="form-group col-md-3 text-center">
                     <li class="btn btn-lg btn-block btn-huge"><input type="radio" id="{{$product->prod_id}}" name="products" value="{{$product->prod_id}}"/><label class="btn btn-danger btn-lg btn-block btn-huge" for="{{$product->prod_id}}">{{$product->name}}</label></li>
                    {{-- <input type="radio" id="product" name="products" value="{{$product->prod_id}}"> --}} 
                </div>
                @if($count%3==0)
            </div>
            @endif
            @php
            $count++;
            @endphp
            @endforeach

        </div>

            @foreach($tables as $i=>$table)
            <div><label>{{$tables[$i]->id}}</label><input type="radio" id="tables" name="tables" value="{{$tables[$i]->id}}">
            </div>
            @endforeach

            <br> <br>
            <div class="col-md-2"><label>Sasia:</label> <input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia" />
            </div>

            <button type="submit">Create Order</button>
            @php
            $existing = json_decode(Request::get('vlerat'));
            $current = [];
            if(Request::get('products') && Request::get('sasia') && Request::get('tables')) {
            $current = array(
            'prod_id'=>Request::get('products'),
            'sasia'=>Request::get('sasia'),
            'T_id'=>Request::get('tables')
            );
            }

            if(!empty($current)){
            $existing[] = $current;
            }


            @endphp
            <input type="hidden" name="vlerat" value="{{json_encode($existing)}}" />
        </form>

        {{--Fund Forma --}}

        @else
        <h1>No Products to make a order</h1>

        @endif
        </form>
    </div>



    {{-- Pjesa kryesore qe kalon ne store ben redirect diku tjeter --}}
    <form method="POST" action="/orders">
        @csrf
        @php
        $array= json_encode($_GET);
        @endphp

        <input type="hidden" name="vlerat" value="{{json_encode($existing)}}" />
        @if(empty($existing))
        <h1>Need to add at least one product</h1>
        <p> {{isset($_REQUEST['table']) ? $_REQUEST['table'] : "" }}</p>
        @else
        <button type="submit" id="butonPrije">Prije Faturen</button>

        @endif
    </form>
</div>
<script src="{{asset ('/js/quantitypicker.js')}}" defer></script>
@endsection

{{-- <div id="productQuantity" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" action="/users">
                @method('PUT')
                {{csrf_field()}}
                {{-- {{method_field('PUT')}} --}}
                {{-- <input type="hidden" name="_method" value="PUT" id="prod_id">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" id="" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    @include('orders.form')
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="OK">
                </div>
            </form>
        </div>
    </div>
</div> --}}
