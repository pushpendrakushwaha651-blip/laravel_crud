<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function showUser(){
        // return "<h1>  hello user </h1>";
        return view('welcome');
    }
}
