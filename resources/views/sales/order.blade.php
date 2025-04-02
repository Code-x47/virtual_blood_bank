<h1>Hello {{session('data')}} You Can Now Make Payment</h1>

<?php
$total = 0;

?>

@php
$user_order = $order->first();
@endphp

<table border=1>
<tr>
    <th>Blood Type</th>
    <th>Quantity</th>
    <th>Delivery Address</th>
    <th>Order Date</th>
    <th>Price</th>
    <th>Order_Status</th>
</tr>


<tr>
@foreach($order as $order) 
<tr>
<td>{{$order->blood_inventory->blood_type}}</td>
<td>{{$order['quantity']}}</td>
<td>{{$order['delivery_address']}}</td>
<td>{{$order['order_date']}}</td>
<td>{{$order['price']}}</td>
<td>{{$order['status']}}</td>
</tr>
<?php
$total = $total + $order->price;
?>
@endforeach

</table>

<h1>Total: N{{$total}}</h1>
@if($user_order)
<span><button><a href="{{route('order.card_pay',$total)}}" style="text-decoration:none">Pay Using Card</a></button></span>
<span><button><a href="{{route('order.pod',$total)}}" style="text-decoration:none">Pay On Delivery</a></button></span>
@else
    <p>No items available for Payment.</p>
@endif