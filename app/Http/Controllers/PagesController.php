<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')->where('status',1)->get();
        return view('index', ['posts' => $posts]);
    }
    public function about(){
        
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function resource(){
        return view('resource');
    }
    public function singlePost($slug){

        return view('post');
    }
}
