<html>

    <head>
    <!-- <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .ordere{
            margin-bottom: 100px;
            margin-top: 100px;
        }
    </style>
</head>
    <body>
        
        <div class="content">
           <div class="card-body">
                <div class="row">
                    <h2 class="text-center ordere">Order ID # OI-{{ $order->id }} </h2>
                    <div class="clearfix"></div>
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
            @if($order->cart->count() > 0)

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Product Title</th>
                        <th>Product Quantity</th>
                        <th>Unit Price</th>
                        <th>Shipping Charge</th>
                        <th>Total price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total_price = 0;
                    @endphp
                    @foreach($order->cart as $cart)
                        <tr class="text-center">
                            <td>{{ $loop->index +1 }} </td>
                            <td>{{ $cart->product->title }} </td>
                            <td>{{ $cart->product_quantity }}</td>
                            @php
                                $total_price += $cart->product->price  *  $cart->product_quantity + $order->shipping_charge
                            @endphp
                            <td>{{ $cart->product->price }} Tk.</td>
                            <td>{{ $order->shipping_charge }} Tk.</td>
                            <td>{{ $total_price }} Tk.</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
           </div>
        </div>
    </body>
</html>
