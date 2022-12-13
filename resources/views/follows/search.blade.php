@extends('layouts.login')
@section('content')
<div class="search-wrapper">
  {{ Form::open(['url'=>'/search','method'=>'get']) }}
  {{ Form::text('get','',['class'=>'search_user','name'=>'search_word','placeholder'=>'ユーザ名']) }}
  <button><i class="fa-solid fa-magnifying-glass"></i></button>
  {{ Form::close() }}
</div>
<div class="search_user">
  <ul class="users">
    @foreach($search_result as $list)
    <li class="user">
      <img src="{{ asset('images/'.$list->images) }}">
      <p>{{ $list->username }}</p>
      @if($follow_list->contains("followed_id",$list->id))
        <a href="/search/{{ $list->id }}/unfollow">フォロー解除</a>
      @else
      <a class="follow_btn" href="/search/{{ $list->id }}/follow">フォローする</a>
      @endif
    </li>
    @endforeach
  </ul>

</div>

@endsection
