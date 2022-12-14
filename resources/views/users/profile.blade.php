@extends('layouts.login')

@section('content')


<div class="profile_edit_wrapper">
  <img src="{{ asset('images/'.$login_user[0]->images) }}">
  {{ Form::open(['url'=>'profile/profile_edit','enctype'=>'multipart/form-data']) }}
  <div >
    {{Form::label('name','user name')}}
    {{ Form::text("",$login_user[0]->username,['name'=>'username'])}}
    @if ($errors->has('username'))
    <p>{{ $errors->first('username') }}</p>
    @endif
  </div>
  <div >
  {{Form::label('name','mail address')}}
  {{ Form::text("",$login_user[0]->mail,['name'=>'mail'])}}
      @if ($errors->has('mail'))
    <p>{{ $errors->first('mail') }}</p>
    @endif

  </div>
  <div >
  {{Form::label('name','password')}}
  {{ Form::password('password',[]) }}
    @if ($errors->has('password'))
    <p>{{ $errors->first('password') }}</p>
    @endif

  </div>
  <div >
  {{Form::label('name','password confirm')}}
  {{ Form::password('password_confirmation',[])}}
      @if ($errors->has('password_confirmation'))
    <p>{{ $errors->first('password_confirmation') }}</p>
    @endif

  </div>
  <div >
  {{Form::label('name','bio')}}
  {{ Form::text("",$login_user[0]->bio,['name'=>'bio'])}}
      @if ($errors->has('bio'))
    <p>{{ $errors->first('bio') }}</p>
    @endif

  </div>
  <div >
  {{Form::label('name','icon image')}}
  {{ Form::file('icon') }}
    @if ($errors->has('icon'))
    <p>{{ $errors->first('icon') }}</p>
    @endif

  </div>
  {{ Form::submit('更新',['class'=>'edit_btn']) }}
  {{ Form::close() }}
</div>



@endsection
