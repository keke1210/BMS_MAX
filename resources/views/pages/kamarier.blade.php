@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div class="m-l-lg">Kamarier</div>
</h2>
@endsection
@section('content')
@role('kamarier|admin')
</div>
<div class="wrapper wrapper-content ng-scope" style="">
    <a href="/orders" class="btn btn-primary">
        Shiko Fatura
    </a>
    <a href="/orders/create" class="btn btn-primary">
        Krijo Porosi
    </a>
    <div class="col-xs-12">
        <div class="tab_products global-box-contour-top-left global-no-b-bottom global-box-contour-top-right global-box-border-top global-box-border-right global-box-border-left"
            style="margin-top: 23px;">
            <div class="ibox float-e-margins">
                <div class="ibox-content no-padding" style="border-radius:5px;">
                    <table class="table table-striped table-hover table-responsive">
                        <tbody>
                            <tr>
                                <div class="col-sm-12 ">
                                    <div class="form-group col-md-3 text-center">
                                        <a href="orders/create">
                                            <p class="tavoline-img t_green" style="width:80px; height:80px;"> </p>
                                        </a>
                                    </div>
                                    <div class="form-group col-md-3 text-center">
                                            <a href="/orders/5">
                                                <p class="tavoline-img t_red" style="width:80px; height:80px;"> </p>
                                            </a>
                                        </div>
                                    <div class="form-group col-md-3 text-center">
                                        <img class="tavoline-img" src="/images/table_red.png">
                                    </div>
                                    <div class="form-group col-md-3 text-center">
                                        <img class="tavoline-img" src="/images/table_red.png">
                                    </div>
                                </div>
                </div>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <aside>Ktu sheh orarin e vet</aside>
</div>
@endrole
@endsection
