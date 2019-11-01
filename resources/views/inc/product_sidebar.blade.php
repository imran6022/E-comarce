<div class="card-body pr-0">
	<h4 class="text-center text-uppercase" style="color:#fff;">Categories</h4>
	@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
		<a href="#main-{{ $parent->id }} " data-toggle="collapse" class="list-group-item list-group-item-action">
			<!-- <img src="{{ asset('images/category/'. $parent->image) }}" width="50" alt=""> -->
			{{ $parent->name }} ->>
		</a>
		<div class="collapse
		@if(Route::is('admin.categorys.show'))
			@if(App\Category::ParentOrNorCategory($parent->id, $category->id))
				show
			@endif
		@endif
		" id="main-{{ $parent->id }}" >
			<div class="chaild">
				@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id  )->get() as $child)
					<a href="{{ route('admin.categorys.show', $child->id) }}" class="bg-sidemenu text-center list-group-item list-group-item-action
						@if(Route::is('admin.categorys.show'))
							@if($child->id == $category->id)
								active
							@endif
						@endif
						">
						<!-- <img src="{{ asset('images/category/'. $child->image) }}" width="40" alt=""> -->
						{{ $child->name }} ->>
					</a>
				@endforeach
			</div>
			
		</div>

	@endforeach
</div>