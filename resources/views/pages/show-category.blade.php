@extends('layouts.master')

@include('pages.styles')

@section('content')


	<p>Category Name:</p>
	<h1>{{ $category->name }}</h1>
	<p>Created at: {{ $category->created_at }}</p>
	<p>Updated at: {{ $category->updated_at }}</p>




@endsection