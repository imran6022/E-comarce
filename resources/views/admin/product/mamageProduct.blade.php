@extends('admin.layouts.app')

@section('content')
<div class="mProduct">
	<a href="{{ route('admin.product_create') }}" class="btn btn-success">Add Product</a>
	@if(session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif
	<table class="table table-striped table-bordered">
		<thead>
			<tr class="text-center">
				<th>#</th>
				<th>Product Title</th>
				<th>Brand</th>
				<th>Category</th>
				<th>Price</th>
				<th>Quantity</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product) 
			<tr class="text-center">
				<td>{{ $product->id }}</td>
				<td>{{ $product->title }}</td>
				<td>{{ $product->brand->name }}</td>
				<td>{{ $product->category->name }}</td>
				<td>{{ $product->price }}</td>
				<td>{{ $product->quantity }}</td>
				<td class="text-center">
					<div class="btn-group">
						<a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success">Edit</a>
						<a href="#deleteModal{{ $product->id }}" class="btn btn-danger" data-toggle="modal">
							  Delete
							</a>

						<div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						      	<h5>Are you sure delete it ? </h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{ route('admin.product.delete', $product->id) }}" method="post">
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
	<div class="link float-right">
		{{ $products->links() }}
	</div>
</div>

@endsection