@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')

<link rel="stylesheet" href="{{asset('/css/timetable.css')}}">
@endsection
@section('content')
@role('kamarier|admin')
<div class="wrapper wrapper-content ng-scope" style="">
    <div class="col-xs-12">
        <div class="tab_products global-box-contour-top-left global-no-b-bottom global-box-contour-top-right global-box-border-top global-box-border-right global-box-border-left"
            style="margin-top: 23px;">
            <div class="ibox float-e-margins">
                @if(count($tables)>0)
                <div class="ibox-content" id="tavolinadiv" style="border-radius:5px;">
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
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('.rezervoSubmit').click(function () {
                                        $link = $(this).prev();
                                        console.log($link);
                                        $tavolineNgjyre = $link.find(">:first-child");
                                        console.log($tavolineNgjyre);
                                        var tableid = $(this).data('tid');
                                        if($tavolineNgjyre.hasClass('t_green')){
                                          $link.removeAttr('href');
                                          $tavolineNgjyre.removeClass("t_green");
                                          $tavolineNgjyre.addClass("t_red");
                                        } 
                                        else if($tavolineNgjyre.hasClass('t_red')) {
                                          $link.attr('href','orders/create/'+tableid)
                                          $tavolineNgjyre.removeClass("t_red");
                                          $tavolineNgjyre.addClass("t_green");
                                        }
                                        
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr(
                                                    'content')
                                            }
                                        });
                                        $.ajax({
                                            url: "{{url('tables')}}/" + tableid,
                                            method: 'PUT',
                                            data: {
                                                'id': tableid
                                            },
                                            success: function (response) {
                                                console.log(response);
                                            },
                                        })
                                    });
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
                                        <button type="button" class="btn btn-success rezervoSubmit" data-tid="{{$table->id}}">Rezervo/Çrezervo
                                            {{$table->id}}</button>
                                    @else
                                    <a href="#">
                                        <p class="tavoline-img t_red"></p>
                                        <p class="tavoline-title">Tavoline {{$table->id}}</p>
                                    </a>
                                    <button type="button" class="btn btn-success rezervoSubmit" data-tid="{{$table->id}}">Rezervo/Çrezervo
                                        {{$table->id}}</button>
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

</div>
@endrole
@endsection
