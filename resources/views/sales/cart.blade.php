<!--<h1>Cart Items</h1>

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
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Items</title>
     <!--Link to Font Awesome for icon-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        table {
            width: 80%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 1.1rem;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        input[type="date"], input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input[type="date"]:focus, input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-size: 1.2rem;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            width: 90%;
        }

        .order-message {
            text-align: center;
            color: #d9534f;
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .order-message p {
            margin: 0;
        }

        .cart-icon {
            font-size: 2rem;
            color: #4CAF50;
            margin-right: 8px;
        }

        .order-now-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .form-container .form-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-container .form-header .icon {
            font-size: 2rem;
            color: #4CAF50;
            margin-right: 10px;
        }

    </style>
</head>
<body>


 @include('sweetalert::alert')

    <div class="form-container">
        <div class="form-header">
            <i class="fas fa-shopping-cart icon"></i>
            <h1>Cart Items</h1>
        </div>
       
       
        <div class="mb-4 text-center">
    <a href="{{ route('user.dashboard') }}" class="btn btn-success position-relative" style="font-size: 1.2rem; padding: 10px 25px; border-radius: 30px;">
        <i class="fas fa-tachometer-alt me-2"></i> Back To Dashboard
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <i class="fas fa-shopping-basket"></i> {{ count($items) }}
        </span>
    </a>
</div>


@php
    $firstItem = $items->first();
@endphp


        <table>
            <thead>
                <tr>
                    <th>Blood Type</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->blood_type }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td><a href="{{ route('customer.removeCart',$item->id)}}" style="color:red; text-decoration:none">Remove</a></td>
                    </tr>
                @endforeach
                @if ($firstItem)
                    <form action="{{ route('order', $firstItem->id) }}" method="GET">
                        @csrf
                        <tr>
                            <td><input type="date" name="order_date" required></td>
                            <td><input type="text" name="delivery_address" placeholder="Delivery Address" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div class="order-now-container">
                                    <button type="submit">
                                        <i class="fas fa-check-circle"></i> Order Now
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </form>
                @else
                    <tr>
                        <td colspan="3" class="order-message">
                            <p><i class="fas fa-exclamation-circle"></i> No items available for ordering.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</body>
</html>

