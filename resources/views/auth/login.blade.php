@extends('layouts.logout')

@section('content')
<div class="login_form">

{!! Form::open(['action' => 'Auth\LoginController@login']) !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail','',['class'=>'mail-label']) }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン',['class'=>'submit']) }}

<p class="register-btn"><a href="/register">新規</a></p>

{!! Form::close() !!}

</div>

@endsection
