<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public static function create($post_content){

        $login_user_id = Auth::id();
        DB::table('posts')->insert(['user_id'=>$login_user_id,'post'=>$post_content,'created_at'=>now(),'updated_at'=>now()]);

        $login_user_post = DB::table('users')->join('posts', 'posts.user_id', '=', 'users.id')->where('users.id', $login_user_id);

        $login_user_last_data = $login_user_post->orderBy('posts.created_at','desc')->take(1)->get('post');

        $login_user_last_post = ($login_user_last_data[0])->post;

        return $login_user_last_post;

    }

    public static function last_post(){
        $login_user_id = Auth::id();
        $login_user_post = DB::table('users')->join('posts', 'posts.user_id', '=', 'users.id')->where('users.id', $login_user_id);
        $login_user_last_data = $login_user_post->orderBy('posts.created_at','desc')->take(1)->get(['post','posts.id']);
        $login_user_last_post = $login_user_last_data;
        return $login_user_last_post;
    }

    public static function post_list(){
        $user_post = DB::table('users')->join('posts', 'posts.user_id', '=', 'users.id')->orderBy('posts.created_at','desc')->offset(2)->limit(5)->get(['username','images','post','posts.id']);

        return $user_post;
    }
}
