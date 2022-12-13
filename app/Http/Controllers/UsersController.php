<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;
use Illuminate\Validation\Validator;



class UsersController extends Controller
{
    //
    public function profile(){
        $id = Auth::id();
        $login_user = DB::table('users')->where('id',$id)->get();
        return view('users.profile',['login_user'=>$login_user]);
    }
    public function profileEdit(Request $request){
        $img = $request->file('icon');
    if($img == null){
        $img = "dawn.png";
    }
    $request->file('icon');

    $request->validate([
        'username'=>'required|min:2|max:12',
        'mail' => 'required|email:rfc,dns|min:5|max:40|unique:users,mail',
        'password' =>'required|alpha|min:8|max:20',
        'password_confirmation'=>'required|alpha|min:8|max:20',
        'bio'=>'max:150',
        'icon'=>'mimes:jpeg,jpg,png,bmp,gif,svg'
    ]);
        DB::table('users')->where('id',Auth::id())->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => $request->input('password'),
            'bio' => $request->input('bio'),
            'images' => $img,
        ]);
        return redirect('/top');
    }
    public function logout(){
        return view('auth.login');
    }

    public function Userprofile(){
        return view('users.profile');
    }

   public function index(){
        return view('users.search');
   }

   public function other_user_profile($id){
     $other_user_profile = DB::select('select users.id,images,username,bio,post,posts.updated_at from users inner join posts on posts.user_id = users.id where users.id = '.$id);
    $follow_list = Follow::follow_list();
    return view('users.other_users',['other_user_profile'=>$other_user_profile,'follow_list'=>$follow_list]);
   }
    public function follow_num(){
        //$users = DB::table('users')->get();
        $user_id = Auth::id();
        $followed_num = DB::table('users')->join('follows','follows.followed_id' , '=', 'users.id')->where('followed_id',$user_id)->count();
        $following_num = DB::table('users')->join('follows', 'follows.following_id', '=', 'users.id')->where('users.id', $user_id)->count();
        return redirect("/top");
    }
}
