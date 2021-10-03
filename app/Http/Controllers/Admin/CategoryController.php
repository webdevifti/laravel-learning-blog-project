<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = DB::table('categories')->get();
        return view('adminpanel.category',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminpanel.create-category');
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
            'category' => 'required | unique:categories'
        ]);
        $data =  $request->category;
        DB::table('categories')->insert([
            'category' => $data
        ]);
      
        return redirect('/admin/category')->with('message', "Category Has Been Added Successfully.");
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
        $data = DB::table('categories')->find($id);
        
        return view('adminpanel.update-category',['data' => $data]);

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
            'category' => 'required | unique:categories'
        ]);

        $data =  $request->category;
        DB::table('categories')->where('id', $id)->update([
            'category' => $data
        ]);

        return redirect('/admin/category')->with('message', "Category Has Been Updated Successfully.");
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
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/admin/category')->with('message', "Category Has Been Deleted Successfully.");
    }
}
