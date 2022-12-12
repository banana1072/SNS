<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;



class PostsController extends Controller
{
    //
    public function delete($id) {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function update(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('up_content');
        $request->validate(['up_content' => 'required|max:150'],[]
    );
        Post::where('id', $id)->update(['post' => $up_post]);
        return redirect('/top');
    }

    public function create(Request $request){

        $request->validate(['post_content' => 'required|max:150']);

        $post_content = $request->get('post_content');

        $login_user_last_post = Post::create($post_content);

        return redirect('/top');
    }

    public function index(){
        $login_user_last_post = Post::last_post();
        $user_post = Post::post_list();
        return view('posts.index',['login_user_last_post'=>$login_user_last_post,'user_post'=>$user_post]);
    }

}
