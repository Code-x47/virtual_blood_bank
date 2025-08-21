<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('asset/css/adminOrderUpdate.css')}}">
    <title>Update Order</title>
    
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
