<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    //
    public function doDeactive($id){
        DB::table('posts')->where('id', $id)->update(['status' => 0]);
        return redirect('admin/posts')->with('message', 'Status Deactivated Successfully.');
    }
    public function doActive($id){
        DB::table('posts')->where('id', $id)->update(['status' => 1]);
        return redirect('admin/posts')->with('message', 'Status Activated Successfully.');
    }
}
