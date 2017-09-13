@extends('layouts.master')

@include('pages.styles')

@section('content')



@include('pages.messages')


<form action="/admin/pages/{{ $page->id }}" method="POST">
	{{ csrf_field() }}

	<input name="_method" type="hidden" value="PUT">
	<h1>
		<label for="name">Page title:</label>
		<input type="text" value="{{ $page->name }}" name="name" class="form-control">
	</h1>
	<p>
		<label for="url">URL</label>
		<input type="text" value="{{ $page->url }}" name="url" class="form-control">
	</p>
	<p>
		<label for="category_id">Category</label>
		<select type="text" name="category_id" class="form-control">
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
	</p>
	<textarea name="body" id="" cols="30" rows="10">
		{{ $page->body }}
	</textarea>
	<p>Created at: {{ $page->created_at }}</p>
	<p>Updated at: {{ $page->updated_at }}</p>

	<button type="submit" class="btn btn-success create-button">Update</button>

</form>





@endsection


@section('scripts')

<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>

<script>
	CKEDITOR.replace("body");
</script>

@endsection