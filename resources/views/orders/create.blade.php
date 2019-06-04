@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div>Krijo Porosi</div>
</h2>
@endsection
<link rel="stylesheet" href="{{asset('/css/fature-style.css')}}">
@section('content')
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

<div>
    <h1>Test</h1>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Krijo <b>Porosi</b></h2>
                </div>

            </div>
        </div>
        <div class="sellables-container">
            <div class="sellables">
                    <div class="categories">
                            <a class="category active" href="#">Alcohol</a>
                            <a class="category" href="#">Attractions</a>
                            <a class="category" href="#">Burgers</a>
                            <a class="category" href="#">Drinks</a>
                            <a class="category" href="#">Food</a>
                            <a class="category" href="#">Pizza</a>
                            <a class="category" href="#">Rentals</a>
                            <a class="category" href="#">Salads</a>
                            <a class="category" href="#">Treats</a>
                          </div>
                <div class="item-group-wrapper">
                    <div class="item-group">
                        @foreach($products as $key=>$product)
                        <a href="#" class="item">{{$product->name}} </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="register-wrapper">

                <div class="register">
                    <div class="products">
                        <div class="product-bar">
                            <span>Coca-Cola</span>
                            <span>150 Leke</span>
                            <span><input type="number" value="2"></span>
                            <a href="#deleteProductModal" class="btn delete" data-toggle="modal" id="test">
                                <i class="material-icons" data-toggle="tooltip" title="Fshi">&#xE872;</i></a>
                        </div>

                        <div class="product-bar">
                            <span>Fanta</span>
                            <span>150 Leke</span>
                            <span><input type="number" value="2"></span>
                            <a href="#deleteProductModal" class="btn delete" data-toggle="modal" id="test">
                                <i class="material-icons" data-toggle="tooltip" title="Fshi">&#xE872;</i></a>
                        </div>
                    </div>

                    <div class="pay-button">
                        <button type="button" class="btn btn-success btn-block btn-flat" id="payment"
                            style="height:67px;">Prij Fature</button>
                        <button type="button" class="btn btn-cancel btn-block btn-flat" id="reset"
                            style="height:67px;">Anullo</button>
                    </div>
<style>
a#test {
    color: red;
    
}

