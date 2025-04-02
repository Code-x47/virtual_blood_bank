<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Reciept</title>
    <style>
    @media print {
        #btn {
            display: none !important;
        }
    }
</style>
</head>
<body>
    

<table border=1>
<tr>
    <th>Blood Type</th>
    <th>Quantity</th>
    <th>Delivery Address</th>
    <th>Order Date</th>
    <th>Price</th>
    <th>Status</th>
</tr>


@foreach($order as $order) 

<tr>
<td>{{$order->blood_inventory->blood_type}}</td>
<td>{{$order['quantity']}}</td>
<td>{{$order['delivery_address']}}</td>
<td>{{$order['order_date']}}</td>
<td>{{$order['price']}}</td>
<td>{{$order['status']}}</td>
</tr>

@endforeach

</table>
<br><br>
@if(!$payment->isEmpty())
Hello Valued  {{session('data')}} You Are To Pay <b style="color:red; font-style:bold">N{{$payment->first()->gross_total}}</b> When Our Delivery Team arrives your destination. <p>Thanks</p>

@else
<p>No Payment Record Available</p>

@endif

@if(!isset($pdf))
<a id="btn" href="{{Route('printPdf')}}" onclick="display()">Print Reciept</a>
@endif





</body>
</html>