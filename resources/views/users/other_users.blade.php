@extends('layouts.login')

@section('content')

<div class="other_user_profile_wrapper">
   <img src="{{ asset('images/'.$other_user_profile[0]->images) }}">
  <div class="other_user_profile">
    <ul>
      <li><p>name</p><p>{{ $other_user_profile[0]->username }}</p></li>
      <li><p>bio</p><p>{{ $other_user_profile[0]->bio }}</p></li>
    </ul>
  </div>
    @if($follow_list->contains("followed_id",$other_user_profile[0]->id))
      <a  href="/search/{{ $other_user_profile[0]->id }}/unfollow">フォロー解除</a>
    @else
      <a class="follow_btn" href="/search/{{ $other_user_profile[0]->id }}/follow">フォローする</a>
    @endif

</div>
<div class="other_user_posts">
  <ul>
    @foreach($other_user_profile as $list)
    <li>
      <img src="{{ asset('images/'.$list->images) }}">
      <div class="other_user_post">
        <p class="username">{{ $list->username }}</p>
        <p class="post_content">
          {{ $list->post }}
        </p>
      </div>
      <p class="post_updated">{{ date('Y-m-d H:i',strtotime($list->updated_at ) ) }}</p>
    </li>
    @endforeach
  </ul>
</div>

@endsection
