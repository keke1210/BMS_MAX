<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orari;
use App\User;

class OrariController extends Controller
{
    public function index() {
        // $userat = User::all()->first();
         $orar1 = Orari::with('user')->get();
        return view('welcome',compact('orar1'));
    }

    public function create() {

        return redirect('/')->with('success','Orari u shtua');
    }

    public function store() {

        return redirect('/')->with('success','Orari u perditesua');
    }
}

