<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $total_category = DB::table('categories')->count();
        $total_post = DB::table('posts')->count();
        $total_user = DB::table('users')->count();
       
        return view('adminpanel.dashboard', ['total_category' => $total_category, 'posts' => $total_post, 'total_user' => $total_user]);
    }

    public function profilePage(){
        return view('adminpanel.profile');
    }

    public function editProfile($id){
        $user_data = DB::table('users')->find($id);
        return view('adminpanel.update-profile', ['user_info' => $user_data]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:5120'
        ]);
        if($request->photo){
            $image_name = time().'-'.$request->name.'.'.$request->photo->extension();
            $request->photo->move(public_path('profile'), $image_name);
            $image = DB::table('users')->find($id);
            unlink("profile/".$image->photo);
            DB::table('users')->where('id', $id)->update([
                'photo' => $image_name
           ]);
        }else{
            unset($request->post_thumbnail);
        }
        DB::table('users')->where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
       ]);

       return redirect('/admin/profile')->with('message', "Profile has been Updated successfully");
    }
    public function updatePass(Request $request, $id){
        $request->validate([
            'current_password' => 'required',
            'newpassword' => 'required|min:8'

        ]);
       
        $data =  $request->newpassword;
        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($data)
        ]);

    return redirect('/admin/profile')->with('message', "Password Changed Successfully");
    }
   
}
