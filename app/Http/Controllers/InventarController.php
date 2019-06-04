<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarController extends Controller
{
    public function index() {
        // $userat = User::all()->first();
        return view('inventar.index');
    }
}