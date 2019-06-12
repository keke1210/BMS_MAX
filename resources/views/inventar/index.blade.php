@extends('layouts.app')
@extends('layouts.dashboard')
@role('menaxher|admin')
<link rel="stylesheet" href="{{ asset('css/inventory.css')}}">
@section('dash-title')
@endsection
@section('content')
<div class="wrapper wrapper-content ng-scope" style="">
        <div class="col-xs-12">
            <div class="tab_products global-box-contour-top-left global-no-b-bottom global-box-contour-top-right global-box-border-top global-box-border-right global-box-border-left"
                style="margin-top: 23px;">
                <div class="ibox float-e-margins">
                    <div class="ibox-content" id="categorydiv" style="border-radius:5px;">
                        <legend class="delete-barre-titre text-center">
                            <i class="box-titre" aria-hidden="true" style="color:#929291">
                            </i>
                            <b>
                                Kategori
                            </b>
                            <br>
                            <p style="font-size:13px;color:#F78145;">
                            </p>
                        </legend>
                        <div class="col-sm-12 ">
                                @php
                                $category = App\Category::all();
                            @endphp
                            @foreach($category as $key=>$category)
                            <div class="form-group col-sm-3 text-center">
                                
                                    <div class="category">
                                    <a href="/1" data-cat-id={{$category->category_id}}>
                                        <img class="category-img" src="{{$category->imgurl}}" c-id="1"></p>
                                        <div class="category-title">{{$category->name}}</div>
                                    </a>
                                   </div>
                            </div>
                               
                            @endforeach
                            
                                                  
                        </div>
                        <table class="table table-striped table-hover table-responsive">
                                <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@endrole
