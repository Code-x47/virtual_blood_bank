

<table border=1>
<tr>
    <th>Blood Type</th>
    <th>Quantity</th>
    <th>Delivery Address</th>
    <th>Order Date</th>
    <th>Price</th>
    <th>Order_Status</th>
</tr>



@foreach ($order as $order)
    
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

Hello Valued  {{session('data')}} You Are To Pay <b style="color:red; font-style:bold">N{{$payment->gross_total}}</b> When Our Delivery Team arrives your destination. <p>Thanks</p>

@if(!isset($pdf))
<a id="btn" href="{{Route('printPdf')}}" onclick="display()">Print Reciept</a>
@endif