.material-icons {
    font-size: 20px!important;
}
</style>
                </div>
            </div>
        </div>

        <div>
            <h1> Final </h1>
            <title>POS | SimplePOS</title>

            </head>

            <body class="skin-green sidebar-collapse sidebar-mini pos">
                <div class="wrapper rtl rtl-inv">
                    <div class="content-wrapper" style="min-height: 690px;">
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
                                            <form action="https://spos.tecdiary.com/pos" id="pos-sale-form"
                                                method="post" accept-charset="utf-8">
                                                <input type="hidden" name="spos_token"
                                                    value="9a1d6a683df3a4cc1b7ed4278e9c7950">
                                                <div class="well well-sm" id="leftdiv">
                                                    <div id="lefttop" style="margin-bottom:5px;">
                                                        <div class="form-group" style="margin-bottom:5px;">
                                                            <div class="input-group">
                                                                <select name="customer_id" id="spos_customer"
                                                                    data-placeholder="Select Customer"
                                                                    required="required"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    style="width:100%;position:absolute;" tabindex="-1"
                                                                    aria-hidden="true">
                                                                    <option value="1" selected="selected">Walk-in Client
                                                                    </option>
                                                                </select><span
                                                                    class="select2 select2-container select2-container--default select2-container--below"
                                                                    dir="ltr" style="width: 100%;"><span
                                                                        class="selection"><span
                                                                            class="select2-selection select2-selection--single"
                                                                            role="combobox" aria-autocomplete="list"
                                                                            aria-haspopup="true" aria-expanded="false"
                                                                            tabindex="0"
                                                                            aria-labelledby="select2-spos_customer-container"><span
                                                                                class="select2-selection__rendered"
                                                                                id="select2-spos_customer-container"
                                                                                title="Walk-in Client">Walk-in
                                                                                Client</span><span
                                                                                class="select2-selection__arrow"
                                                                                role="presentation"><b
                                                                                    role="presentation"></b></span></span></span><span
                                                                        class="dropdown-wrapper"
                                                                        aria-hidden="true"></span></span>
                                                                <div class="input-group-addon no-print"
                                                                    style="padding: 2px 5px;">
                                                                    <a href="https://spos.tecdiary.com/pos#"
                                                                        id="add-customer" class="external"
                                                                        data-toggle="modal" data-target="#myModal"><i
                                                                            class="fa fa-2x fa-plus-circle"
                                                                            id="addIcon"></i></a>
                                                                </div>
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom:5px;">
                                                            <input type="text" name="hold_ref" value="" id="hold_ref"
                                                                class="form-control kb-text"
                                                                placeholder="Reference Note">
                                                        </div>
                                                        <div class="form-group" style="margin-bottom:5px;">
                                                            <input type="text" name="code" id="add_item"
                                                                class="form-control ui-autocomplete-input"
                                                                placeholder="Search product by code or name, you can scan barcode too"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="printhead" class="print">
                                                        <p>Date: 4th June 2019</p>
                                                    </div>
                                                    <div id="print" class="fixed-table-container">
                                                        <div class="slimScrollDiv"
                                                            style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                            <div id="list-table-div"
                                                                style="overflow: hidden; width: auto; height: 350px;">
                                                                <div class="fixed-table-header">
                                                                    <table
                                                                        class="table table-striped table-condensed table-hover list-table"
                                                                        style="margin:0;">
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>Product</th>
                                                                                <th
                                                                                    style="width: 15%;text-align:center;">
                                                                                    Price</th>
                                                                                <th
                                                                                    style="width: 15%;text-align:center;">
                                                                                    Qty</th>
                                                                                <th
                                                                                    style="width: 20%;text-align:center;">
                                                                                    Subtotal</th>
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
                                                                            <th style="width: 15%;text-align:center;">
                                                                                Price</th>
                                                                            <th style="width: 15%;text-align:center;">
                                                                                Qty</th>
                                                                            <th style="width: 20%;text-align:center;">
                                                                                Subtotal</th>
                                                                            <th style="width: 20px;" class="satu"><i
                                                                                    class="fa fa-trash-o"></i></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr id="1559592261141" class="2"
                                                                            data-item-id="2" data-id="2">
                                                                            <td><input name="product_id[]" type="hidden"
                                                                                    class="rid" value="2"><input
                                                                                    name="item_comment[]" type="hidden"
                                                                                    class="ritem_comment"
                                                                                    value=""><input
                                                                                    name="product_code[]" type="hidden"
                                                                                    value="TOY02"><input
                                                                                    name="product_name[]" type="hidden"
                                                                                    value="Minion Banana"><button
                                                                                    type="button"
                                                                                    class="btn bg-purple btn-block btn-xs edit"
                                                                                    id="1559592261141"
                                                                                    data-item="2"><span class="sname"
                                                                                        id="name_1559592261141">Minion
                                                                                        Banana (TOY02)</span></button>
                                                                            </td>
                                                                            <td class="text-right"><input
                                                                                    class="realuprice"
                                                                                    name="real_unit_price[]"
                                                                                    type="hidden" value="15.0000"><input
                                                                                    class="rdiscount"
                                                                                    name="product_discount[]"
                                                                                    type="hidden"
                                                                                    id="discount_1559592261141"
                                                                                    value="0"><span
                                                                                    class="text-right sprice"
                                                                                    id="sprice_1559592261141">15.00</span>
                                                                            </td>
                                                                            <td><input name="item_was_ordered[]"
                                                                                    type="hidden" class="riwo"
                                                                                    value="0"><input
                                                                                    class="form-control input-qty kb-pad text-center rquantity"
                                                                                    name="quantity[]" type="text"
                                                                                    value="7" data-id="1559592261141"
                                                                                    data-item="2"
                                                                                    id="quantity_1559592261141"
                                                                                    onclick="this.select();"></td>
                                                                            <td class="text-right"><span
                                                                                    class="text-right ssubtotal"
                                                                                    id="subtotal_1559592261141">105.00</span>
                                                                            </td>
                                                                            <td class="text-center"><i
                                                                                    class="fa fa-trash-o tip pointer posdel"
                                                                                    id="1559592261141"
                                                                                    title="Remove"></i></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="slimScrollBar"
                                                                style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 399px;">
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
                                                                        <td class="text-right"
                                                                            style="padding-right:10px;"><span
                                                                                id="count">1 (7.00)</span></td>
                                                                        <td width="25%">Total</td>
                                                                        <td class="text-right" colspan="2"><span
                                                                                id="total">105.00</span></td>
                                                                    </tr>
                                                                    <tr class="info">
                                                                        <td width="25%"><a
                                                                                href="https://spos.tecdiary.com/pos#"
                                                                                id="add_discount">Discount</a></td>
                                                                        <td class="text-right"
                                                                            style="padding-right:10px;"><span
                                                                                id="ds_con">(0.00) 0.00</span></td>
                                                                        <td width="25%"><a
                                                                                href="https://spos.tecdiary.com/pos#"
                                                                                id="add_tax">Order Tax</a></td>
                                                                        <td class="text-right"><span
                                                                                id="ts_con">5.25</span></td>
                                                                    </tr>
                                                                    <tr class="success">
                                                                        <td colspan="2" style="font-weight:bold;">
                                                                            Total Payable <a role="button"
                                                                                data-toggle="modal"
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
                                                                    <button type="button"
                                                                        class="btn bg-navy btn-block btn-flat"
                                                                        id="print_bill">Print Bill</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4" style="padding: 0;">
                                                                <button type="button"
                                                                    class="btn btn-success btn-block btn-flat"
                                                                    id="payment" style="height:67px;">Payment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <span id="hidesuspend"></span>
                                                    <input type="hidden" name="spos_note" value="" id="spos_note">
                                                    <div id="payment-con">
                                                        <input type="hidden" name="amount" id="amount_val" value="">
                                                        <input type="hidden" name="balance_amount" id="balance_val"
                                                            value="">
                                                        <input type="hidden" name="paid_by" id="paid_by_val"
                                                            value="cash">
                                                        <input type="hidden" name="cc_no" id="cc_no_val" value="">
                                                        <input type="hidden" name="paying_gift_card_no"
                                                            id="paying_gift_card_no_val" value="">
                                                        <input type="hidden" name="cc_holder" id="cc_holder_val"
                                                            value="">
                                                        <input type="hidden" name="cheque_no" id="cheque_no_val"
                                                            value="">
                                                        <input type="hidden" name="cc_month" id="cc_month_val" value="">
                                                        <input type="hidden" name="cc_year" id="cc_year_val" value="">
                                                        <input type="hidden" name="cc_type" id="cc_type_val" value="">
                                                        <input type="hidden" name="cc_cvv2" id="cc_cvv2_val" value="">
                                                        <input type="hidden" name="balance" id="balance_val" value="">
                                                        <input type="hidden" name="payment_note" id="payment_note_val"
                                                            value="">
                                                    </div>
                                                    <input type="hidden" name="customer" id="customer" value="1">
                                                    <input type="hidden" name="order_tax" id="tax_val" value="5%">
                                                    <input type="hidden" name="order_discount" id="discount_val"
                                                        value="0">
                                                    <input type="hidden" name="count" id="total_item" value="">
                                                    <input type="hidden" name="did" id="is_delete" value="0">
                                                    <input type="hidden" name="eid" id="is_delete" value="0">
                                                    <input type="hidden" name="total_items" id="total_items" value="0">
                                                    <input type="hidden" name="total_quantity" id="total_quantity"
                                                        value="0">
                                                    <input type="submit" id="submit" value="Submit Sale"
                                                        style="display: none;">
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contents" id="right-col" style="height: 670px;">
                                            <div id="item-list">
                                                <div class="slimScrollDiv"
                                                    style="position: relative; overflow: hidden; width: auto; height: 250px;">
                                                    <div class="items"
                                                        style="overflow: hidden; width: auto; height: 620px;">
                                                        <div><button type="button" data-name="Minion Hi"
                                                                id="product-0101" value="TOY01"
                                                                class="btn btn-both btn-flat product"><span
                                                                    class="bg-img"><img
                                                                        src="./POS _ SimplePOS_files/6988655f95602f9394f9315165f920fe.png"
                                                                        alt="Minion Hi"
                                                                        style="width: 100px; height: 100px;"></span><span><span>Minion
                                                                        Hi</span></span></button><button type="button"
                                                                data-name="Minion Banana" id="product-0102"
                                                                value="TOY02"
                                                                class="btn btn-both btn-flat product"><span
                                                                    class="bg-img"><img
                                                                        src="./POS _ SimplePOS_files/213c9e007090ca3fc93889817ada3115.png"
                                                                        alt="Minion Banana"
                                                                        style="width: 100px; height: 100px;"></span><span><span>Minion
                                                                        Banana</span></span></button></div>
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
                                                <div class="btn-group btn-group-justified">
                                                    <div class="btn-group">
                                                        <button style="z-index:10002;"
                                                            class="btn btn-warning pos-tip btn-flat" type="button"
                                                            id="previous" disabled="disabled"><i
                                                                class="fa fa-chevron-left"></i></button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button style="z-index:10003;"
                                                            class="btn btn-success pos-tip btn-flat" type="button"
                                                            id="sellGiftCard"><i class="fa fa-credit-card"
                                                                id="addIcon"></i> Sell Gift Card</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button style="z-index:10004;"
                                                            class="btn btn-warning pos-tip btn-flat" type="button"
                                                            id="next" disabled="disabled"><i
                                                                class="fa fa-chevron-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>              
                <div class="control-sidebar-bg sb" style="position: fixed; height: auto;"></div>
                <div id="order_tbl" style="display:none;"><span id="order_span">
                        <style>
                            .bb td,
                            .bb th {
                                border-bottom: 1px solid #DDD;
                            }
                        </style><span style="text-align:center;">
                            <h3>SimplePOS</h3>
                            <h4>Order</h4>
                        </span>
                        <h5>C: Walk-in Client</h5>
                        <h5>R: </h5>
                        <h5>U: admin</h5>
                        <h5>T: 3rd June 2019 10:04 PM</h5>
                    </span>
                    <table id="order-table" class="prT table table-striped table-condensed"
                        style="width:100%;margin-bottom:0;">
                        <tbody>
                            <tr class="bb row_2" data-item-id="2">
                                <td>#1 Minion Banana (TOY02)</td>
                                <td>[ 7 ]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="bill_tbl" style="display:none;"><span id="bill_span">
                        <style>
                            .bb td,
                            .bb th {
                                border-bottom: 1px solid #DDD;
                            }
                        </style><span style="text-align:center;">
                            <h3>SimplePOS</h3>
                            <h4>Bill</h4>
                        </span>
                        <h5>C: Walk-in Client</h5>
                        <h5>R: </h5>
                        <h5>U: admin</h5>
                        <h5>T: 3rd June 2019 10:04 PM</h5>
                    </span>
                    <table id="bill-table" width="100%" class="prT table table-striped table-condensed"
                        style="width:100%;margin-bottom:0;">
                        <tbody>
                            <tr class="row_2" data-item-id="2">
                                <td colspan="2">#1 Minion Banana (TOY02)</td>
                            </tr>
                            <tr class="bb row_2" data-item-id="2">
                                <td>(7 x 15.00)</td>
                                <td style="text-align:right;">105.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="bill-total-table" width="100%" class="prT table table-striped table-condensed"
                        style="width:100%;margin-bottom:0;">
                        <tbody>
                            <tr class="bb">
                                <td>Total Items</td>
                                <td style="text-align:right;">1 (7)</td>
                            </tr>
                            <tr class="bb">
                                <td>Total</td>
                                <td style="text-align:right;">105.00</td>
                            </tr>
                            <tr class="bb">
                                <td>Order Tax</td>
                                <td style="text-align:right;">5.25</td>
                            </tr>
                            <tr class="bb">
                                <td>Grand Total</td>
                                <td style="text-align:right;">110.25</td>
                            </tr>
                            <tr class="bb">
                                <td>Rounding</td>
                                <td style="text-align:right;">0.00</td>
                            </tr>
                            <tr class="bb">
                                <td>Total Payable</td>
                                <td style="text-align:right;">110.25</td>
                            </tr>
                            <tr class="bb">
                                <td colspan="2" style="text-align:center;">Merchant Copy</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="width:380px;background:#FFF;display:block">
                    <div id="order-data" style="display:none;" class="text-center">
                        <h1>SimplePOS</h1>
                        <h2>Order</h2>
                        <div id="preo" class="text-left"></div>
                    </div>
                    <div id="bill-data" style="display:none;" class="text-center">
                        <h1>SimplePOS</h1>
                        <h2>Bill</h2>
                        <div id="preb" class="text-left"></div>
                    </div>
                </div>
                <div id="ajaxCall" style="display: none;"><i class="fa fa-spinner fa-pulse"></i></div>
                <div class="modal" data-easein="flipYIn" id="gcModal" tabindex="-1" role="dialog"
                    aria-labelledby="mModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="myModalLabel">Sell Gift Card</h4>
                            </div>
                            <div class="modal-body">
                                <p>Please fill in the information below</p>
                                <div class="alert alert-danger gcerror-con" style="display: none;">
                                    <button data-dismiss="alert" class="close" type="button">×</button>
                                    <span id="gcerror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="gccard_no">Card No</label> *
                                    <div class="input-group">
                                        <input type="text" name="gccard_no" value="" class="form-control"
                                            id="gccard_no">
                                        <div class="input-group-addon" style="padding-left: 10px; padding-right: 10px;">
                                            <a href="https://spos.tecdiary.com/pos#" id="genNo"><i
                                                    class="fa fa-cogs"></i></a></div>
                                    </div>
                                </div>
                                <input type="hidden" name="gcname" value="Gift Card" id="gcname">
                                <div class="form-group">
                                    <label for="gcvalue">Value</label> *
                                    <input type="text" name="gcvalue" value="" class="form-control" id="gcvalue">
                                </div>
                                <div class="form-group">
                                    <label for="gcprice">Price</label> *
                                    <input type="text" name="gcprice" value="" class="form-control" id="gcprice">
                                </div>
                                <div class="form-group">
                                    <label for="gcexpiry">Expiry Date</label> <input type="text" name="gcexpiry"
                                        value="" class="form-control" id="gcexpiry">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="button" id="addGiftCard" class="btn btn-primary">Sell Gift Card</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="dsModal" tabindex="-1" role="dialog"
                    aria-labelledby="dsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="dsModalLabel">Discount (5 or 5%)</h4>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control input-sm kb-pad" id="get_ds"
                                    onclick="this.select();" value="">
                                <label class="checkbox" for="apply_to_order">
                                    <div class="iradio_square-blue checked" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input type="radio" name="apply_to" value="order"
                                            id="apply_to_order" checked="checked"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                    Apply to order total
                                </label>
                                <label class="checkbox" for="apply_to_products">
                                    <div class="iradio_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input type="radio" name="apply_to" value="products"
                                            id="apply_to_products"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                    Apply to all order items
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="button" id="updateDiscount" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="tsModal" tabindex="-1" role="dialog"
                    aria-labelledby="tsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="tsModalLabel">Tax (5 or 5%)</h4>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control input-sm kb-pad" id="get_ts"
                                    onclick="this.select();" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="button" id="updateTax" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="noteModal" tabindex="-1" role="dialog"
                    aria-labelledby="noteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="noteModalLabel">Note</h4>
                            </div>
                            <div class="modal-body">
                                <textarea name="snote" id="snote" class="pa form-control kb-text"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="button" id="update-note" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="proModal" tabindex="-1" role="dialog"
                    aria-labelledby="proModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header modal-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="proModalLabel">
                                    Payment </h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th style="width:25%;">Net Price</th>
                                            <th style="width:25%;"><span id="net_price"></span></th>
                                            <th style="width:25%;">Product Tax</th>
                                            <th style="width:25%;"><span id="pro_tax"></span> <span
                                                    id="pro_tax_method"></span></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" id="row_id">
                                <input type="hidden" id="item_id">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nPrice">Unit Price</label> <input type="text"
                                                class="form-control input-sm kb-pad" id="nPrice"
                                                onclick="this.select();" placeholder="New Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="nDiscount">Discount</label> <input type="text"
                                                class="form-control input-sm kb-pad" id="nDiscount"
                                                onclick="this.select();" placeholder="Discount">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nQuantity">Quantity</label> <input type="text"
                                                class="form-control input-sm kb-pad" id="nQuantity"
                                                onclick="this.select();" placeholder="Current Quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nComment">Comment</label> <textarea class="form-control kb-text"
                                                id="nComment"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <button class="btn btn-success" id="editItem">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="susModal" tabindex="-1" role="dialog"
                    aria-labelledby="susModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="susModalLabel">Suspend Sale</h4>
                            </div>
                            <div class="modal-body">
                                <p>Type Reference Note</p>
                                <div class="form-group">
                                    <label for="reference_note">Reference Note</label> <input type="text"
                                        name="reference_note" value="" class="form-control kb-text" id="reference_note">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Close
                                </button>
                                <button type="button" id="suspend_sale" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="saleModal" tabindex="-1" role="dialog"
                    aria-labelledby="saleModalLabel" aria-hidden="true"></div>
                <div class="modal" data-easein="flipYIn" id="opModal" tabindex="-1" role="dialog"
                    aria-labelledby="opModalLabel" aria-hidden="true"></div>
                <div class="modal" data-easein="flipYIn" id="payModal" tabindex="-1" role="dialog"
                    aria-labelledby="payModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-success" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="payModalLabel">
                                    Payment </h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div class="font16">
                                            <table class="table table-bordered table-condensed"
                                                style="margin-bottom: 0;">
                                                <tbody>
                                                    <tr>
                                                        <td width="25%" style="border-right-color: #FFF !important;">
                                                            Total Items</td>
                                                        <td width="25%" class="text-right"><span
                                                                id="item_count">0.00</span></td>
                                                        <td width="25%" style="border-right-color: #FFF !important;">
                                                            Total Payable</td>
                                                        <td width="25%" class="text-right"><span id="twt">0.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right-color: #FFF !important;">Total Paying
                                                        </td>
                                                        <td class="text-right"><span id="total_paying">0.00</span></td>
                                                        <td style="border-right-color: #FFF !important;">Balance</td>
                                                        <td class="text-right"><span id="balance">0.00</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="note">Note</label> <textarea name="note" id="note"
                                                        class="pa form-control kb-text"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label> <input name="amount" type="text"
                                                        id="amount" class="pa form-control kb-pad amount">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="paid_by">Paying by</label> <select id="paid_by"
                                                        class="form-control paid_by select2 select2-hidden-accessible"
                                                        style="width:100%;" tabindex="-1" aria-hidden="true">
                                                        <option value="cash">Cash</option>
                                                        <option value="CC">Credit Card</option>
                                                        <option value="cheque">Cheque</option>
                                                        <option value="gift_card">Gift Card</option>
                                                        <option value="stripe">Stripe</option>
                                                        <option value="other">Other</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" style="width: 100%;"><span class="selection"><span
                                                                class="select2-selection select2-selection--single"
                                                                role="combobox" aria-autocomplete="list"
                                                                aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                                aria-labelledby="select2-paid_by-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-paid_by-container"
                                                                    title="Cash">Cash</span><span
                                                                    class="select2-selection__arrow"
                                                                    role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group gc" style="display: none;">
                                                    <label for="gift_card_no">Gift Card No</label> <input type="text"
                                                        id="gift_card_no"
                                                        class="pa form-control kb-pad gift_card_no gift_card_input">
                                                    <div id="gc_details"></div>
                                                </div>
                                                <div class="pcc" style="display:none;">
                                                    <div class="form-group">
                                                        <input type="text" id="swipe"
                                                            class="form-control swipe swipe_input"
                                                            placeholder="Swipe card here then write security code manually">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <input type="text" id="pcc_no"
                                                                    class="form-control kb-pad"
                                                                    placeholder="Credit Card No">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <input type="text" id="pcc_holder"
                                                                    class="form-control kb-text"
                                                                    placeholder="Holder Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <select id="pcc_type"
                                                                    class="form-control pcc_type select2 select2-hidden-accessible"
                                                                    placeholder="Card Type" tabindex="-1"
                                                                    aria-hidden="true">
                                                                    <option value="Visa">Visa</option>
                                                                    <option value="MasterCard">MasterCard</option>
                                                                    <option value="Amex">Amex</option>
                                                                    <option value="Discover">Discover</option>
                                                                </select><span
                                                                    class="select2 select2-container select2-container--default"
                                                                    dir="ltr" style="width: 100px;"><span
                                                                        class="selection"><span
                                                                            class="select2-selection select2-selection--single"
                                                                            role="combobox" aria-autocomplete="list"
                                                                            aria-haspopup="true" aria-expanded="false"
                                                                            tabindex="0"
                                                                            aria-labelledby="select2-pcc_type-container"><span
                                                                                class="select2-selection__rendered"
                                                                                id="select2-pcc_type-container"
                                                                                title="Visa">Visa</span><span
                                                                                class="select2-selection__arrow"
                                                                                role="presentation"><b
                                                                                    role="presentation"></b></span></span></span><span
                                                                        class="dropdown-wrapper"
                                                                        aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <input type="text" id="pcc_month"
                                                                    class="form-control kb-pad" placeholder="Month">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <input type="text" id="pcc_year"
                                                                    class="form-control kb-pad" placeholder="Year">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <input type="text" id="pcc_cvv2"
                                                                    class="form-control kb-pad" placeholder="CVV2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pcheque" style="display:none;">
                                                    <div class="form-group"><label for="cheque_no">Cheque No</label>
                                                        <input type="text" id="cheque_no"
                                                            class="form-control cheque_no kb-text">
                                                    </div>
                                                </div>
                                                <div class="pcash">
                                                    <div class="form-group"><label for="payment_note">Payment
                                                            Note</label> <input type="text" id="payment_note"
                                                            class="form-control payment_note kb-text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 text-center">

                                        <div class="btn-group btn-group-vertical" style="width:100%;">
                                            <button type="button" class="btn btn-info btn-block quick-cash"
                                                id="quick-payable">0.00
                                            </button>
                                            <button type="button"
                                                class="btn btn-block btn-warning quick-cash">10</button><button
                                                type="button"
                                                class="btn btn-block btn-warning quick-cash">20</button><button
                                                type="button"
                                                class="btn btn-block btn-warning quick-cash">50</button><button
                                                type="button"
                                                class="btn btn-block btn-warning quick-cash">100</button><button
                                                type="button" class="btn btn-block btn-warning quick-cash">500</button>
                                            <button type="button" class="btn btn-block btn-danger"
                                                id="clear-cash-notes">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Close
                                </button>
                                <button class="btn btn-primary" id="submit-sale">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="customerModal" tabindex="-1" role="dialog"
                    aria-labelledby="cModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="opacity: 1; display: block;">
                        <div class="modal-content">
                            <div class="modal-header modal-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="cModalLabel">
                                    Add Customer </h4>
                            </div>
                            <form action="https://spos.tecdiary.com/pos/add_customer" id="customer-form" method="post"
                                accept-charset="utf-8">
                                <input type="hidden" name="spos_token" value="9a1d6a683df3a4cc1b7ed4278e9c7950">
                                <div class="modal-body">
                                    <div id="c-alert" class="alert alert-danger" style="display:none;"></div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label" for="code">
                                                    Name </label>
                                                <input type="text" name="name" value=""
                                                    class="form-control input-sm kb-text" id="cname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cemail">
                                                    Email Address </label>
                                                <input type="text" name="email" value=""
                                                    class="form-control input-sm kb-text" id="cemail">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label" for="phone">
                                                    Phone </label>
                                                <input type="text" name="phone" value=""
                                                    class="form-control input-sm kb-pad" id="cphone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cf1">
                                                    Custom Field 1 </label>
                                                <input type="text" name="cf1" value=""
                                                    class="form-control input-sm kb-text" id="cf1">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cf2">
                                                    Custom Field 2 </label>
                                                <input type="text" name="cf2" value=""
                                                    class="form-control input-sm kb-text" id="cf2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-top:0;">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Close
                                    </button>
                                    <button type="submit" class="btn btn-primary" id="add_customer"> Add Customer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal" data-easein="flipYIn" id="posModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true"></div>
                <div class="modal" data-easein="flipYIn" id="posModal2" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel2" aria-hidden="true"></div>
                <script type="text/javascript">
                    var base_url = 'https://spos.tecdiary.com/',
                        assets = 'https://spos.tecdiary.com/themes/default/assets/';
                    var dateformat = 'jS F Y',
                        timeformat = 'h:i A';
                    var Settings = {
                        "logo": "logo1.png",
                        "site_name": "SimplePOS",
                        "tel": "0105292122",
                        "dateformat": "jS F Y",
                        "timeformat": "h:i A",
                        "language": "english",
                        "theme": "default",
                        "mmode": "0",
                        "captcha": "0",
                        "currency_prefix": "USD",
                        "default_customer": "1",
                        "default_tax_rate": "5%",
                        "rows_per_page": "10",
                        "total_rows": "30",
                        "header": null,
                        "footer": null,
                        "bsty": "3",
                        "display_kb": "0",
                        "default_category": "1",
                        "default_discount": "0",
                        "item_addition": "1",
                        "barcode_symbology": null,
                        "pro_limit": "10",
                        "decimals": "2",
                        "thousands_sep": ",",
                        "decimals_sep": ".",
                        "focus_add_item": "ALT+F1",
                        "add_customer": "ALT+F2",
                        "toggle_category_slider": "ALT+F10",
                        "cancel_sale": "ALT+F5",
                        "suspend_sale": "ALT+F6",
                        "print_order": "ALT+F11",
                        "print_bill": "ALT+F12",
                        "finalize_sale": "ALT+F8",
                        "today_sale": "Ctrl+F1",
                        "open_hold_bills": "Ctrl+F2",
                        "close_register": "ALT+F7",
                        "java_applet": "0",
                        "receipt_printer": "",
                        "pos_printers": "",
                        "cash_drawer_codes": "",
                        "char_per_line": "42",
                        "rounding": "1",
                        "pin_code": "abdbeb4d8dbe30df8430a8394b7218ef",
                        "purchase_code": null,
                        "envato_username": null,
                        "theme_style": "green",
                        "after_sale_page": "0",
                        "overselling": "1",
                        "multi_store": "1",
                        "qty_decimals": "2",
                        "symbol": "",
                        "sac": "0",
                        "display_symbol": "0",
                        "remote_printing": "1",
                        "printer": null,
                        "order_printers": "null",
                        "auto_print": "0",
                        "local_printers": "1",
                        "rtl": "0",
                        "print_img": "0",
                        "selected_language": "english"
                    };
                    var sid = false,
                        username = 'admin',
                        spositems = {};
                    $(window).load(function () {
                        $('#mm_pos').addClass('active');
                        $('#pos_index').addClass('active');
                    });
                    var pro_limit = 10,
                        java_applet = 0,
                        count = 1,
                        total = 0,
                        an = 1,
                        p_page = 0,
                        page = 0,
                        cat_id = 1,
                        tcp = 2;
                    var gtotal = 0,
                        order_discount = 0,
                        order_tax = 0,
                        protect_delete = 0;
                    var order_data = {},
                        bill_data = {};
                    var csrf_hash = '9a1d6a683df3a4cc1b7ed4278e9c7950';
                    var lang = new Array();
                    lang['code_error'] = 'Code Error';
                    lang['r_u_sure'] = '<strong>Are you sure?</strong>';
                    lang['please_add_product'] = 'Please add product';
                    lang['paid_less_than_amount'] = 'Paid amount is less than paying';
                    lang['x_suspend'] = 'Sale can not be suspended';
                    lang['discount_title'] = 'Discount (5 or 5%)';
                    lang['update'] = 'Update';
                    lang['tax_title'] = 'Tax (5 or 5%)';
                    lang['leave_alert'] = 'You will loss the data, are you sure?';
                    lang['close'] = 'Close';
                    lang['delete'] = 'Delete';
                    lang['no_match_found'] = 'No match found';
                    lang['wrong_pin'] = 'Wrong Pin';
                    lang['file_required_fields'] = 'Please fill required fields';
                    lang['enter_pin_code'] = 'Enter Pin code';
                    lang['incorrect_gift_card'] = 'Gift card number is wrong or card is already used.';
                    lang['card_no'] = 'Card No';
                    lang['value'] = 'Value';
                    lang['balance'] = 'Balance';
                    lang['unexpected_value'] = 'Unexpected Value Provided!';
                    lang['inclusive'] = 'Inclusive';
                    lang['exclusive'] = 'Exclusive';
                    lang['total'] = 'Total';
                    lang['total_items'] = 'Total Items';
                    lang['order_tax'] = 'Order Tax';
                    lang['order_discount'] = 'Order Discount';
                    lang['total_payable'] = 'Total Payable';
                    lang['rounding'] = 'Rounding';
                    lang['grand_total'] = 'Grand Total';
                    lang['register_open_alert'] = 'Register is open, are you sure to sign out?';
                    lang['discount'] = 'Discount';
                    lang['order'] = 'Order';
                    lang['bill'] = 'Bill';
                    lang['merchant_copy'] = 'Merchant Copy';

                    $(document).ready(function () {

                        if (get('rmspos')) {
                            if (get('spositems')) {
                                remove('spositems');
                            }
                            if (get('spos_discount')) {
                                remove('spos_discount');
                            }
                            if (get('spos_tax')) {
                                remove('spos_tax');
                            }
                            if (get('spos_note')) {
                                remove('spos_note');
                            }
                            if (get('spos_customer')) {
                                remove('spos_customer');
                            }
                            if (get('amount')) {
                                remove('amount');
                            }
                            remove('rmspos');
                        }
                        if (!get('spos_discount')) {
                            store('spos_discount', '0');
                            $('#discount_val').val('0');
                        }
                        if (!get('spos_tax')) {
                            store('spos_tax', '5%');
                            $('#tax_val').val('5%');
                        }

                        if (ots = get('spos_tax')) {
                            $('#tax_val').val(ots);
                        }
                        if (ods = get('spos_discount')) {
                            $('#discount_val').val(ods);
                        }
                        bootbox.addLocale('bl', {
                            OK: 'OK',
                            CANCEL: 'No',
                            CONFIRM: 'Yes'
                        });
                        bootbox.setDefaults({
                            closeButton: false,
                            locale: "bl"
                        });
                    });
                </script>
                <script type="text/javascript">
                    var socket = null;

                    function printBill(bill) {
                        if (Settings.remote_printing == 1) {
                            Popup($('#bill_tbl').html());
                        } else if (Settings.remote_printing == 2) {
                            if (socket.readyState == 1) {
                                if (Settings.print_img == 1) {
                                    $('#bill-data').show();
                                    $('#preb').html(
                                        '<pre style="background:#FFF;font-size:20px;margin:0;border:0;color:#000 !important;">' +
                                        bill_data.info +
                                        bill_data.items +
                                        '\n' +
                                        bill_data.totals +
                                        '</pre>'
                                    );
                                    var element = $('#bill-data').get(0);
                                    html2canvas(element, {
                                        scrollY: 0,
                                        scale: 1.7
                                    }).then(function (canvas) {
                                        var dataURL = canvas.toDataURL();
                                        var socket_data = {
                                            'printer': '',
                                            'text': dataURL,
                                            'cash_drawer': 0
                                        };
                                        socket.send(JSON.stringify({
                                            type: 'print-img',
                                            data: socket_data
                                        }));
                                        // return Canvas2Image.saveAsPNG(canvas);
                                    });
                                    setTimeout(function () {
                                        $('#bill-data').hide();
                                    }, 500);
                                } else {
                                    var socket_data = {
                                        'printer': '',
                                        'logo': 'https://spos.tecdiary.com/uploads/logo.png',
                                        'text': bill
                                    };
                                    socket.send(JSON.stringify({
                                        type: 'print-receipt',
                                        data: socket_data
                                    }));
                                }
                                return false;
                            } else {
                                bootbox.alert(
                                    'Unable to connect to socket, please make sure that server is up and running fine.'
                                    );
                                return false;
                            }
                        }
                    }
                    var order_printers = '';

                    function printOrder(order) {
                        if (Settings.remote_printing == 1) {
                            Popup($('#order_tbl').html());
                        } else if (Settings.remote_printing == 2) {
                            if (socket.readyState == 1) {
                                if (Settings.print_img == 1) {
                                    $('#order-data').show();
                                    $('#preo').html(
                                        '<pre style="background:#FFF;font-size:20px;margin:0;border:0;color:#000 !important;">' +
                                        order_data.info + order_data.items + '</pre>'
                                    );
                                    var element = $('#order-data').get(0);
                                    html2canvas(element, {
                                        scrollY: 0,
                                        scale: 1.7
                                    }).then(function (canvas) {
                                        var dataURL = canvas.toDataURL();
                                        var socket_data = {
                                            'printer': '',
                                            'text': dataURL,
                                            'order': 1,
                                            'cash_drawer': 0
                                        };
                                        socket.send(JSON.stringify({
                                            type: 'print-img',
                                            data: socket_data
                                        }));
                                        // return Canvas2Image.saveAsPNG(canvas);
                                    });
                                    setTimeout(function () {
                                        $('#order-data').hide();
                                    }, 500);
                                } else {
                                    if (order_printers == '') {
                                        var socket_data = {
                                            'printer': false,
                                            'order': true,
                                            'logo': 'https://spos.tecdiary.com/uploads/logo.png',
                                            'text': order
                                        };
                                        socket.send(JSON.stringify({
                                            type: 'print-receipt',
                                            data: socket_data
                                        }));
                                    } else {
                                        $.each(order_printers, function () {
                                            var socket_data = {
                                                'printer': this,
                                                'logo': 'https://spos.tecdiary.com/uploads/logo.png',
                                                'text': order
                                            };
                                            socket.send(JSON.stringify({
                                                type: 'print-receipt',
                                                data: socket_data
                                            }));
                                        });
                                    }
                                }
                                return false;
                            } else {
                                bootbox.alert(
                                    'Unable to connect to socket, please make sure that server is up and running fine.'
                                    );
                                return false;
                            }
                        }
                    }
                </script>



                <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0"
                    style="display: none;"></ul><span role="status" aria-live="assertive" aria-relevant="additions"
                    class="ui-helper-hidden-accessible"></span>
            </body>

            </html>

        </div>

        <link rel="stylesheet" href="{{ asset('css/pos-style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/liste-style.css')}}">
        @extends('inc.pos')
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
