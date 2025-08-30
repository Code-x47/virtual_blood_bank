<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
       <link rel="stylesheet" href="{{asset('asset/css/order.css')}}">
</head>
<body>

    <h1>Hello {{ session('data') }} 👋 You Can Now Make Payment</h1>

    @php
        $total = 0;
        $user_order = $order->first();
    @endphp

    <table>
        <thead>
            <tr>
                <th>Blood Type</th>
                <th>Inventory Id</th>
                <th>Quantity</th>
                <th>Delivery Address</th>
                <th>Order Date</th>
                <th>Price</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $order)
                <tr>
                    <td>{{ $order->blood_inventory->blood_type }}</td>
                    <td>{{ $order->blood_inventory->id }}</td>
                    <td>{{ $order['quantity'] }}</td>
                    <td>{{ $order['delivery_address'] }}</td>
                    <td>{{ $order['order_date'] }}</td>
                    <td>N{{ $order['price'] }}</td>
                    <td>{{ $order['status'] }}</td>
                    <td><a style="color:red; text-decoration:none;" href="{{route('customer.cancel_order',$order->id)}}">Cancel</a></td>
                </tr>
                @php
                    $total += $order->price;
                @endphp
            @endforeach
        </tbody>
    </table>

    <div class="total">Total: N{{ $total }}</div>

    @if($user_order)
        <div class="payment-options">
            <a href="{{ route('order.card_pay', $total) }}">Pay Using Card</a>
            <a href="{{ route('order.pod', $total) }}">Pay On Delivery</a>
        </div>
    @else
        <p class="no-items">No items available for Payment.</p>
    @endif

    <div style="text-align: center; margin-top: 40px;">
    <a href="{{ route('user.dashboard') }}" class="back-button">⬅ Back to Dashboard</a>
   </div>


</body>
</html>

