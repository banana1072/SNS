@extends('layouts.login')

@section('content')
<?php $user_img = Auth::user()->images ?>
<?php $user_name = Auth::user()->username ?>

<!--////////////////////投稿updateモーダル////////////////////-->
<div class="update_form" id="login_user_update">
  {{ Form::open(['url'=> '/top/update'])  }}
  {{Form::textarea('get', $login_user_last_post[0]->post, ['class' => 'update_post', 'id' => 'textareaRemarks', 'placeholder' =>'更新する内容を記入してください'  , 'rows' => '3','name'=>'post_content'])}}
  {{ Form::button('', ['type' => 'image', 'src' => asset('images/edit.png') ]) }}
  {{ Form::hidden('id',$login_user_last_post[0]->id) }}
  {{ Form::close() }}
</div>
<!--////////////////////////////////////////////////////-->

<!--///////////////////呟き画面updateモーダル//////////////-->

<!--///////////////////////投稿フォーム/////////////////////////////-->

<div class="post_form">
  <img src="{{ asset('images/'.$user_img) }}">
  {{ Form::open(['action' => 'PostsController@create']) }}
  {{Form::textarea('get', null, ['class' => 'post', 'id' => 'textareaRemarks', 'placeholder' => '投稿内容を入力してください', 'rows' => '3','name'=>'post_content'])}}
  @error('post_content')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  {{ Form::button('', ['type' => 'submit', 'class'=>'fa-regular fa-paper-plane']) }}
  {{ Form::close() }}
</div>
<!--////////////////////////////////////////////////////-->


<!--////////////////////////投稿した内容////////////////////////////-->

<div class="post_contents">
  <div class="login_user_post_content">
    <div class="post_content_top">
      <img src="{{ asset('images/'.$user_img) }}">
      <p>{{ $user_name }}</p>
    </div>
    <p class="post_content">{{ $login_user_last_post[0]->post }}</p>
    <div class="fix_btn">
      <a class="login_user_update"><img src="{{ asset('images/edit.png') }}" ></a>
      <a href="/top/{{ $login_user_last_post[0]->id }}/delete"><img src="{{ asset('images/trash.png') }}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"></a>
    </div>
  </div>

<!--////////////////////////////////////////////////////-->

<!--//////////////////////他の人の投稿//////////////////////////////-->

  <div class="other_user_post_content">


   <ul>
    @foreach ($user_post as $list)
    <li class="user_contents">
      <img src="{{ asset('images/'.$list->images) }}">
      <div class="user_content">
        <p class="user_name">{{ $list->username }}</p>
        <p class="user_post">{{ $list->post }}</p>
      </div>
      @if($list->user_id == Auth::user()->id)
      <div class="fix_btn">
        <a class="other_user_update">
          <img src="{{ asset('images/edit.png') }}" >
        </a>
        <div class="update_form other">
        {{ Form::open(['url'=>'/top/update'])  }}
        {{Form::textarea('get', $list->post, ['class' => 'update_post', 'placeholder' =>'更新する内容を記入してください'  , 'rows' => '3','name'=>'post_content'])}}
        {{ Form::button('', ['type' => 'image', 'src' => asset('images/edit.png') ]) }}
        {{ Form::hidden('id',$list->id) }}
        {{ Form::close() }}
      </div>
        <a href="/top/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="{{ asset('images/trash.png') }}"></a>
      </div>
      @endif
    </li>
    @endforeach
   </ul>
  </div>
</div>
@endsection
