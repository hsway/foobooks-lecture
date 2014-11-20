@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $book['title'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/book/edit')) }}

		{{ Form::hidden('id',$book['id']); }}

		{{ Form::label('title','Title') }}
		{{ Form::text('title',$book['title']); }}

		{{ Form::label('published','Published Year (YYYY)') }}
		{{ Form::text('published',$book['published']); }}

		{{ Form::label('cover','Cover Image URL') }}
		{{ Form::text('cover',$book['cover']); }}

		{{ Form::label('purchase_link','Purchase Link URL') }}
		{{ Form::text('purchase_link',$book['purchase_link']); }}

		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/book/delete')) }}
			{{ Form::hidden('id',$book['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop