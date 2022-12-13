<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function search(Request $request){
        $other_user_list = Follow::other_user_list();
        $follow_list = Follow::follow_list();

        $search_word = $request->input('search_word');
        $query = User::query();
        if(!empty($search_word)){
            $query->where('username',"LIKE", '%'.$search_word.'%');
        }
        $search_result = $query->get(['id','images','username']);

        return view('follows.search',['other_user_list'=>$other_user_list,'follow_list'=>$follow_list,'search_result'=> $search_result,'search_word'=>$search_word]);
    }
    public function follow($id){
        $login_user_id = Auth::id();
        Follow::create(['followed_id' => $id,'following_id' => $login_user_id,'created_at'=>now(),'updated_at'=>now()]);
        return redirect('/search');
    }
    public function unfollow($id){
        $login_user_id = Auth::id();
        Follow::where('followed_id', $id)->where('following_id',$login_user_id)->delete();
        return redirect('/search');
    }


}
