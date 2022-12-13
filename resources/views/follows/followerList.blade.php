@extends('layouts.login')

@section('content')
<div class="followerlist_wrapper">
  <p>Follow List</p>
  <div class="follower_list">
    @foreach($other_user_list as $list)
      @if($follower_list->contains("following_id",$list->id))
        <img src="{{ asset('images/'.$list->images) }}">
      @endif
    @endforeach
  </div>
</div>
<ul class="follower_posts">
   @foreach($follower_user_post as $list)
    @if($follower_list->contains("following_id",$list->id))
  <li class="follower_post">
    <a href="/followerlist/{{ $list->id }}/user">
      <img src="{{ asset('images/'.$list->images) }}">
    </a>
    <div class="follower_detail">
      <p class="follower_username">{{ $list->username }}</p>
      <p class="follower_user_post">{{ $list->post }}</p>
    </div>
    <p class="post_updated">{{ date('Y-m-d H:i',strtotime($list->updated_at ) ) }}</p>
  </li>
  @endif
  @endforeach
</ul>
@endsection
