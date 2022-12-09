@extends('layouts.login')

@section('content')
<?php $user_img = Auth::user()->images ?>
<?php $user_name = Auth::user()->username ?>
<div class="post_form">
  <img src="{{ asset('images/'.$user_img) }}">
  {{ Form::open(['action' => 'PostsController@create']) }}
  {{Form::textarea('get', null, ['class' => 'post', 'id' => 'textareaRemarks', 'placeholder' => '投稿内容を入力してください', 'rows' => '3','name'=>'post_content'])}}
  {{ Form::button('', ['type' => 'submit', 'class'=>'fa-regular fa-paper-plane']) }}
</div>
<div class="post_contents">
  <div class="login_user_post_content">
    <div class="post_content_top">
      <img src="{{ asset('images/'.$user_img) }}">
      <p>{{ $user_name }}</p>
    </div>
    <p class="post_content">{{ $login_user_last_post}}</p>
    <div class="fix_btn">
      {{-- <a href="{{ action('PostsController@update') }}"><img src="{{ asset('images/edit.png') }}"></a>
      <a href="{{ action('PostsController@delete') }}"><img src="{{ asset('images/trash.png') }}"></a> --}}
    </div>

  </div>
  <div class="other_user_post_content"></div>
</div>
@endsection
