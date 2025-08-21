<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('asset/css/adminPaymentUpdate.css')}}">
    <title>Update Order</title>
    <style>
        
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
