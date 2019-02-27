@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <link rel="stylesheet" href="{{asset('/css/fature-style.css')}}">
@endsection

@section('content')
       <div id="DivIdToPrint">
            <div class="invoice" >
                    
            <h4>Fatura ka {{$nrOrderave=count($orders)}} {{$nrOrderave==1?"artikull":"artikuj"}}</h4> <br>
                <header>
                  <section>
                    <h1>Faturë</h1>
                    <span>{{isset($orders[0]->created_at)?$orders[0]->created_at->format('d/m/Y H:i:s'):"no date"}}</span>
                  </section>
            
                  <section>
                    <span>{{$orders[0]->order_id}}</span>
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
                 
                  <section>
                    @if($nrOrderave>0) 
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
                 @endfor
                  </section>
                  @php 
                  $totali=array_sum($array);
                  $totali = number_format((float)$totali,2,'.','');
              @endphp
                  <section>
                    <span>Total</span>
                    <span>{{$totali}} lek</span>
                  </section>
                </main>
                <footer>Fatura u krijua ne: {{isset($orders[0]->created_at)?$orders[0]->created_at->format('d/m/Y H:i:s'):"no date"}}</footer>
                <footer>Fatura u krijua nga: {{empty($user->name)?"*admin* ne mungese":$user->name}}</footer>
                <footer>
                  <a></a>
                  <a onclick="printDiv();">Printo</a>
                </footer>
              </div>
            </div>
              <script type="text/javascript">

                function printDiv() 
                {
                    var divToPrint=document.getElementById('DivIdToPrint');
                    var newWin=window.open('','Print-Window');
                    newWin.document.open();
                    newWin.document.write('<html><head><link rel="stylesheet" href="/css/fature-print.css"></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
                    newWin.print();
                    newWin.document.close();
                    setTimeout(window.close, 0);
                    setTimeout(function(){newWin.close();},10);
                    location.href = "/kamarier";
                }
                </script>
              @endif

@endsection