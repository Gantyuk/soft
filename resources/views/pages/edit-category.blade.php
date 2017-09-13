@extends('layouts.master')

@include('pages.styles')

@section('content')



@include('pages.messages')


	<form action="/admin/categories/{{ $category->id }}" method="POST">
		{{ csrf_field() }}

		<input name="_method" type="hidden" value="PUT">
		<h1>
			<label for="name">Category name:</label>
			<input type="text" value="{{ $category->name }}" name="name" class="form-control">
		</h1>
		<p>Created at: {{ $category->created_at }}</p>
		<p>Updated at: {{ $category->updated_at }}</p>

		<button type="submit" class="btn btn-success create-button">Update</button>

	</form>



@endsection


