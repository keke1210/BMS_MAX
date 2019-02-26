<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrariController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function create() {

        return redirect('/')->with('success','Orari u shtua');
    }

    public function store() {

        return redirect('/')->with('success','Orari u perditesua');
    }
}
