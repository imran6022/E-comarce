@extends('admin.layouts.app')

@section('content')
<div class="Adpro">
    <div class="card margin-0-auto" style="width: 40rem; margin:0 auto;">
    	<div class="card-header"> Add Product</div>
	  <div class="card-body">
	  	@if ($errors->any())
		    <div class="alert alert-danger">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	   <form action="{{ route('admin.product_store') }}" method="post" enctype="multipart/form-data">
	   	{{ csrf_field()}}
		  <div class="form-group">
		    <label for="exampleInputEmail1">Product Title</label>
		    <input type="text" name="title" class="form-control"  placeholder="Product Title">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Description</label>
		    <textarea name="description" class="form-control" id="" placeholder="Product Description"></textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Price</label>
		    <input type="number" name="price" class="form-control"  placeholder="Product Price">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Quantity</label>
		    <input type="number" name="quantity" class="form-control"  placeholder="Product Quantity">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Category </label>
		    <select name="category_id" class="form-control" id="">
		    	<option value="">select Category</option>
		    	@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
		    	<option value="{{ $parent->id }}">{{ $parent->name }}</option>

		    	@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id  )->get() as $child)
				<option value="{{ $child->id }}">-->{{ $child->name }}</option>
		    	@endforeach
		    	
		    	@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">brand </label>
		    <select name="brand_id" class="form-control" id="">
		    	<option value="">select Brand</option>
		    	@foreach($brands as $brand)
		    	<option value="{{ $brand->id }}">{{ $brand->name }}</option>
		    	@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Photo</label>
		    <input type="file" name="image[]" class="form-control">
		    <input type="file" name="image[]" class="form-control">
		    <input type="file" name="image[]" class="form-control">
		  </div>
		  <button type="submit" class="btn btn-primary float-right">Submit</button>
		  <a href="{{ route('admin.product') }}" class="btn btn-primary">Back</a>
		</form>
	  </div>
	</div>
</div>
@endsection