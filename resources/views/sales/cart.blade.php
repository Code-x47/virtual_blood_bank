<h1>Cart Items</h1>
<table  border=1>
<tr>
    <th>Blood Type</th>
    <th>Quantity</th>
    <th>Action</th>
   
</tr>
@foreach($items as $item)
<tr>
    <td>{{$item->blood_type}}</td>
    <td>{{$item->quantity}}</td>
    <td>Action</td>
   
</tr>
@endforeach
</table>