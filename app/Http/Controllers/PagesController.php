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
        // Totali i orderave
        // $totali_query = DB::table('order_totali')
        // ->select('totali','order_id')
        // ->get();
        // $total = json_decode($totali_query);

        //Produkti me i shitur
        $produkti_me_i_shitur = DB::table('test_view1')
        ->select('name','sasia_max')
        ->get();
        $product_name = json_decode($produkti_me_i_shitur)[0]->name;
        $product_sasia_max = json_decode($produkti_me_i_shitur)[0]->sasia_max;
        return view('pages.ekonomist',compact('product_name','product_sasia_max'));
    }
    
    public function menaxher() {
        return view('pages.menaxher');
    }
    
    public function admin() {
        return view('pages.admin');
    }
}