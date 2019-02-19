@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div class="m-l-lg">Profile</div>
</h2>
@endsection
@section('content')
<div class="row ">
    <div class="" id="">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 animated fadeInUp anim-delay" id="realTimeContents"
                data-spy="scroll" data-target="#navbar" style="margin-top: 11px;">

                <div class="ibox espace-box opacity-box-param opb-active" id="section1">
                    <div class="ibox-content global-box-full">
                        <form method="post" enctype="multipart/form-data" accept-charset="utf-8" class="" action="#">
                            <div style="display:none;">
                                <input type="hidden" name="_method" value="PUT">
                            </div>
                            <input type="hidden" name="referer" id="referer" value="#">
                            <legend class="delete-barre-titre">
                                <i class="box-titre" aria-hidden="true" style="color:#929291">
                                </i>
                                <b>
                                    Personal Data
                                </b>
                                <br>
                                <p style="font-size:13px;color:#F78145;">
                                </p>
                            </legend>

                            <div class="form-group col-sm-12 col-md-12">
                                <label class="label-fat" for="company-logo">
                                    Profile Photo
                                </label>
                                <div class="ibox-content text-center " style="background-color:white">
                                    <div class="row">
                                        <label class="label-fat col-md-12">
                                            <img src="{{asset ('images/mini-logo.png')}}" width="100px" alt="">
                                        </label>
                                        <div class="text-center text-center col-md-12">
                                            <label for="society[logo]" class="btn btn-success fakebutton">
                                                <i class="fa fa-upload"></i> Import photo
                                                <input type="file" name="society[logo]" id="society[logo]">
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <div class="input text required">
                                    <label class="label-fat" for="first-name">
                                        First Name
                                    </label>
                                    <input type="text" name="first-name" class="form-control" required="required" id="first-name">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <div class="input text required">
                                    <label class="label-fat" for="last-name">
                                        Last Name
                                    </label>
                                    <input type="text" name="last-name" class="form-control" required="required" id="last-name">
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <div class="input text required">
                                    <label class="label-fat" for="NID">
                                        NID
                                    </label>
                                    <input type="text" name="NID" class="form-control" required="required" id="NID">
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <div class="input text required">
                                    <label class="label-fat" for="birthday">
                                        Birthday
                                    </label>
                                    <input type="date" name="birthday" class="form-control" required="required" id="birthday">
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <div class="input text required">
                                    <label>
                                        Gender
                                    </label>
                                    <select class="form-control">

                                        <option value="0" selected="selected">
                                            Male
                                        </option>
                                        <option value="1">
                                            Female
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <label class="label-fat col-md-12 nopadding-left " for="password">
                                    Password
                                </label>
                                <div class="form-group label-fat nopadding-left col-md-10">
                                    <input type="password" name="password" class="form-control" required="required" id="password">
                                </div>
                                <div class="form-group col-sm-1 col-md-2 text-right">
                                    <button class="btn btn-success btn-outline" data-toggle="modal" data-target="#modal-edit-password"
                                        data-original-title="Edit" title="Edit">
                                        <i class="ti-pencil"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="text-center">
                                <button class="line-form btn btn-success custom-button" type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-3 col-md-3" id="myScrollspy">
        <nav id="side-nav">
            <ul class="nav nav-list affix global-box-full" id="list-scroll" style="top:129px;overflow-y: auto;max-height: calc(100vh - 130px - 2rem);">
                <li id="section-1" class="active">
                    <a href="#section1">
                        <p class="menu-param-titre espace-menu"><b>Details</b></p>
                        <p class="menu-param-infos espace-menu">Emri, Mbiemri, Datelindja, Gjinia, Password</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Ndrysho Password -->
<div id="modal-edit-password" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/profile">
                @CSRF
                <div class="modal-header">
                    <h4 class="modal-title">Ndrysho Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                     <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" required="required" id="password">
                       </div>
                       <div class="form-group">
                           <label>Konfirmo Password</label>
                           <input type="password" name="password" class="form-control" required="required" id="password">
                       </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Ruaj">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
