@extends('layouts.logout')

@section('content')

{!! Form::open(['action' => 'Auth\LoginController@login']) !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規</a></p>

{!! Form::close() !!}

@endsection
