<h1>Select Product By Blood Bank Of Your Choice</h1>
<h3>These Are Products From <span style="color:red">{{$company->bloodbank->name}}</span></h3>
<table border=1>
    <tr>
    <th>S/N</th>
    <th>Blood Type</th>
    <th>Quantity</th>
    <th>Price (per unit)</th>
    <th>Action</th>    
    <tr>

    @foreach($product as $products)
   <tr>
    <td>{{$products->id}}</td>
    <td>{{$products->blood_type}}</td>
    
    <td>{{$products->quantity}}</td>
    <td>{{$products->price}}</td>
    <td>
    <form action="{{route('customer.add2cart',$products->id)}}" method="Get">
     <input type="number" value="1" min="1" name="quantity">
     <button>AddToCart</button>
    </form>
    </td>
   </tr>
   
    @endforeach
</table>