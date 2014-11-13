@extends('_master')

@section('title')
	Books
@stop

@section('content')

<h1>Log in</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop