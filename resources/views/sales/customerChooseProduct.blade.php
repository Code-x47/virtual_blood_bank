<!--<h1>Select Product By Blood Bank Of Your Choice</h1>
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
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Product</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 36px;
            margin-top: 20px;
        }

        h3 {
            text-align: center;
            color: #555;
            font-size: 20px;
            margin-top: 10px;
            font-weight: normal;
        }

        h3 span {
            color: red;
            font-weight: bold;
        }

        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 18px;
        }

        th {
            background-color: #f4a261;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1faee;
        }

        td button {
            padding: 8px 15px;
            background-color: #e76f51;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        td button:hover {
            background-color: #d65a3c;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

    </style>
</head>
<body>
@include('sweetalert::alert')

    <h1>Select Product By Blood Bank Of Your Choice</h1>
    <h3>These Are Products From <span>{{$company->bloodbank->name}}</span></h3>
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
