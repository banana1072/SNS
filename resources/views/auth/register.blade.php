@extends('layouts.logout')

@section('content')

<div class="register_form">
{!! Form::open(['action' => 'Auth\RegisterController@register']) !!}

<h2>新規ユーザー登録</h2>

<ul class="error">
  @foreach ($errors->all() as $error)

    <li>{{$error}}</li>

    @endforeach

</ul>


{{ Form::label('username') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('E-mail','',['class'=>'mail-label']) }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password', ['class'=>'input']) }}

{{ Form::label('password_confirm','',['class'=>"password_confirm"]) }}
{{ Form::password('password_confirmation',null,['class' => 'input','type'=>'password']) }}

{{ Form::submit('登録',['class'=>'submit']) }}

<p class="register-btn"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

</div>



@endsection
