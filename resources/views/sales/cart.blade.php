<h1>Cart Items</h1>

@php
    $firstItem = $items->first();
@endphp

<table  border=1>
<tr>
    <th>Blood Type</th>
    <th>Quantity</th>
</tr>
@foreach($items as $item)

<tr>
    <td>{{$item->blood_type}}</td>
    <td>{{$item->quantity}}</td>
   
</tr>





@endforeach
@if ($firstItem)
<form action="{{route('order',$firstItem->id)}}" method="Get"> 
<td><input type="date" name="order_date"></td>
<td><input type="text" name="delivery_address" placeholder="Delivery Address"></td>
<tr><td colspan="2"><button style="margin-left:35%">Order_Now</button></td></tr>
</form>
@else
    <p>No items available for ordering.</p>
@endif
</table>
