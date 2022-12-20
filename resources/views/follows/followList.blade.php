@extends('layouts.login')

@section('content')
<div class="followlist_wrapper">
  <p>Follow List</p>
  <div class="follow_list">
    @foreach($other_user_list as $list)
      @if($follow_list->contains("followed_id",$list->id))
      <a href="/followlist/{{ $list->id }}/user">
        <img src="{{ asset('images/'.$list->images) }}">
      </a>
      @endif
    @endforeach
  </div>
</div>
<ul class="follow_posts">
   @foreach($follow_user_post as $list)
    @if($follow_list->contains("followed_id",$list->id))
  <li class="follow_post">
    <a href="/followlist/{{ $list->id }}/user">
      <img src="{{ asset('images/'.$list->images) }}">
    </a>
    <div class="follow_detail">
      <p class="follow_username">{{ $list->username }}</p>
      <p class="follow_user_post">{{ $list->post }}</p>
    </div>
    <p class="post_updated">{{ date('Y-m-d H:i',strtotime($list->updated_at ) ) }}</p>
  </li>
  @endif
  @endforeach
</ul>
@endsection
