<div class="row">
	@foreach($products as $product)
	<div class="col-md-2">
		<div class="card product_hover" style="width: 12rem;">
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
						
					@include('inc.cart_botton')
				</div>
		</div>
	</div>
	@endforeach
</div>