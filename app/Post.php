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
        $login_user_last_data = $login_user_post->orderBy('posts.created_at','desc')->take(1)->get(['post','posts.id','posts.created_at']);
        $login_user_last_post = $login_user_last_data;
        return $login_user_last_post;
    }

    public static function post_list(){
        // $user_post = DB::table('users')->join('posts', 'posts.user_id', '=', 'users.id')->join('follows', 'follows.followed_id', '=', 'users.id')->orderBy('posts.created_at', 'desc')->offset(2)->limit(5)->get(['user_id','username','images','post','posts.id']);

        $user_post = DB::select(
            'SELECT images,users.id,username,posts.created_at,posts.updated_at,user_id,post FROM users INNER JOIN follows on followed_id = users.id INNER JOIN posts ON posts.user_id = followed_id WHERE following_id = ' . Auth::id() . ' UNION SELECT images,users.id,username,posts.created_at,posts.updated_at,user_id,post FROM users INNER JOIN posts ON posts.user_id = users.id WHERE users.id = ' . Auth::id() . ' ORDER BY created_at desc LIMIT 1,5');

        return $user_post;
    }
}
