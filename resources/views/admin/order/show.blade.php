@extends('admin.layouts.app')

@section('content')
<div class="content">
   <div class="card-body">
        <h2 class="text-center">View Order # OI-{{ $order->id }} </h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Order Information</h3>
                <p><strong>Order Name : </strong>{{ $order->name }}</p>
                <p><strong>Phone No : </strong>{{ $order->phone_no }}</p>
                <p><strong>Email : </strong>{{ $order->email }}</p>
                <p><strong>Shipping Address : </strong>{{ $order->shipping_address }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Order Payment Method : </strong>{{ $order->payment->name }}</p>
                <p><strong>Order Payment Transaction : </strong>{{ $order->transaction_id }}</p>
            </div>
            
        </div>
        <hr>
        <h3>Order Items</h3>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('errors'))
        <div class="alert alert-ganger">
                {{ session('errors') }}
            </div>
        @endif

        @if($order->cart->count() > 0)

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
            @foreach($order->cart as $cart)
                <tr class="text-center">
                    <td>{{ $loop->index +1 }} </td>
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
            <hr>
            <form action="{{ route('admin.order.charge', $order->id) }}" method="post">
                 @csrf
                 <label for="">Shipping Charge : </label>
                 <input type="number" name="shipping_charge" value="{{ $order->shipping_charge }}" class="form-control w-50">
                 <br>
                 <label for="">Custom Discount : </label>
                 <input type="number" name="custom_discount" value="{{ $order->custom_discount }}" class="form-control w-50"><br>
                <button type="submit" class="btn btn-outline-success">Update</button>
            </form>

            <tr class="text-center">
                <td colspan="4"></td>
                        
                <td><strong>Total Price</strong></td>
                <td><strong>{{ $total_price }} Tk.</strong></td>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    <hr>
    <div class="float-right">
        <form action="{{ route('admin.order.complete', $order->id) }}" class="form-inline" style="display: inline-block" method="post">
            @csrf
            @if($order->is_compleed)
            <input type="submit" class="btn btn-danger" value="Cancle Order">
            @else
            <input type="submit" class="btn btn-success" value="Completed Order">
            @endif
        </form>
        <form action="{{ route('admin.order.paid', $order->id) }}" class="form-inline" style="display: inline-block" method="post">
            @csrf
            @if($order->is_paid)
            <input type="submit" class="btn btn-danger" value="Cancle Payment">
            @else
            <input type="submit" class="btn btn-success" value="paid">
            @endif
        </form>
    </div>
    <a href="{{ route('admin.order.invoice', $order->id) }}" target="_blank" class="btn btn-info">Generate Invoice</a>
   </div>
</div>
@endsection