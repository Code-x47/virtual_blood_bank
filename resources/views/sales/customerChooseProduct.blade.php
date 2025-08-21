<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('asset/css/customerChooseProduct.css')}}">
    <title>Select Product</title>
    
</head>
<body>
@include('sweetalert::alert')
      
      <h1>Select Product By Blood Bank Of Your Choice</h1>
        
        @if($company)
        <h3>These Are Products From <span>{{$company->bloodbank->name}}</span></h3>
        @else
        <h3>No Blood found for this blood bank</h3>
        @endif

   
   
    <table>
        <tr>
            <th>S/N</th>
            <th>Blood Type</th>
            <th>Quantity</th>
            <th>Price (per unit)</th>
            <th>Action</th>    
        </tr>

        @foreach($product as $products)
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->blood_type}}</td>
            <td>{{$products->quantity}}</td>
            <td>${{$products->price}}</td>
            <td>
                <form action="{{route('customer.add2cart',$products->id)}}" method="GET">
                    <input type="number" value="1" min="1" name="quantity">
                    <button>Add to Cart</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    <a href="{{route('user.dashboard')}}">Back</a>
</body>
</html>
