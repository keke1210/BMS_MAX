@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div>Krijo Porosi</div>
</h2>
@endsection
<link rel="stylesheet" href="{{asset('/css/fature-style.css')}}">
@section('content')



    <div class="wrapper wrapper-content ng-scope" style="">
    <div class="col-xs-12 col-md-6">
        <a href="/orders" class="btn btn-primary">Anulo order</a> <br><br>
        <form method="GET" action="/orders/create/{{$table[0]->id}}">
            @csrf
            @php
            $products = App\Product::all();
            $tables = App\Table::all();
            $nrProduktesh = count($products);
            
            @endphp
    
        <div>
            @include('inc.liste')
            @if($nrProduktesh>0)
            @php $count=1; @endphp
            {{-- Forma --}}
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

            @foreach($tables as $i=>$table)
            <div><label>{{$tables[$i]->id}}</label><input type="radio" id="tables" name="tables" value="{{$tables[$i]->id}}">
            </div>
            @endforeach

            <br> <br>
            <div class="col-md-4"><input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia" />
            </div>

            <button class="btn btn-success" type="submit">Krijo Porosi</button>
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
    </div>
   
       <div class="col-xs-12 col-md-6">
        {{--Fund Forma --}}
        <div id="DivIdToPrint">
                <div class="invoice" >
                        
                {{-- <h4>Fatura ka {{$nrOrderave=count($orders)}} {{$nrOrderave==1?"artikull":"artikuj"}}</h4> <br> --}}
                <h4>Fatura ka </h4> <br>
                    <header>
                      <section>
                        <h1>Faturë</h1>
                        {{-- <span>{{isset($orders[0]->created_at)?$orders[0]->created_at->format('d/m/Y H:i:s'):"no date"}}</span> --}}
                        <span>Data</span>
                      </section>
                
                      <section>
                        {{-- <span>{{$orders[0]->order_id}}</span> --}}
                        <span>Order</span>
                      </section>
                    </header>
                
                    <main>
                      <section>
                        <span>Nr</span>
                        <span>Proukti</span>
                        <span>Cmimi pa TVSH</span>
                        <span>Cmimi me TVSH</span>
                        <span>Sasia</span>
                        <span>TVSH</span>
                        <span>Nentotal</span>
                      </section>
                     
                      <section class="afisho_produkte">
                         {{-- @if($nrOrderave>0) 
                        @for ($i = 0; $i < $nrOrderave; $i++)
                            @php 
                            $tvsh=17;
                            $cmimi=$orders[$i]->product->cmimi; 
                            $sasia=$orders[$i]->sasia;
                            $cmimiTvsh= $cmimi+(($cmimi*$tvsh)/100);
                            $cmimi_TVSH=number_format((float)$cmimiTvsh,2,'.','');
                            $shuma=number_format((float)($sasia * $cmimiTvsh), 2,'.','');
                        @endphp
                        <figure>
                          <span>{{$i + 1}}</span>
                          <span><strong>{{$orders[$i]->product->name}}</strong></span>
                          <span>{{$cmimi}} Lek</span>
                          <span>{{$cmimi_TVSH}} Lek</span>
                          <span>{{$sasia}}</span>
                          <span>{{$tvsh}}%</span>
                          <span>{{$shuma}} Lek</span>
                        </figure>
                
                        @php
                        $array[$i]= $shuma;
                         @endphp
                     @endfor  --}}
                      </section>
                      @php 
                    //   $totali=array_sum($existing);
                    //   $totali = number_format((float)$totali,2,'.','');
                  @endphp
                      <section>
                        <span>Total</span>
                        <span>lek</span>
                        {{-- <span>{{$totali}} lek</span> --}}
                      </section>
                    </main>
                    <footer>Fatura u krijua ne: </footer>
                    {{-- <footer>Fatura u krijua ne: {{isset($orders[0]->created_at)?$orders[0]->created_at->format('d/m/Y H:i:s'):"no date"}}</footer> --}}
                    <footer>Fatura u krijua nga: </footer>
                    {{-- <footer>Fatura u krijua nga: {{empty($user->name)?"*admin* ne mungese":$user->name}}</footer> --}}
                    <footer>
                      <a></a>
                      <a onclick="printDiv();">Printo</a>
                    </footer>
                  </div>
                </div>
            </div>
            <script type="text/javascript">

                function printDiv() 
                {
                    var divToPrint=document.getElementById('DivIdToPrint');
                    var newWin=window.open('','Print-Window');
                    newWin.document.open();
                    newWin.document.write('<html><head><link rel="stylesheet" href="/css/fature-print.css"></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
                    newWin.document.close();
                   
                }
                </script>
        <script>
           var count =0;
                 $('#sasia').on("input", function() {
                     var sasia = this.value;
                        
                        if($('input[name=products]').is(':checked')) {
                           
                            if($('figure .emri').text().indexOf("Text")!=-1)
                             {
                                 alert ($('figure .emri').text().indexOf("Text"));
                            }
                            else
                            {
                            var produkti_id=$('input[name=products]:checked').val();
                            var produkti_em=$('input[name=products]:checked').data('pem');
                            count++;
                            $('.afisho_produkte').append('<figure> <span>'+ count +'</span> <span><strong class="emri">'+ produkti_em +'</strong></span> <span>Lek</span> <span>Lek</span> <span>'+ sasia + '</span> <span>%</span> <span> Lek</span> </figure>')
                         }
                      }
                          console.log(sasia);
                        console.log(produkti);
               
              });
              $('.my_radio_box').change(function(){
                  alert($('input[name=products]:checked').val());
            
        });
              </script>
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
<
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
