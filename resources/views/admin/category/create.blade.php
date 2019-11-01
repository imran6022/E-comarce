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
	   <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
	   	@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Category Name</label>
		    <input type="text" name="name" class="form-control"  placeholder="Category Name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Description</label>
		    <textarea name="description" class="form-control" id="" placeholder="Category Description"></textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Parent Category </label>
		    <select name="parent_id" class="form-control" id="">
		    	<option value="">select</option>
		    	@foreach($mainCategory as $Category)
		    	<option value="{{ $Category->id }}">{{ $Category->name }}</option>
		    	@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Photo</label>
		    <input type="file" name="image" class="form-control">
		  </div>
		  <button type="submit" class="btn btn-primary float-right">Submit</button>
		  <a href="{{ route('admin.category') }}" class="btn btn-primary">Back</a>
		</form>
	  </div>
	</div>
</div>
@endsection