<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Follow extends Model
{
    //
    protected $fillable = [
        'followed_id','following_id'
    ];

    public static function other_user_list(){

        $other_user_list = DB::select('select id,images,username from users where id != '.Auth::id());
        return $other_user_list;
    }
     public static function other_user_post(){

        $user_id = Auth::id();
        $other_user_list = DB::select('select users.id,images,username,post,posts.updated_at from users inner join posts on posts.user_id = users.id where users.id != '.$user_id);
        return $other_user_list;
    }

    public static function follow_list(){
        $follow_list = DB::table('follows')->where('following_id', Auth::id())->get('followed_id');
        return $follow_list;
    }
        public static function follower_list(){
        $follower_list = DB::table('follows')->where('followed_id', Auth::id())->get('following_id');
        return $follower_list;
    }



}
