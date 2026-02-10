<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt</title>
    <link rel="stylesheet" href="{{asset('asset/css/paymentReciept.css')}}">
</head>
<body>
<div class="container">
    <h1>Transaction Receipt</h1>
   
    <div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Blood Type</th>
                <th>Quantity</th>
                <th>Delivery Address</th>
                <th>Order Date</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

          
    @if(isset($error))
    <div class="message" style="border-left-color: #ff9900;">
        {{ $error }}
    </div>
    @endif
               <?php
                $total = 0;
               ?>
           
            
@foreach ($order as $orders)
    
       
@if($orders && is_object($orders) && isset($orders->blood_inventory))
<tr>
<td>{{$orders->blood_inventory->blood_type}}</td>
<td>{{$orders['quantity']}}</td>
<td>{{$orders['delivery_address']}}</td>
<td>{{$orders['order_date']}}</td>
<td>N{{$orders['price']}}</td>
<td>{{$orders['status']}}</td>
</tr>
@else
<tr>
<td colspan="6">Invalid order data or missing blood inventory</td>
 </tr>
 @endif
 @endforeach  
          
         
</tbody>
</table>
</div>

    <div class="message" style="margin-top: 30px;">
       
        Hello valued <strong>{{ session('data') }}</strong>, you are to pay 
       
        <b>N{{$payment->gross_total ?? '00.0'}}</b> when our delivery team arrives at your destination.
        <p>Thanks!</p>
    
    </div>
    @if(isset($orders) && isset($payment))
  
    @if(!isset($pdf))

    <a id="btn" href="{{ Route('printPdf') }}" onclick="display()">Print Receipt</a>
    
    @endif

    @else
    <h1>You Cant Print An Empty Result</h1>
    
    <a class="btn-secondary" href="{{route('user.dashboard')}}">Back To Dashboard</a>
     
    @endif


   

  

</div>
</body>
</html>
