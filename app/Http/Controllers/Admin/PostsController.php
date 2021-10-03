<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('posts')
        ->join('categories','posts.category_id', '=', 'categories.id')
        ->select('posts.*', 'categories.category as category')
        ->get();

        return view('adminpanel.posts', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Sending Category Data to The Post Form
        $get_category = DB::table('categories')->orderBy('category', 'ASC')->get();
        return view('adminpanel.create-post', ['categories' => $get_category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|unique:posts',
            'post_body' => 'required',
            'category' => 'required',
            'post_thumbnail' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);
        
        $image_name = time().'-'.$request->name.'.'.$request->post_thumbnail->extension();
        $request->post_thumbnail->move(public_path('images'), $image_name);
       
       $posts = Post::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'post_body' => $request->input('post_body'),
            'post_thumbnail' => $image_name
       ]);

       return redirect('/admin/posts')->with('message', "Post has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = DB::table('posts')->find($id);
        $cate_data = DB::table('categories')->get();
        return view('adminpanel.update-post',['data' => $data, 'cat' => $cate_data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'post_body' => 'required',
            'category' => 'required',
            'post_thumbnail' => 'mimes:jpg,jpeg,png|max:5120'
        ]);
        
  
        if($request->post_thumbnail){
            $image_name = time().'-'.$request->name.'.'.$request->post_thumbnail->extension();
            $request->post_thumbnail->move(public_path('images'), $image_name);
            Post::where('id', $id)->update([
                'post_thumbnail' => $image_name
           ]);
        }else{
            unset($request->post_thumbnail);
            
        }
        Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'post_body' => $request->input('post_body')
       ]);
       return redirect('/admin/posts')->with('message', "Post has been Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    
        $image = Post::find($id);

        unlink("images/".$image->post_thumbnail);
           
        DB::table('posts')->where('id', $id)->delete();
        return redirect('/admin/posts')->with('message', "Posts Has Been Deleted Successfully.");
    }
}
