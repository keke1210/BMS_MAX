<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Alert;
class ProdukteController extends Controller
{
    //
    public function store(Request $request)
    {
        $produkt = new Product();
        $produkt->name=$request->name;
        $produkt->cmimi=$request->price;

        $produkt->save();
        return response()->json(['success'=>'Produkti u krijua me sukses']);
    }
}
