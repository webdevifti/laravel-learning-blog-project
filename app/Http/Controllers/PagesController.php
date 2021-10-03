<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        
        return view('index');
    }
    public function about(){
        $title = "About Page";
        return view('about')->with('title', $title);
    }
    public function contact(){
        return view('contact');
    }
    public function resource(){
        return view('resource');
    }
}
