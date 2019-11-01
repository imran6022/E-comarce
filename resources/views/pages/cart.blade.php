@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="main margin-top-20">
				<h5 class="text-center">My Cart Items</h5>
				@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif

				@if(App\Cart::totalItems()>0)

				<table class="table table-bordered">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>Product Title</th>
							<th>Product Image</th>
							<th>Product Quantity</th>
							<th>Unit Price</th>
							<th>Sub total price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php
						$total_price = 0;
						@endphp
						@foreach(App\Cart::totalCarts() as $cart)
							<tr class="text-center">
								<td>{{ $loop->index +1 }}</td>
								<td>
									<a href="{{ route('product.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>
								</td>
								<td>
									@if($cart->product->image->count() > 0)
									<img src="{{ asset('images/product/'. $cart->product->image->first()->image) }}" width="60" alt="">
									@endif
								</td>
								<td>
									<form action="{{ route('cart.update', $cart->id) }}" method="post" class="form-inline">
										@csrf
										<input type="number" name="product_quantity" value="{{ $cart->product_quantity }}" class="form-control w-50">
										<button type="submit" class="btn btn-outline-success ml-1">Update</button>
									</form>
								</td>
								@php
									$total_price += $cart->product->price  *  $cart->product_quantity
								@endphp
								<td>{{ $cart->product->price }} Tk.</td>
								<td>{{ $cart->product->price  *  $cart->product_quantity }} Tk</td>
								<td>
									<form action="{{ route('cart.delete', $cart->id) }}" method="post" class="form-inline">
										@csrf
										<input type="hidden" name="cart_id" value="{{ $cart->id }}">
										<button type="submit" class="btn btn-outline-danger">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
						<tr class="text-center">
							<td colspan="4"></td>
						
							<td><strong>Total Price</strong></td>
							<td><strong>{{ $total_price }} Tk.</strong></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				<div class=" mb-2">
					<a href="{{ route('index') }}" class="btn btn-info">Continue Shopping..</a>
					<a href="{{ route('checkouts') }}" class="float-right btn btn-warning">Order Now</a>
				</div>

				@else
					<div class="alert alert-success">
						<p>There is no item in your cart</p>
					</div>
					<div class="float-right mb-2">
					<a href="{{ route('index') }}" class="btn btn-info">Continue Shopping..</a>
				</div>
				@endif

			</div>
		</div>

	</div>
	
@endsection