<ul>
@foreach($summary as $order)
<li>
Email: {{$order['email']}},|
Quantity: {{$order['quantity']}},|
Type: {{$order['type']}},|
Blood Bank: {{$order['blood_bank']}}
</li>
@endforeach
</ul>