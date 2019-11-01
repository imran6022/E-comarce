@extends('layouts.app')

@section('content')
	<div class="main margin-top-20">
		<div class="row">

			<div class="col-md-3 pr-0">
				<div class="sidebar">
					@include('inc.product_sidebar')
				</div>
			</div>
			
			<div class="col-md-9 pl-0">
				<div class="mainPart">

					@if(session('success'))
					    <div class="alert alert-success">
					        {{ session('success')}}
					    </div>
					 @endif
					
					@include('inc.slider')
				</div>
			</div>
		</div>

		<div class="mainbody">
			<h4 class="text-center text-uppercase">Featured Product</h4>
			@include('inc.all_products')
		</div>

		<div class="pagination float-right">
			{{ $products->links() }}
		</div>
		
	</div>
@endsection