<form action="{{ route('cart.stote') }}" method="post">
	@csrf
	<input type="hidden" name="product_id" value="{{ $product->id }}">
	<button type="submit" class="btn btn-success btn-sm btn-block">Add to cart</button>
</form>