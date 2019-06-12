@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
{{-- <h2>
    <div>Krijo Porosi</div>
</h2> --}}
@endsection
<link rel="stylesheet" href="{{asset('/css/fature-style.css')}}">
 @section('content')
{{--<div class="wrapper wrapper-content ng-scope" id="DivIdToPrint" style="">

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
                        <li class="btn btn-lg btn-block btn-huge"><input type="radio" id="{{$product->prod_id}}"
                                name="products" value="{{$product->prod_id}}" data-pem='{{$product->name}}' />
                            <label class="btn btn-danger btn-lg btn-block btn-huge"
                                for="{{$product->prod_id}}">{{$product->name}}</label>
                        </li>
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
                    <input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia" min="1" />
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
</div> --}}

{{-- 

@else
<h1>No Products to make a order</h1>
@endif
</form>
</div> --}}



{{-- <form method="POST" action="/orders">
    @csrf
    <input type="hidden" name="vlerat" value="{{json_encode($existing)}}" />
    @if(empty($existing))
    <h1>Need to add at least one product</h1>
    @else
    <button type="submit" id="butonPrije">Prije Faturen</button>
    @endif
</form>
</div> --}}

{{-- <link rel="stylesheet" href="{{ asset('css/inventory.css')}}"> --}}
<input hidden type="number" id="idtavoline" data-tbl="{{$tavolina->id}}">
@php
$products = App\Product::all();
@endphp
<div>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Krijo <b>Porosi</b></h2>
                </div>

            </div>
        </div>
        <div class="sellables-container">
            <div class="sellables">
                    <div class="categories">
                        
                        @php
                            $category = App\Category::all();
                        @endphp
                        {{-- @foreach($category as $key=>$category)
                            <a class="category" href="#" data-cat-id={{$category->category_id}}>{{$category->name}}</a>
                        @endforeach --}}

                        @foreach($category as $key=>$category)
                        <div class="form-group col-sm-3 text-center">
                            
                                <div class="category"  data-cat-id={{$category->category_id}}>
                                <a class="category" href="#" data-cat-id={{$category->category_id}}>
                                    <img class="category-img" src="{{$category->imgurl}}" c-id="1"></p>
                                    <div class="category-title">{{$category->name}}</div>
                                </a>
                               </div>
                        </div>
                           
                        @endforeach
                        
                    </div>

                <div class="item-group-wrapper">
                    <div class="item-group">
                        @foreach($products as $key=>$product)
                            <button data-id="{{$product->prod_id}}" data-emer="{{$product->name}}"  data-c-id="{{$product->category_id}}" data-cmimi="{{$product->cmimi}}" data-sasia="1" class="item dont-show">{{$product->name}} </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="register-wrapper">

                <div class="register">
                    <div class="products">
                        
                    </div>
                    <div class="pay-button">
                        
                        <span>Nen Total </span>  
                        <span><input id="subTotal" type="number" value="0" class="btn btn-block form-group" readonly></span>
    
                    </div>
                    <div class="pay-button">
                        <span>TVSH</span> 
                        <span><input id="tvsh" type="number" value="0" class="btn btn-block form-group" readonly></span>
    
                    </div>
                    <div class="pay-button">
                        <span>Total</span> 
                        <span><input id="sum" type="number" value="0" class="btn btn-block form-group" readonly></span>
    
                    </div>
                    <div class="pay-button">
                        <button type="button" class="btn btn-success btn-block btn-flat" id="payment"
                            style="height:67px;">Prij Fature</button>
                        <button type="button" class="btn btn-cancel btn-block btn-flat" id="reset"
                            style="height:67px;">Anullo</button>
                    </div>
            <style>
            a#test {
                color: red;
                
            }

            .material-icons {
                font-size: 20px!important;
            }

            .show
            {
                display: block;
            }

            .dont-show
            {
                display: none;
            }
            </style>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('css/inventory.css')}}">
        <link rel="stylesheet" href="{{ asset('css/pos-style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/liste-style.css')}}">
        <script type="text/javascript" src="{{asset('js/orders.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/ordersCreate.js')}}"></script>
        {{-- @extends('inc.pos') --}}
        <script type="text/javascript">
            jQuery(document).ready(function ($) {

            //Ben aktive kategorine e perzgjedhur
            $(".category").on('click',function(e){
                e.preventDefault();
                $(".category").each(function(){
                $(this).removeClass('active');
            });
            $catId=$(this).data("cat-id");
            $(".item").each(function(){
                if($(this).data("c-id")==$catId)
                {
                  $(this).addClass('show');
                }
                else{
                    $(this).removeClass('show');
                    $(this).addClass('dont-show');
                }
            });
                    $(this).addClass('active');
            });

            $(".clickable-row").click(function () {
                    window.location = $(this).data("href");
                });
            });

            if ($('input[type=radio][name=products]').not(':checked')) {
                $("#createOrder").prop("disabled", true);
            } else
            if ($('input[type=radio][name=products]').is(':checked')) {
                $("#createOrder").prop("disabled", false);
            }

            $(document).on('input', '#sasia', function () {
                if ($('input[type=radio][name=products]').is(':checked')) {
                    $("#createOrder").prop("disabled", false);
                }
            });

            $('input[type=radio][name=products]').change(function () {
                if ($(this).not(':checked')) {
                    if (!$("#sasia").val() == "") {
                        $("#createOrder").prop("disabled", false);
                    }
                } else
                if ($(this).is(':checked')) {
                    alert("false");
                    $("#createOrder").prop("disabled", true);
                }
            });
        </script>
        @endsection
