<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function kamarier() {
        return view('pages.kamarier');
    }
    
    public function ekonomist() {
        return view('pages.ekonomist');
    }
    
    public function menaxher() {
        return view('pages.menaxher');
    }
    
    public function admin() {
        return view('pages.admin');
    }
}