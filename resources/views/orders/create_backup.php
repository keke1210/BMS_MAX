@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div>Krijo Porosi</div>
</h2>
@endsection
<link rel="stylesheet" href="{{asset('/css/fature-style.css')}}">
@section('content')

<div class=".new-body">
    <div>
        <h1>Demo Final</h1>
        <div class="wrapper rtl rtl-inv">


            <div class="content-wrapper" style="min-height: 739px;">
                <div class="col-lg-12 alerts" style="display: none;">
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> Success</h4>
                        Welcome to POS
                    </div>
                </div>
                <table style="width:100%;" class="layout-table">
                    <tbody>
                        <tr>
                            <td style="width: 460px;">
                                <div id="pos">
                                    <form action="https://spos.tecdiary.com/pos" id="pos-sale-form" method="post"
                                        accept-charset="utf-8">
                                        <input type="hidden" name="spos_token" value="9a1d6a683df3a4cc1b7ed4278e9c7950">
                                        <div class="well well-sm" id="leftdiv">
                                            <div id="printhead" class="print">
                                                <p>Dats: 4 Qershor June 2019</p>
                                            </div>
                                            <div id="print" class="fixed-table-container">
                                                <div class="slimScrollDiv"
                                                    style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                    <div id="list-table-div"
                                                        style="overflow: hidden; width: auto; height: 365px;">
                                                        <div class="fixed-table-header">
                                                            <table
                                                                class="table table-striped table-condensed table-hover list-table"
                                                                style="margin:0;">
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th>Produkti</th>
                                                                        <th style="width: 15%;text-align:center;">Cmimi
                                                                        </th>
                                                                        <th style="width: 15%;text-align:center;">Sasia
                                                                        </th>
                                                                        <th style="width: 20%;text-align:center;">
                                                                            Nentotali</th>
                                                                        <th style="width: 20px;" class="satu"><i
                                                                                class="fa fa-trash-o"></i></th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <table id="posTable"
                                                            class="table table-striped table-condensed table-hover list-table"
                                                            style="margin:0px;" data-height="100">
                                                            <thead>
                                                                <tr class="success">
                                                                    <th>Product</th>
                                                                    <th style="width: 15%;text-align:center;">Price</th>
                                                                    <th style="width: 15%;text-align:center;">Qty</th>
                                                                    <th style="width: 20%;text-align:center;">Subtotal
                                                                    </th>
                                                                    <th style="width: 20px;" class="satu"><i
                                                                            class="fa fa-trash-o"></i></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="1559592261141" class="2" data-item-id="2"
                                                                    data-id="2">
                                                                    <td><input name="product_id[]" type="hidden"
                                                                            class="rid" value="2"><input
                                                                            name="item_comment[]" type="hidden"
                                                                            class="ritem_comment" value=""><input
                                                                            name="product_code[]" type="hidden"
                                                                            value="TOY02"><input name="product_name[]"
                                                                            type="hidden" value="Coca Cola"><button
                                                                            type="button"
                                                                            class="btn bg-purple btn-block btn-xs edit"
                                                                            id="1559592261141" data-item="2"><span
                                                                                class="sname"
                                                                                id="name_1559592261141">Coca Cola
                                                                                </span></button></td>
                                                                    <td class="text-right"><input class="realuprice"
                                                                            name="real_unit_price[]" type="hidden"
                                                                            value="15.0000"><input class="rdiscount"
                                                                            name="product_discount[]" type="hidden"
                                                                            id="discount_1559592261141" value="0"><span
                                                                            class="text-right sprice"
                                                                            id="sprice_1559592261141">15.00</span></td>
                                                                    <td><input name="item_was_ordered[]" type="hidden"
                                                                            class="riwo" value="0"><input
                                                                            class="form-control input-qty kb-pad text-center rquantity"
                                                                            name="quantity[]" type="text" value="7"
                                                                            data-id="1559592261141" data-item="2"
                                                                            id="quantity_1559592261141"
                                                                            onclick="this.select();"></td>
                                                                    <td class="text-right"><span
                                                                            class="text-right ssubtotal"
                                                                            id="subtotal_1559592261141">105.00</span>
                                                                    </td>
                                                                    <td class="text-center"><i
                                                                            class="fa fa-trash-o tip pointer posdel"
                                                                            id="1559592261141" title="Remove"></i></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="slimScrollBar"
                                                        style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 350px;">
                                                    </div>
                                                    <div class="slimScrollRail"
                                                        style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                                <div id="totaldiv">
                                                    <table id="totaltbl" class="table table-condensed totals"
                                                        style="margin-bottom:10px;">
                                                        <tbody>
                                                            <tr class="info">
                                                                <td width="25%">Total Items</td>
                                                                <td class="text-right" style="padding-right:10px;"><span
                                                                        id="count">1 (7.00)</span></td>
                                                                <td width="25%">Total</td>
                                                                <td class="text-right" colspan="2"><span
                                                                        id="total">105.00</span></td>
                                                            </tr>
                                                            <tr class="info">
                                                                <td width="25%"><a href="#"
                                                                        id="add_discount">Discount</a></td>
                                                                <td class="text-right" style="padding-right:10px;"><span
                                                                        id="ds_con">(0.00) 0.00</span></td>
                                                                <td width="25%"><a href="#" id="add_tax">Order Tax</a>
                                                                </td>
                                                                <td class="text-right"><span id="ts_con">5.25</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="success">
                                                                <td colspan="2" style="font-weight:bold;">
                                                                    Total Payable <a role="button" data-toggle="modal"
                                                                        data-target="#noteModal">
                                                                        <i class="fa fa-comment"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="text-right" colspan="2"
                                                                    style="font-weight:bold;"><span
                                                                        id="total-payable">110.25</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="botbuttons" class="col-xs-12 text-center">
                                                <div class="row">
                                                    <div class="col-xs-4" style="padding: 0;">
                                                        <div class="btn-group-vertical btn-block">
                                                            <button type="button"
                                                                class="btn btn-warning btn-block btn-flat"
                                                                id="suspend">Hold</button>
                                                            <button type="button"
                                                                class="btn btn-danger btn-block btn-flat"
                                                                id="reset">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4" style="padding: 0 5px;">
                                                        <div class="btn-group-vertical btn-block">
                                                            <button type="button"
                                                                class="btn bg-purple btn-block btn-flat"
                                                                id="print_order">Print Order</button>
                                                            <button type="button" class="btn bg-navy btn-block btn-flat"
                                                                id="print_bill">Print Bill</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4" style="padding: 0;">
                                                        <button type="button" class="btn btn-success btn-block btn-flat"
                                                            id="payment" style="height:67px;">Payment</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <span id="hidesuspend"></span>
                                            <input type="hidden" name="spos_note" value="" id="spos_note">
                                            <div id="payment-con">
                                                <input type="hidden" name="amount" id="amount_val" value="">
                                                <input type="hidden" name="balance_amount" id="balance_val" value="">
                                                <input type="hidden" name="paid_by" id="paid_by_val" value="cash">
                                                <input type="hidden" name="cc_no" id="cc_no_val" value="">
                                                <input type="hidden" name="paying_gift_card_no"
                                                    id="paying_gift_card_no_val" value="">
                                                <input type="hidden" name="cc_holder" id="cc_holder_val" value="">
                                                <input type="hidden" name="cheque_no" id="cheque_no_val" value="">
                                                <input type="hidden" name="cc_month" id="cc_month_val" value="">
                                                <input type="hidden" name="cc_year" id="cc_year_val" value="">
                                                <input type="hidden" name="cc_type" id="cc_type_val" value="">
                                                <input type="hidden" name="cc_cvv2" id="cc_cvv2_val" value="">
                                                <input type="hidden" name="balance" id="balance_val" value="">
                                                <input type="hidden" name="payment_note" id="payment_note_val" value="">
                                            </div>
                                            <input type="hidden" name="customer" id="customer" value="1">
                                            <input type="hidden" name="order_tax" id="tax_val" value="5%">
                                            <input type="hidden" name="order_discount" id="discount_val" value="0">
                                            <input type="hidden" name="count" id="total_item" value="">
                                            <input type="hidden" name="did" id="is_delete" value="0">
                                            <input type="hidden" name="eid" id="is_delete" value="0">
                                            <input type="hidden" name="total_items" id="total_items" value="0">
                                            <input type="hidden" name="total_quantity" id="total_quantity" value="0">
                                            <input type="submit" id="submit" value="Submit Sale" style="display: none;">
                                        </div>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="contents" id="right-col" style="height: 719px;">
                                    <div id="item-list">
                                        <div class="slimScrollDiv"
                                            style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                            <div class="items" style="overflow: hidden; width: auto; height: 669px;">
                                                <div><button type="button" data-name="Minion Hi" id="product-0101"
                                                        value="TOY01" class="btn btn-both btn-flat product"><span
                                                            class="bg-img"><img
                                                                src="../../uploads/products/download.png"
                                                                alt="Minion Hi"
                                                                style="width: 100px; height: 100px;"></span><span><span>Minion
                                                                Hi</span></span></button></div>
                                            </div>
                                            <div class="slimScrollBar"
                                                style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 620px;">
                                            </div>
                                            <div class="slimScrollRail"
                                                style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-nav">

                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content ng-scope" id="DivIdToPrint" style="">
    <form method="GET" action="/orders/create/{{$tavolina->id}}">
        @csrf
        @php
        $products = App\Product::all();
        $nrProduktesh = count($products);
        @endphp
        <div>
            <div class="col-sm-6">
                @include('inc.liste')
                @if($nrProduktesh>0)
                @php $count=1; @endphp
                @foreach($products as $key=>$product)
                @if ($count%3==1)
                <div class="col-sm-12 produktet my_radio_box ">
                    @endif
                    <div class="col-md-4 text-center">
                        <li class="btn btn-lg btn-block btn-huge"><input type="radio" id="{{$product->prod_id}}"
                                name="products" value="{{$product->prod_id}}" data-pem='{{$product->name}}' />
                            <label class="btn btn-danger btn-lg btn-block btn-huge"
                                for="{{$product->prod_id}}">{{$product->name}}</label>
                        </li>
                    </div>
                    @if($count%3==0)
                </div>
                @endif
                @php
                $count++;
                @endphp
                @endforeach

            </div>
            <br> <br>
            <div class="col-sm-6">
                <div class="col-md-4 ">
                    <input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia" min="1" />
                </div>
                <button class="btn btn-success" id="createOrder" type="submit">Krijo Porosi</button>
                <a href="/orders" class="btn btn-primary">Anulo order</a> <br><br>
            </div>
            @php
            $existing = json_decode(Request::get('vlerat'));
            $current = [];

            if(Request::get('products') && Request::get('sasia') ) {
            $current = array(
            'prod_id'=>Request::get('products'),
            'sasia'=>Request::get('sasia'),
            'T_id'=> (string)$tavolina->id
            );
            }

            if(!empty($current)){
            $existing[] = $current;
            }
            @endphp

            <input type="hidden" name="vlerat" value="{{json_encode($existing)}}" />
    </form>
