@extends('layouts.master')

@include('pages.styles')

@section('content')


	<p>Page title:</p>
	<h1>{{ $page->name }}</h1>
	<p>URL: {{ $page->url }}</p>
	<p>Category: {{ $page->category['name'] }}</p>
	<p>Body: {!! $page->body !!}</p>
	<p>Created at: {{ $page->created_at }}</p>
	<p>Updated at: {{ $page->updated_at }}</p>




@endsection