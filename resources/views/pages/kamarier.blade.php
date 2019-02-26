@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div>Kamarier</div>
</h2>
<link rel="stylesheet" href="{{asset('/css/timetable.css')}}">
@endsection
@section('content')
@role('kamarier|admin')
<div class="wrapper wrapper-content ng-scope" style="">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-9">
                <div class="huge">
                  2500$
                </div>
                <div>
                  Menaxho Fatura
                </div>
              </div>
              <div class="col-xs-3 text-right">
                <i class="fa fa-dollar fa-5x"></i>
              </div>
            </div>
          </div><a href="/orders">
          <div class="panel-footer">
            <span class="pull-left">Kliko Këtu</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div></a>
        </div>
      </div>
     
    </div>
  </div>
    <div class="col-xs-12">
      
        <div class="tab_products global-box-contour-top-left global-no-b-bottom global-box-contour-top-right global-box-border-top global-box-border-right global-box-border-left"
            style="margin-top: 23px;">
            <div class="ibox float-e-margins">
                @if(count($tables)>0) 
                {{-- Numeron nese ka tavolina --}}
                <div class="ibox-content" style="border-radius:5px;">
                    <legend class="delete-barre-titre text-center">
                        <i class="box-titre" aria-hidden="true" style="color:#929291">
                        </i>
                        <b>
                        ZONA NUMËR 1
                        </b>
                        <br>
                        <p style="font-size:13px;color:#F78145;">
                        </p>
                     </legend>
                    <table class="table table-striped table-hover table-responsive">
                        <tbody>

                           {{-- Merr count nga 1 --}}
                          
                          @php $count=1; @endphp
                          <script type="text/javascript">
                            $(document).ready(function () {
                              $("#rezervoSubmit").click(function() {
                                 $link=$(this).prev();
                                 console.log($link);
                                 $tavolineNgjyre=$link.find(">:first-child");
                                 console.log($tavolineNgjyre);
                                 $tavolineNgjyre.removeClass( "t_green" );
                                 $tavolineNgjyre.addClass("t_red");
                                //  alert($(this).data('pid')); 
                                //  alert($link.val());
                                 // or alert($(this).attr('id'));
                              });
                              // $('#rezervoSubmit').click(function (e) {
                              //     e.preventDefault();
                              //     $.ajaxSetup({
                              //         headers: {
                              //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                              //         }
                              //     });
                              //     $.ajax({
                              //         url: "{{url('tables')}}",
                              //         method: 'POST',
                              //         data: {
                              //             id: $('#rezervoSubmit').attr('date-pid')
                              //         },
                              //         success: function (result) {
                              //             swal("Rezultati: " + result.success)

                              //         },
                                      
                              //     })
                              // });
                          });
                          </script>
                 
                          @foreach ($tables as $table)
                          @if ($count%4==1)
                           <div class="col-sm-12 ">
                           @endif                    
                                <div class="form-group col-md-3 text-center" id="{{$table->id}}">
                                    

                                      @if ($table->rezervuar == 0)
                                        <a href="orders/create/{{$table->id}}">

                                            <p class="tavoline-img t_green"></p>
                                            <p class="tavoline-title">Tavoline {{$table->id}}</p>
                                        </a>
                                      <form method="POST" action="tables/{{$table->id}}">
                                      @csrf
                                      @method('PUT')
                                      <input type="text" id="{{$table->id}}" name="{{$table->id}}" value="{{$table->id}}" required>
                                        <button type="submit" class="btn btn-success" id="rezervoSubmit" data-pid="{{$table->id}}" >Rezervo</button>
                                      </form> 
                                      @else
                                        <a href="#">
                                            <p class="tavoline-img t_red"></p>
                                             <p class="tavoline-title">Tavoline {{$table->id}}</p>
                                       </a>
                                       @endif
                                      </div>
                            @if($count%4==0)
                            </div>
                            @endif      
                            @php
                            $count++;
                            @endphp 
                        @endforeach  
                                 
                    </tbody>
                </table>
              </div>
              @endif
            </div>
        </div>
    </div>
    <br><br>
    <aside>Ktu sheh orarin e vet</aside>
  
</div>
@endrole
@endsection
