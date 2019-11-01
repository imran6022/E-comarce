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
					<h4 class="text-center text-uppercase">Search Product for <span class="badge badge-primary">{{ $search }}</span></h4>
					<div class="row">
						@foreach($products as $product)
						<div class="col-md-2">
							<div class="card" style="width: 12rem;">
								@php $i = 1; @endphp
								@foreach($product->image as $image)
									@if($i>0)
							  			<a href="{{ route('product.show', $product->slug) }}">
							  				<img src="{{ url('images/product/'. $image->image) }}" class="card-img-top img-fluid" alt="{{ $product->title }}">
							  			</a>
							  		@endif
							  		@php $i--; @endphp
							  	@endforeach
							  <div class="card-body">
							  	<a href="{{ route('product.show', $product->slug) }}">
							    	<h6 class="card-title">{{ $product->title }}</h6>
							    </a>
							    <p class="card-text">Tk. {{ $product->price }}</p>
							    <a href="#" class="btn btn-outline-success">Add to cart</a>
							  </div>
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
</div>
@endsection