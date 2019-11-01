@extends('admin.layouts.app')

@section('content')
<div class="brand">
	<h2 class="text-center">Manage Brand</h2>
	<a href="{{ route('admin.brand.create') }}" class="btn btn-primary" >Add Brand</a>
	@if(session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Brand Name</th>
				<th>Desctiption</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($brands as $brand)
			<tr>
				<td>{{ $brand->id }}</td>
				<td>{{ $brand->name }}</td>
				<td>{{ $brand->description }}</td>
				<td>
					<img src="{{ asset('images/brand/'. $brand->image) }}" alt="" width="100px">
				</td>

				<td class="text-center">
					<div class="btn-group">
						<a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-success">Edit</a>

						<a href="#deleteModal{{ $brand->id }}" class="btn btn-danger" data-toggle="modal">
							  Delete
							</a>

						<div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						      	<h5>Are you sure delete it ? </h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{ route('admin.brand.delete', $brand->id) }}" method="post">
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
	<div class="pagination">
		{{ $brands->links() }}
	</div>
	</div>
</div>
@endsection