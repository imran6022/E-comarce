@extends('admin.layouts.app')

@section('content')
<div class="category">
	<h2 class="text-center">Manage Category</h2>
	<a href="{{ route('admin.category.create') }}" class="btn btn-primary" >Add Category</a>
	@if(session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Category Name</th>
				<th>Parent Category</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categorys as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td>
					@if($category->parent_id == NULL)
					Primary Category
					@else
					{{ $category->parent->name }}
					@endif
				</td>
				<td>
					<img src="{{ url('images/category/'.$category->image) }}" alt="" width="100px">
				</td>

				<td class="text-center">
					<div class="btn-group">
						<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-success">Edit</a>

						<a href="#deleteModal{{ $category->id }}" class="btn btn-danger" data-toggle="modal">
							  Delete
							</a>

						<div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						      	<h5>Are you sure delete it ? </h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
						        	@csrf
						        	<button type="submit" class="btn btn-danger">delete</button>
						        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        </form>
						      </div>
						    </div>
						  </div>
						</div>
						
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="link">
		{{ $categorys->links() }}
	</div>
</div>
@endsection