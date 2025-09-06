<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Items</title>
     <!--Link to Font Awesome for icon-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{'asset/css/cart.css'}}">

</head>
<body>


 @include('sweetalert::alert')

    <div class="form-container">
        <div class="form-header">
            <i class="fas fa-shopping-cart icon"></i>
            <h1>Cart Items</h1>
        </div>
       
       
        <div class="mb-4 text-center">
    <a href="{{ route('user.dashboard') }}" class="btn btn-success position-relative" style="font-size: 1.2rem; padding: 10px 25px; border-radius: 30px; background-color:#EA384C;">
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

