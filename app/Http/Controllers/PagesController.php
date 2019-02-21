<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function kamarier() {
        $users = User::all();
        return view('pages.kamarier')->with('users',$users);
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