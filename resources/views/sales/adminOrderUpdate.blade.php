<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Order</h2>
       
        <form action="{{route('admin.update_order')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$order['id']}}">
            
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{$order->quantity}}">
            
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="{{$order['price']}}">
            
            <label for="delivery_address">Delivery Address:</label>
            <input type="text" id="delivery_address" name="delivery_address" value="{{$order['delivery_address']}}">
            
            
            <label for="order_status">Order Status:</label>
            <select id="order_status" name="order_status" value="{{$order['status']}}">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            
            <button type="submit">Update Order</button>
        </form>
    </div>
</body>
</html>
