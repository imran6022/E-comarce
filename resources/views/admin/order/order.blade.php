@extends('admin.layouts.app')

@section('content')
<div class="content">
    <h2 class="text-center">Customers Order Table</h2>
    <table class="table table-bordered">
    	<thead>
    		<tr class="text-center">
                <th>#</th>
    			<th>Order ID</th>
    			<th>Order Name</th>
    			<th>Phone No</th>
    			<th>Order Status</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($Orders as $order)
    		<tr class="text-center">
                <td>{{ $loop->index +1 }}</td>
    			<td>OI-{{ $order->id }}</td>
    			<td>{{ $order->name }}</td>
    			<td>{{ $order->phone_no }}</td>
    			<td>
                    <p class="btn-group">
                        @if($order->is_seenb_by_admin) 
                        <button type="button" class="btn btn-success btn-sm">Seen</button>
                        @else
                        <button type="button" class="btn btn-warning btn-sm">Unseen</button>
                        @endif
                        
                        @if($order->is_paid) 
                        <button type="button" class="btn btn-success btn-sm">Paid</button>
                        @else
                        <button type="button" class="btn btn-danger btn-sm">Unpaid</button>
                         @endif

                        @if($order->is_compleed) 
                        <button type="button" class="btn btn-success btn-sm">Completed</button>
                        @else
                        <button type="button" class="btn btn-warning btn-sm">Uncompleted</button>
                        @endif
                       
                    </p>        
                </td>
    			<td>
                    <div class="btn-group">
                        <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </div>         
                </td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
</div>
@endsection