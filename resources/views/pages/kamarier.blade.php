@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div class="m-l-lg">Kamarier</div>
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
                          @php $count=1; @endphp

                          @foreach ($tables as $table)
                          @if ($count%4==1)
                           <div class="col-sm-12 ">
                           @endif                    
                                <div class="form-group col-md-3 text-center" id="{{$table->id}}">
                                      @if ($table->rezervuar ==1)
                                        <a href="orders/create/{{$table->id}}">
                                            <p class="tavoline-img t_green"></p>
                                            <p class="tavoline-title">Tavoline {{$table->id}}</p>
                                        </a>
                                      
                                      @else
                                        <a href="orders/create/{{$table->id}}">
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
    <div class="row ibox-content no-padding">
            <div class="col-12">
              <div class="row day-columns">
                <div class="day-column">
                  <div class="day-header">Monday</div>
                  <div class="day-content">
                    <div class="event gray">
                        <span class="title">filan</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:00</span>
                        </footer>
                    </div>
                    
                    <div class="event blue">
                        <span class="title">filan</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                        </footer>
                    </div>
                  </div>
                  <div class="day-footer">4 Kamarier</div>
                </div>
                <div class="day-column">
                  <div class="day-header">Tuesday</div>
                  <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                          
                        </footer>
                    </div>
                    
                   
                  </div>
                  <div class="day-footer">2 Kamarier</div>
                </div>
                <div class="day-column">
                  <div class="day-header">Wednesday</div>
                  <div class="day-content">
                    
                    <div class="event blue">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                          
                        </footer>
                    </div>
                  </div>
                  <div class="day-footer">4 Kamarier</div>
                </div>
                <div class="day-column">
                  <div class="day-header">Thursday</div>
                  <div class="day-content">
                    <div class="event navy">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                          
                        </footer>
                    </div>
                 
                   
                  </div>
                  <div class="day-footer">5 Kamarier</div>
                </div>
                <div class="day-column">
                  <div class="day-header">Friday</div>
                  <div class="day-content">
                    <div class="event purple">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                          
                        </footer>
                    </div>
                 
                    <div class="event red">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                          
                        </footer>
                    </div>
                   
                  </div>
                  <div class="day-footer">2 Kamarier</div>
                </div>
                <div class="day-column">
                  <div class="day-header">Saturday</div>
                  <div class="day-content">
                    
                    <div class="event blue">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                          
                        </footer>
                    </div>
                  </div>
                  <div class="day-footer">1 Kamarier</div>
                </div>
                <div class="day-column">
                  <div class="day-header">Sunday</div>
                  <div class="day-content">
                    <div class="event gray">
                        <span class="title">Filan Fisteku</span>
                        <footer>
                          <span>Orari</span>
                          <span>20:30</span>
                          
                        </footer>
                    </div>
                   
                  </div>
                  <div class="day-footer">2 Kamarier</div>
                </div>
              </div>
            </div>
          </div>
</div>
@endrole
@endsection
