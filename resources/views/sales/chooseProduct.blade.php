<h1>Select Product By Blood Bank Of Your Choice</h1>
<h3>These Are Products From <span style="color:red">{{$company->bloodbank->name}}</span></h3>
<table border=1>
    <tr>
    <th>S/N</th>
    <th>Blood Type</th>
    <th>Quantity</th>
    <th>Action</th>    
    <tr>

    @foreach($product as $products)
   <tr>
    <td>{{$products->id}}</td>
    <td>{{$products->blood_type}}</td>
    <td>{{$products->quantity}}</td>
    <td>Add To Cart</td>

   </tr>

    @endforeach
</table>