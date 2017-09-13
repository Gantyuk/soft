@extends('layouts.master')

@include('pages.styles')

@section('content')

<h1 class="font-bold">Create Content</h1>


@include('pages.messages')


	<form action="/admin/pages" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Page</label>
			<input type="text" name="name" class="form-control">
		</div>

		<div class="form-group">
			<label for="url">Url</label>
			<input type="text" name="url" class="form-control">
		</div>	

		<div class="form-group">
			<label for="category_id">Category</label>
			<select type="text" name="category_id" class="form-control">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>	

		<div class="form-group">
			<label for="body">Body</label>
			<textarea class="form-control" name="body" rows="3"></textarea>
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