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
            @php
            $count=1;
            @endphp
            @if($nrProduktesh>0)

            {{-- Forma --}}
            @foreach($products as $key=>$product)
            @if ($count%3==1)
            <div class="col-sm-12 ">
                @endif                          
                    <div><label>{{$product->name}}</label><input type="radio" id="product" name="products" value="{{$product->prod_id}}" required></label> </div>
               
                @if($count%3==0)
            </div>
            @endif
            @php
            $count++;
            @endphp
            
            @endforeach


            @foreach($tables as $i=>$table)
            <div><label>{{$tables[$i]->id}}</label><input type="radio" id="tables" name="tables" value="{{$tables[$i]->id}}"
                    required> </div>
            @endforeach

            <br> <br>
            <div><label>Sasia:</label> <input type="number" name="sasia" id="sasia" placeholder="Sasia" required />
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
