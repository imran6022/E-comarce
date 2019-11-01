@extends('layouts.app')

@section('content')
<div class="main margin-top-20">
	<h2>Confirm Items</h2>
	<hr>

	<div class="card card-body">
		
		<div class="row">
            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    @php
                        $total_price = 0;
                    @endphp
                    
                    <tbody>
                        @foreach(App\Cart::totalCarts() as $cart)
                        <tr>
                            <td>{{ $cart->product->title }}</td>
                            <td>{{ $cart->product_quantity }}</td>
                            <td>{{ $cart->product->price }}</td>
                            @php
                                $total_price += $cart->product->price * $cart->product_quantity
                            @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td><strong>Total Price</strong></td>
                            <td><strong>{{ $total_price }} Tk.</strong></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><small><strong>Total Price with shipping cost (shipping cost :{{ App\Settings::first()->shipping_cost }} Tk.)</strong></small></td>
                            <td><strong>{{ $total_price + App\Settings::first()->shipping_cost }} Tk.</strong></td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
            <div class="col-md-5">
                <h3 class="text-center"><u>Terms & Conditions</u></h3>
                <ol>
                    <li>This item is non-returnable</li>
                    <li>Warranty not available</li>
                    <li>You will get your product in Two or three business days.</li>
                    <li>Shipping cost 100 in Dhaka city</li>
                    <li>Quriar avalable out side Dhaka</li>
                </ol>
            </div>
        </div>
		<p class="float-right">
			<a href="{{ route('cart') }} " class="btn btn-warning">Change Product</a>
		</p>

	</div>
	<div class="card card-body">
		<h2>Shipping Address</h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <aler class="alert-danger text-center">
                    {{ $error }}
                </aler>
            @endforeach
        @endif

        @if(session('sticky_error'))
            <aler class="alert-danger text-center">
                    {{ session('sticky_error') }}
                </aler>
        @endif

		<form method="POST" action="{{ route('checkouts.store') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name *') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="name" placeholder="Name">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No *') }}</label>

                <div class="col-md-6">
                    <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" placeholder="Please enter phone no">

                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address ') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Please enter email no">

                </div>
            </div>

            <div class="form-group row">
                <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address *') }}</label>

                <div class="col-md-6">
                    <textarea name="shipping_address" id="" cols="30" rows="3" class="form-control @error('street_address') is-invalid @enderror" name="shipping_address" placeholder="Please enter shipping address"></textarea>
                                
                </div>
            </div>

            <div class="form-group row">
                <label for="street_address" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method *') }}</label>

                <div class="col-md-6">
                    <select name="payment_id" class="form-control" id="payments">
                     <option value="">Select One</option>
                     @foreach($payments as $pname)
                      <option value="{{ $pname->id }}">{{ $pname->name }}</option>
                     @endforeach
                    </select>

                    @foreach($payments as $pname)
                    	<div id="payment">
                    		@if($pname->short_name == 'cash_in')
                    			<div class="hidden alert alert-success mt-2" id="pay_cash">
                    				<h4>
                    					For cash in delivery there is nothing necessary. Just Finish Order.
                    				</h4>
                    				
                    			</div>
                    		@elseif($pname->short_name == 'b_kash')
								<div class="hidden mt-2 alert alert-success" id="pay_bkash">
                    				<h4>{{ $pname->name }} Payment</h4>
                    				<strong>{{ $pname->name }} No : {{ $pname->no }}</strong><br>
                    				<strong>A/c Type : {{ $pname->type }}</strong><br>
                    				<div class="alert alert-success mt-2">
                    					Please send the above money to this Bkash No and write your transaction code belo there.
                    				</div>
                    				
                    				
                    			</div>
                    		@endif
                    	</div>
                    @endforeach
                    <div class="alert alert-success hidden" id="transaction_id">
                        <input id="transaction_id" type="text" class="form-control" name="transaction_id" placeholder="write your transaction code">
                    </div>          
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Order Now') }}
                    </button>
                </div>
            </div>
        </form>
	</div>
</div>

<script>

    $("#payments").change(function(){
    	$pay_method = $("#payments").val();

    	if ($pay_method == 2) {
    		$('#pay_cash').removeClass('hidden');
            $('#pay_bkash').addClass('hidden');
    	}else if ($pay_method == 1){
            $('#pay_bkash').removeClass('hidden');
    		$('#transaction_id').removeClass('hidden');
            $('#pay_cash').addClass('hidden');
    	}
		
	});
</script>
@endsection