</div>
@else
<h1>No Products to make a order</h1>
@endif
</form>
</div>



<form method="POST" action="/orders">
    @csrf
    <input type="hidden" name="vlerat" value="{{json_encode($existing)}}" />
    @if(empty($existing))
    <h1>Need to add at least one product</h1>
    @else
    <button type="submit" id="butonPrije">Prije Faturen</button>
    @endif
</form>
</div>


<link rel="stylesheet" href="{{ asset('css/pos-style.css')}}">
<link rel="stylesheet" href="{{ asset('css/pos-mini-styles.css')}}">

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });


    if ($('input[type=radio][name=products]').not(':checked')) {
        $("#createOrder").prop("disabled", true);
    } else
    if ($('input[type=radio][name=products]').is(':checked')) {
        $("#createOrder").prop("disabled", false);
    }

    $(document).on('input', '#sasia', function () {
        if ($('input[type=radio][name=products]').is(':checked')) {
            $("#createOrder").prop("disabled", false);
        }
    });

    $('input[type=radio][name=products]').change(function () {
        if ($(this).not(':checked')) {
            if (!$("#sasia").val() == "") {
                $("#createOrder").prop("disabled", false);
            }
        } else
        if ($(this).is(':checked')) {
            alert("false");
            $("#createOrder").prop("disabled", true);
        }
    });
</script>
@endsection
