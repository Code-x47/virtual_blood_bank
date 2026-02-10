<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at top left, #ff4e50, transparent),
            radial-gradient(circle at bottom right, #9a0007, transparent),
            linear-gradient(135deg, #b31217 0%, #3a0d0d 100%);
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            min-height: 500px;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: #fff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 300;
        }

        .header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .content {
            padding: 40px 30px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .back-button:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        /* Responsive Table Styles */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            min-width: 800px;
        }

        .order-table th {
            background: linear-gradient(135deg, #343a40 0%, #495057 100%);
            color: #fff;
            padding: 15px 10px;
            text-align: center;
            font-weight: 600;
            font-size: 0.95rem;
            white-space: nowrap;
            border-right: 1px solid #495057;
        }

        .order-table th:last-child {
            border-right: none;
        }

        .order-table td {
            padding: 15px 10px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
            font-size: 0.9rem;
        }

        .order-table td:last-child {
            border-right: none;
        }

        .order-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .order-table tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }

        .cancel-link {
            color: #dc3545;
            text-decoration: none;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .cancel-link:hover {
            background-color: #dc3545;
            color: #fff;
        }

        .total {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: #fff;
            padding: 25px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-radius: 10px;
            margin: 30px 0;
        }

        .payment-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .payment-btn {
            flex: 1;
            min-width: 200px;
            padding: 15px 25px;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .payment-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,123,255,0.3);
        }

        .payment-btn.paypal {
            background: linear-gradient(135deg, #0070ba 0%, #003087 100%);
        }

        .payment-btn.paypal:hover {
            box-shadow: 0 10px 20px rgba(0,112,186,0.3);
        }

        .card-pay,.pod  {
            color: #ffff;
            text-decoration: none;
        }

        /* Mobile Card Layout */
        .mobile-cards {
            display: none;
        }

        .order-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
            border-left: 4px solid #007bff;
        }

        .order-card .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .order-card .blood-type {
            font-size: 1.2rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .order-card .price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #27ae60;
        }

        .order-card .card-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .order-card .info-item {
            display: flex;
            flex-direction: column;
        }

        .order-card .info-label {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 2px;
        }

        .order-card .info-value {
            font-size: 0.9rem;
            color: #333;
            font-weight: 500;
        }

        .order-card .card-actions {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            text-align: right;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .header {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .content {
                padding: 20px 15px;
            }

            /* Hide table on mobile */
            .table-wrapper {
                display: none;
            }

            /* Show mobile cards */
            .mobile-cards {
                display: block;
            }

            .payment-options {
                flex-direction: column;
                gap: 12px;
            }

            .payment-btn {
                min-width: unset;
                flex: none;
                width: 100%;
            }

            .total {
                font-size: 1.3rem;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.8rem;
            }

            .header p {
                font-size: 1rem;
            }

            .back-button {
                font-size: 0.9rem;
                padding: 10px 16px;
            }

            .content {
                padding: 20px 10px;
            }

            .order-card {
                padding: 15px;
            }

            .order-card .card-body {
                grid-template-columns: 1fr;
            }
        }

        /* Tablet adjustments */
        @media (min-width: 769px) and (max-width: 1024px) {
            .order-table {
                min-width: 700px;
            }

            .order-table th,
            .order-table td {
                padding: 12px 8px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💳 Payment Page</h1>
            <p>Hello Hello {{ session('data') }} 👋 You Can Now Make Payment</p>
        </div>
        
        <div class="content">
            <a href="{{ route('user.dashboard') }}" class="back-button">
                ← Back
            </a>

            @php
                $total = 0;
                $user_order = $order->first();
            @endphp

            <!-- Desktop/Tablet Table View -->
            <div class="table-wrapper">
                <table class="order-table">
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
                        @foreach($order as $orderItem)
                        <tr>
                            <td><strong>{{ $orderItem->blood_inventory->blood_type }}</strong></td>
                            <td>{{ $orderItem->blood_inventory->id }}</td>
                            <td>{{ $orderItem['quantity'] }}</td>
                            <td>{{ $orderItem['delivery_address'] }}</td>
                            <td>{{ $orderItem['order_date'] }}</td>
                            <td><strong>₦{{ number_format($orderItem['price'], 2) }}</strong></td>
                            <td>{{ $orderItem['status'] }}</td>
                            <td>
                                <a class="cancel-link" href="{{route('customer.cancel_order',$orderItem->id)}}">
                                    Cancel
                                </a>
                            </td>
                        </tr>
                        @php
                            $total += $orderItem->price;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card View -->
            <div class="mobile-cards">
                @foreach($order as $order)
                <div class="order-card">
                    <div class="card-header">
                        <div class="blood-type">{{ $order->blood_inventory->blood_type }}</div>
                        <div class="price">₦{{ number_format($order['price'], 2) }}</div>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="info-label">Inventory ID</div>
                            <div class="info-value">{{ $order->blood_inventory->id }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Quantity</div>
                            <div class="info-value">{{ $order['quantity'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Delivery Address</div>
                            <div class="info-value">{{ $order['delivery_address'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Order Date</div>
                            <div class="info-value">{{ $order['order_date'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Status</div>
                            <div class="info-value">{{ $order['status'] }}</div>
                        </div>
                    </div>
                    <div class="card-actions">
                        <a class="cancel-link" href="{{route('customer.cancel_order',$order->id)}}">
                            Cancel Order
                        </a>
                    </div>
                </div>
               
                @endforeach 
            </div>

            <!-- Total Section -->
            <div class="total">
                Total: ₦{{ number_format($total, 2) }}
                
            </div> 

            <!-- Payment Options -->
            <div class="payment-options">
                <button class="payment-btn">
                 <a class="card-pay" href="{{ route('order.card_pay', $total) }}">
                    💳 Pay with Card
                 </a>
                </button>
                <button class="payment-btn paypal">
                 <a class="pod" href="{{ route('order.pod', $total) }}">
                    🟦 Pay On Delivery
                  </a>
                </button>
            </div>
        </div>
    </div>
</body>
</html>