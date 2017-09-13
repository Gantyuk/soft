@extends('layouts.master')

@include('pages.styles')

@section('content')

@include('pages.messages')


<div class="text-center">
	<a href="{{ url('admin/categories/create') }}"><button class="btn btn-success btn-lg new-page-btn">Add new category</button></a>
</div>

<table class="table table-striped pages-table">


	<tr>
		<td>#</td>
		<td>Category Name</td>
		<td>created at</td>
		<td>updated at</td>
		<td></td>
	</tr>

	<tr>
		<td></td>
		<td>
			<form action="/admin/categories/search" method="POST">
				{{ csrf_field() }}
				<div class="col-md-9">
					<input type="text" name="search" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Search</button>
			</form>
		</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>

	@for($i = 0; $i < count($categories); $i++)

		<tr>
			<td>{{ $i + 1 }}</td>
			<td>
				<a href="{{ url('/admin/categories/' . $categories[$i]->id ) }}">{{ $categories[$i]->name }}</a>
			</td>
			<td>{{ $categories[$i]->created_at }}</td>
			<td>{{ $categories[$i]->updated_at }}</td>			
			<td>
				<a href="{{ url('/admin/categories/' . $categories[$i]->id . '/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

				<form action="/admin/categories/{{ $categories[$i]->id }}" method="POST" class="delete-form" id="delete-form-{{ $categories[$i]->id }}">
					{{ csrf_field() }}
					<input name="_method" type="hidden" value="DELETE">
					<i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#myModal" data-delete-id="{{ $categories[$i]->id }}"></i>
				</form>

				<a href="{{ url('/admin/categories/' . $categories[$i]->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
			</td>

		</tr>

	@endfor



{{--	@foreach($pages as $page)
		<tr>
			<td></td>
			<td>{{ $page->name }}</td>
			<td>{{ $page->category_id }}</td>
			<td></td>
		</tr>
	@endforeach--}}
</table>


{{-- var_dump($pages) --}}

@endsection





@section('scripts')



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm delete</h4>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger delete-button">Delete</button>
      </div>
    </div>
  </div>
</div>



<script>
	$('.fa-trash-o').click(function(){
		deleteId = $(this).data('delete-id');
		// alert(deleteId);
		$('.delete-button').attr('data-delete-id', deleteId);
	});

	$('.delete-button').click(function(){
		// alert('test');
		deleteId = $(this).data('delete-id');
		$('#delete-form-' + deleteId).submit();			
	});

</script>

@endsection


