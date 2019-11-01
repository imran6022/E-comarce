@extends('admin.layouts.app')

@section('content')
<div class="Adpro">
    <div class="card margin-0-auto" style="width: 40rem; margin:0 auto;">
    	<div class="card-header text-center"> Update Product</div>
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
	   <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
	   	{{ csrf_field()}}
		  <div class="form-group">
		    <label for="exampleInputEmail1">Title</label>
		    <input type="text" name="title" class="form-control" value="{{ $product->title }}" >
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Description</label>
		    <textarea name="description" class="form-control" id="" >{{ $product->description }}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Price</label>
		    <input type="number" name="price" class="form-control"  value="{{ $product->price }}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Quantity</label>
		    <input type="number" name="quantity" class="form-control"  value="{{ $product->quantity }}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Category </label>
		    <select name="category_id" class="form-control" id="">
		    	<option value="">Selet</option>
		    	@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
		    	<option value="{{ $parent->id }}" {{ $parent->id == $product->category->id ? 'selected' : '' }}>{{ $parent->name }}</option>

		    	@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id  )->get() as $child)
				<option value="{{ $child->id }}" {{ $child->id == $product->category->id ? 'selected' : '' }}>-->{{ $child->name }}</option>
		    	@endforeach
		    	
		    	@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">brand </label>
		    <select name="brand_id" class="form-control" id="">
		    	<option value="">Select</option>
		    	@foreach(App\Brand::orderBy('id', 'desc')->get() as $br)
		    	<option value="{{ $br->id }}" {{ $br->id == $product->brand->id ? 'selected' : '' }}>{{ $br->name }}</option>
		    	@endforeach
		    </select>
		  </div>
		  <button type="submit" class="btn btn-primary float-right">Update</button>
		  <a href="{{ route('admin.product') }}" class="btn btn-primary">Back</a>
		</form>
	  </div>
	</div>
</div>
@endsection