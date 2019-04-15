<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use Illuminate\Support\Facades\DB;
use App\Order;

class PagesController extends Controller
{
    public function kamarier() {
        $tables = Table::all();
        return view('pages.kamarier',compact('tables'));
    }
    
    public function ekonomist() {
        $nen_total = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.prod_id', '=', 'order_details.prod_id')
            ->select('order_details.id', 'order_details.order_id', 'order_details.prod_id','products.cmimi', 'order_details.created_at',
            'order_details.sasia', DB::raw('products.cmimi*order_details.sasia as nen_total'))
            //,DB::raw('SUM(products.cmimi*order_details.sasia) as totali'))
            //->groupBy('order_details.order_id')
            ->get();
       // $nen_total = $nen_total->grou 
                    
        // $totali = DB::table('order_details')
        //     ->select('department', DB::raw('SUM(price) as total_sales'))
        //     ->groupBy('department')
        //     ->havingRaw('SUM(price) > ?', [2500])
        //     ->get();

        // $orders = App\Order::orderBy('id','desc')->with('orderItems.product')->first();
        // $orders = Order::with('orderItems.product')->get();
        // $orders = $orders->orderItems[0]->product->name;

        return view('pages.ekonomist',compact('nen_total','orders'));
    }
    
    public function menaxher() {
        return view('pages.menaxher');
    }
    
    public function admin() {
        return view('pages.admin');
    }
}