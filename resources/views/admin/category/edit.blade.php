@extends('admin.layouts.app')

@section('content')
<div class="Adpro">
    <div class="card margin-0-auto" style="width: 40rem; margin:0 auto;">
    	<div class="card-header"> Add 	Category</div>
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
	   <form action="{{ route('admin.category.update', $categorys->id) }}" method="post" enctype="multipart/form-data">
	   	@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Category Name</label>
		    <input type="text" name="name" class="form-control" value="{{ $categorys->name }}" >
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Description</label>
		    <textarea name="description" class="form-control" id="">{{ $categorys->description }}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Parent Category </label>
		    <select name="parent_id" class="form-control" id="">
		    	<option value="">Select</option>
		    	@foreach($mainCategory as $cat)
		    		<option value="{{ $cat->id }}" {{ $cat->id == $categorys->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
		    	@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Photo</label>
		    <img src="{{ url('images/category/'.$categorys->image) }}" alt="" width="100px">
		    <input type="file" name="image"  class="form-control">
		  </div>
		  <button type="submit" class="btn btn-primary float-right">Update</button>
		  <a href="{{ route('admin.category') }}" class="btn btn-primary">Back</a>
		</form>
	  </div>
	</div>
</div>
@endsection