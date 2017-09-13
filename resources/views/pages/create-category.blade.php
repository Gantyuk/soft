@extends('layouts.master')

@include('pages.styles')

@section('content')

<h1 class="font-bold">Create Category</h1>


@include('pages.messages')


	<form action="/admin/categories" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Category Name</label>
			<input type="text" name="name" class="form-control">
		</div>

		<button type="submit" class="btn btn-success create-button">Create</button>	

	</form>

@endsection


@section('scripts')

<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>

<script>
	CKEDITOR.replace("body");
</script>

@endsection