@extends('layouts.app')

@section('title')
	{{ 'Product' }}
@endsection

@section('content')
<div class="main margin-top-20">
	<div class="row">
		<div class="col-md-3 pr-0">
			<div class="sidebar">
				@include('inc.product_sidebar')
			</div>
		</div>
		<div class="col-md-9 pl-0">
			@include('inc.slider')
		</div>
	</div>
	<div class="mainPart">
		<div class="widget">
			<h4 class="text-center">All Product in <span class="badge badge-info">{{ $category->name }} Category</span></h4>
			@php
				$products = $category->products()->paginate(3);
			@endphp

			@if($products->count() > 0)
				@include('inc.all_products');
			@else
				No products has added
			@endif
		</div>
	</div>
</div>
@endsection