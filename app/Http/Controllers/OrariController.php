<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orari;
use App\User;

class OrariController extends Controller
{
    public function index() {
        // $userat = User::all()->first();
        // $oraret = Orari::all()->first();
        return view('welcome');
    }

    public function create() {

        return redirect('/')->with('success','Orari u shtua');
    }

    public function store() {

        return redirect('/')->with('success','Orari u perditesua');
    }
}

