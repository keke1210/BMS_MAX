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
    <div class="col-xs-12 col-md-6">
        <a href="/orders" class="btn btn-primary">Anulo order</a> <br><br>
        <form method="GET" action="/orders/create/{{$tavolina->id}}">
            @csrf
            @php
                $products = App\Product::all();
                $nrProduktesh = count($products);
            @endphp
        <div>
            @include('inc.liste')
            @if($nrProduktesh>0)
            @php $count=1; @endphp
            @foreach($products as $key=>$product)
                @if ($count%2==1)
            
            <div class="col-sm-12 produktet my_radio_box">
                @endif
                <div class="form-group col-md-6 text-center">
                     <li class="btn btn-lg btn-block btn-huge"><input type="radio" id="{{$product->prod_id}}" name="products" value="{{$product->prod_id}}" data-pem='{{$product->name}}'/><label class="btn btn-danger btn-lg btn-block btn-huge" for="{{$product->prod_id}}">{{$product->name}}</label></li>
                    {{-- <input type="radio" id="product" name="products" value="{{$product->prod_id}}"> --}} 
                </div>
                @if($count%2==0)
            </div>
            @endif
        
            @php
                $count++;
            @endphp
            @endforeach

        </div>
            <br> <br>
            <div class="col-md-4"><input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia" />
            </div>

            <button class="btn btn-success" type="submit">Krijo Porosi</button>
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
    <div class="col-xs-12 col-md-6">
        <div id="DivIdToPrint">
            <div class="invoice" >
                    
            <h4>Fatura ka </h4> <br>
                <header>
                  <section>
                    <h1>Faturë</h1>
                    <span></span>
                  </section>
            
                  <section>
                    <span></span>
                  </section>
                </header>
            
                <main>
                  <section>
                    <span>Nr</span>
                    <span>Proukti</span>
                    <span>Cmimi </span>
                    <span>Sasia</span>
                    <span>TVSH</span>
                    <span>Nentotal</span>
                  </section>
                 
                  <section>
                        @php 
                        // $tvsh=17;
                        // $cmimi=$orders[$i]->product->cmimi; 
                        // $sasia=$orders[$i]->sasia;
                        // $cmimiTvsh= $cmimi+(($cmimi*$tvsh)/100);
                        // $cmimi_TVSH=number_format((float)$cmimiTvsh,2,'.','');
                        // $shuma=number_format((float)($sasia * $cmimiTvsh), 2,'.','');
                    @endphp
                    <figure>
                      {{-- <span>{{$i + 1}}</span>
                      <span><strong>{{$orders[$i]->product->name}}</strong></span>
                      <span>{{$cmimi}} Lek</span>
                      <span>{{$cmimi_TVSH}} Lek</span>
                      <span>{{$sasia}}</span>
                      <span>{{$tvsh}}%</span>
                      <span>{{$shuma}} Lek</span> --}}
                    </figure>
            
                    @php
                    // $array[$i]= $shuma;
                     @endphp
                  </section>
                  @php 
                //   $totali=array_sum($array);
                //   $totali = number_format((float)$totali,2,'.','');
              @endphp
                  <section>
                    <span>Total</span>
                    {{-- <span>{{$totali}} lek</span> --}}
                  </section>
                </main>
                <footer></footer>
                <footer></footer>
               
              </div>
            </div>
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
       
        <button type="submit" id="butonPrije" onclick="printoFature();">Prije Faturen</button>

        @endif
    </form>
</div>
{{-- 
<script type="text/javascript">

    function printoFature() 
    {
        var divToPrint=document.getElementById('DivIdToPrint');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><head><link rel="stylesheet" href="/css/fature-print.css"></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
    }
    </script> --}}
@endsection

