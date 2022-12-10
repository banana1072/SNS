<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;



class PostsController extends Controller
{
    //
    public function delete() {
        $login_user_id = Auth::id();
      }

    public function update(){

    }




    public function create(Request $request){

        $request->validate(['post_content' => 'required|max:200']);

        $post_content = $request->get('post_content');

        $login_user_last_post = Post::create($post_content);

        return redirect('/top');
    }

    public function index(){
        $login_user_last_post = Post::last_post();
        return view('posts.index',['login_user_last_post'=>$login_user_last_post]);
    }

}
