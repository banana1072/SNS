<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
    public function logout(){
        return view('auth.login');
    }

    public function followerlist(){
        return view('follows.followerList');
    }
    public function followlist(){
        return view('follows.followList');
    }
    public function Userprofile(){
        return view('users.profile');
    }

   public function index(){
        return view('users.search');
   }
    public function follow_num(){
        //$users = DB::table('users')->get();
        $user_id = Auth::id();
        $followed_num = DB::table('users')->join('follows','follows.followed_id' , '=', 'users.id')->where('followed_id',$user_id)->count();
        $following_num = DB::table('users')->join('follows', 'follows.following_id', '=', 'users.id')->where('users.id', $user_id)->count();
        return redirect("/top");
    }
}
