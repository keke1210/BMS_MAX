@extends('layouts.app')
@extends('layouts.dashboard')
@role('menaxher|admin')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Menaxher</div>
     </h2> 
@endsection
@section('content')
    {{--     <h1>Menaxher</h1>
    <a href="/products" class="btn btn-primary">
        Menaxho Produkte
    </a>

    <a href="/users" class="btn btn-primary">
        Menaxho Usera
    </a> --}}
    
            <div class="wrapper wrapper-content ng-scope" style="">
                    <div class="col-sm-12">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="panel panel-primary">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-xs-9">
                                        <div class="huge">
                                          35
                                        </div>
                                        <div>
                                          Menaxho Produkte
                                        </div>
                                      </div>
                                      <div class="col-xs-3 text-right">
                                        <i class="fa fa-cogs fa-5x"></i>
                                      </div>
                                    </div>
                                  </div><a href="/products">
                                  <div class="panel-footer">
                                    <span class="pull-left">Kliko Këtu</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                  </div></a>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="panel panel-yellow">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-xs-9">
                                        <div class="huge">
                                          30
                                        </div>
                                        <div>
                                          Menaxho Usera
                                        </div>
                                      </div>
                                      <div class="col-xs-3 text-right">
                                        <i class="fa fa-user fa-5x"></i>
                                      </div>
                                    </div>
                                  </div><a href="/users">
                                  <div class="panel-footer">
                                    <span class="pull-left">Kliko Këtu</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                  </div></a>
                                </div>
                              </div>
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
                              <div class="col-sm-6">
                                <div class="panel panel-red">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-xs-9">
                                        <div class="huge">
                                          20
                                        </div>
                                        <div>
                                          Menaxho Tavolina
                                        </div>
                                      </div>
                                      <div class="col-xs-3 text-right">
                                        <i class="fa fa-table fa-5x"></i>
                                      </div>
                                    </div>
                                  </div><a href="/tables">
                                  <div class="panel-footer">
                                    <span class="pull-left">Kliko Këtu</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                  </div></a>
                                </div>
                              </div>
                            </div>
                          </div>
            </div>
      
@endsection
@endrole
