@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Porosi</div>
     </h2> 
@endsection
@section('content')
    <h1>Order Details</h1>
        <div class="jumbotron" id='DivIdToPrint'>
            <h4>Fatura ka {{$nrOrderave=count($orders)}} artikuj</h4> <br>
            <table class="table table-striped">
                <tr>
                    <th>Detaji</th>
                    <th>Emër Produkti</th>
                    <th>Cmimi pa tvsh</th>
                    <th>Cmimi + tvsh</th>
                    <th>Sasia</th>
                    <th>TVSH</th>
                    <th>Nën Total</th>
                </tr>

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
                    
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$orders[$i]->product->name}}</td>
                    <td>{{$cmimi}} Lek</td>
                    <td>{{$cmimi_TVSH}} Lek</td>
                    <td>{{$sasia}}</td>
                    <td>{{$tvsh}}%</td>
                    <td>{{$shuma}} Lek</td>
                </tr>

                @php
                    $array[$i]= $shuma;
                @endphp
            @endfor
            </table>
            <br>
            @php 
                $totali=array_sum($array);
                $totali = number_format((float)$totali,2,'.','');
            @endphp
            <br>
            <h3>Totali eshte: {{$totali}} Lek</h3>
            <br> <br>
            <footer>Fatura u krijua ne: {{$orders[0]->updated_at->format('d/m/Y H:i:s')}}</footer>
            
            {{-- @php $user = App\Order::find(4)->user->name; @endphp --}}
            
            <footer>Fatura u krijua nga: {{empty($user->name)?$useradmin:$user->name}}</footer>
        </div>
            

            <input type='button' id='btn' value='Print' onclick='printDiv();'>
            <script type="text/javascript">

            function printDiv() 
            {
                var divToPrint=document.getElementById('DivIdToPrint');
                var newWin=window.open('','Print-Window');
                newWin.document.open();
                newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
                newWin.document.close();
                setTimeout(function(){newWin.close();},10);
            }
            </script>

            @endif
@endsection