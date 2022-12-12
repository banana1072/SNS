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

    public static function follow_list(){
        $follow_list = DB::table('follows')->where('following_id', Auth::id())->get('followed_id');
        return $follow_list;
    }

}
