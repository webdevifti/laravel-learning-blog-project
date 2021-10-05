<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function index(){
        // Posts Data
        $posts = DB::table('posts')
        ->join('categories','posts.category_id', '=', 'categories.id')
        ->select('posts.*', 'categories.category as category')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->simplePaginate(10);

        // Sidebar Data
        $sidebar_data = DB::table('posts')->select('post_thumbnail','title')->where('status', 1)->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('index', ['posts' => $posts, 'sidebar' => $sidebar_data]);
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
