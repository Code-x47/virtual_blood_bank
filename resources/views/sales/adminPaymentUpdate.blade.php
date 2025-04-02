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
       
        <form action="{{Route('admin.update_payment')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$pay['id']}}">
            
            <label for="quantity">Amount:</label>
            <input type="number" id="amount" name="amount" value="{{$pay->amount}}">
            
            
           
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" value="{{$pay['payment_method']}}">
                <option value="credit_card">Credit Card</option>
                <option value="debit_card">Debit Card</option>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cash_on_delivery">Cash On Delivery</option>
            </select>

            <label for="payment_status">Payment Status:</label>
            <select id="payment_status" name="payment_status" value="{{$pay['payment_status']}}">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="failed">Failed</option>
            </select>
            
            
            <button type="submit">Update Payment</button>
        </form>
    </div>
</body>
</html>
