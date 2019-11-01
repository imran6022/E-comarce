@extends('layouts.app')

@section('title')
{{ $product->title }}
@endsection

@section('content')
<div class="main margin-top-20">
	@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
	<div class="row">
		
		<div class="col-md-4">

			<div class="slidershow">
				
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
					@php $i = 1; @endphp
				  	@foreach($product->image as $images)
				    <div class="carousel-item {{ $i == 1 ? 'active': '' }}">
				      <img src="{{ asset('images/product/'. $images->image) }}" class="d-block w-100" alt="...">
				    </div>
				    @php $i++; @endphp
					@endforeach

				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
				
			</div>
		</div>
		<div class="col-md-5">
			<div class="mainPart">
				<div class="widget">
					<div class="alert alert-secondary">
						<h4 class="text-uppercase">Model : {{ $product->title }} </h4>
					</div>
					<div class="alert alert-secondary">
						<h5 class=" text-uppercase">Price : {{ $product->price }} Tk. 
							<span class="badge badge-info" >
								{{ $product->quantity < 1 ? ' Stock out': $product->quantity. ' in stock'}}
							</span>
						</h5>
					</div>
					<div class="alert alert-secondary mb-5">
						Product Code : <span class="badge badge-info">{{ $product->slug }}</span><br>
						Brabd : <span class="badge badge-info">{{ $product->brand->name }}</span>
					</div>
					
					<ul class="form-inline ">
						
						<form action="{{ route('cart.stote') }}" method="post">
							@csrf
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							<button type="submit" class="btn btn-success btn-addcart">Add to cart</button>
						</form>
					</ul>
					
					
				</div>
			</div>
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="ad-discrip mt-4 ml-3">
			<div class="colaps">
				
					
				<p>
			  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
			    Descriptions
			  </a>
			</p>
			<div class="collapses" id="collapseExample">
			  <div class="card card-body">
			    <p>{{ $product->description }}</p>
			  </div>
			</div>

			</div>
		</div>
	</div>
</div>
@endsection