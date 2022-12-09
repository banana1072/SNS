<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Support\Facades\Validator;



class PostsController extends Controller
{
    //
    public function delete() {
        $login_user_id = Auth::id();
      }

    protected static $rules = [
        'post_content' => 'required|max:200'
    ];

    public function create(Request $request){

        $this->validate($request,$this::$rules);

        $post_content = $request->get('post_content');

        $login_user_last_post = Post::create($post_content);

        return view('posts.index',compact('login_user_last_post'));
    }
    public function index(){
        $login_user_last_post = "投稿がありません";
        return view('posts.index',['login_user_last_post'=>$login_user_last_post]);
    }

}
