@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div>Krijo Porosi</div>
</h2>
@endsection
<link rel="stylesheet" href="{{asset('/css/fature-style.css')}}">
@section('content')
    <div class="wrapper wrapper-content ng-scope" id="DivIdToPrint" style="">
   
        
        <form method="GET" action="/orders/create/{{$tavolina->id}}">
            @csrf
            @php
                $products = App\Product::all();
                $nrProduktesh = count($products);
            @endphp
        <div>
            <div class="col-sm-6">
            @include('inc.liste')
            @if($nrProduktesh>0)
            @php $count=1; @endphp
            @foreach($products as $key=>$product)
                @if ($count%3==1)
            
            <div class="col-sm-12 produktet my_radio_box ">
                @endif
                <div class="col-md-4 text-center">
                     <li class="btn btn-lg btn-block btn-huge"><input type="radio" id="{{$product->prod_id}}" name="products" value="{{$product->prod_id}}" data-pem='{{$product->name}}'/>
                        <label class="btn btn-danger btn-lg btn-block btn-huge" for="{{$product->prod_id}}">{{$product->name}}</label>
                    </li>
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
            <br> <br>
          
                <div class="col-sm-6">
                        <div class="col-md-4 ">
                            <input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia" min="1"/>
                        </div>
                        <button class="btn btn-success" id="createOrder" type="submit">Krijo Porosi</button>
                        <a href="/orders" class="btn btn-primary">Anulo order</a> <br><br>
                </div>
            
            @php
            $existing = json_decode(Request::get('vlerat'));
            $current = [];
            
            if(Request::get('products') && Request::get('sasia') ) {
                $current = array(
                'prod_id'=>Request::get('products'),
                'sasia'=>Request::get('sasia'),
                'T_id'=> (string)$tavolina->id
                );
            }

            if(!empty($current)){
                $existing[] = $current;
            }
            @endphp
            
            <input type="hidden" name="vlerat" value="{{json_encode($existing)}}" />
        </form>
    </div>
    
        @else
            <h1>No Products to make a order</h1>
        @endif
        </form>
    </div>
   


    {{-- Pjesa kryesore qe kalon ne store ben redirect diku tjeter --}}
    <form method="POST" action="/orders">
        @csrf
        <input type="hidden" name="vlerat" value="{{json_encode($existing)}}" />
        @if(empty($existing))
        <h1>Need to add at least one product</h1>
        @else
       
        <button type="submit" id="butonPrije" >Prije Faturen</button>

        @endif
    </form>
</div>

<script type="text/javascript">

// {{--  function printoFature() 
//     {
//         var divToPrint=document.getElementById('DivIdToPrint');
//         var newWin=window.open('','Print-Window');
//         newWin.document.open();
//         newWin.document.write('<html><head><link rel="stylesheet" href="/css/fature-print.css"></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
//         newWin.document.close();
//     } --}}
if($('input[type=radio][name=products]').not(':checked')){
        // alert("true");
        $("#createOrder").prop("disabled", true);
    }
   else 
    if($('input[type=radio][name=products]').is(':checked'))
    {
        // alert("false");
        $("#createOrder").prop("disabled", false);
    
   }

$(document).on('input', '#sasia', function(){
    if($('input[type=radio][name=products]').is(':checked'))
    {
        $("#createOrder").prop("disabled", false);
    }
});

$('input[type=radio][name=products]').change(function() {
   if($(this).not(':checked')){
       if(!$("#sasia").val()==""){
        // alert("true");
        $("#createOrder").prop("disabled", false);
        }
    }
   else 
    if($(this).is(':checked'))
    {
        alert("false");
        $("#createOrder").prop("disabled", true);
    }
   
   
});
    </script>
@endsection

