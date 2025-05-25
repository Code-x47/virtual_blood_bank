<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 30px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        .total {
            text-align: right;
            font-size: 1.3rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .payment-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .payment-options a {
            padding: 12px 25px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .payment-options a:hover {
            background-color: #0056b3;
        }

        .no-items {
            text-align: center;
            color: #dc3545;
            font-weight: bold;
        }

  .back-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6c757d;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #5a6268;
}

    </style>
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

