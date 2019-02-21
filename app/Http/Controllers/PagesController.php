<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

class PagesController extends Controller
{
    public function kamarier() {
        $tables = Table::all();
        return view('pages.kamarier',compact('tables'));
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