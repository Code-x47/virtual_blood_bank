<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 50%;
        }

        h1 {
            color: #333;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .nav-links a {
            text-decoration: none;
            background: red;
            color: white;
            padding: 12px;
            border-radius: 5px;
            display: block;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background: darkred;
        }

        .logout-btn {
            margin-top: 20px;
        }

        .logout-btn button {
            padding: 10px 20px;
            border: none;
            background: red;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn button:hover {
            background: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, {{ session('data') }}!</h1>
    <p>Select your preferred service below:</p>
    
    <div class="nav-links">
        <a href="{{ route('order_table') }}">View Your Order</a>
        <a href="{{ route('view.products_by_customers') }}">Purchase Blood</a>
        <a href="{{ route('pay.pod') }}">Payment Details</a>
        <a href="{{ route('customer.my_cart') }}">View Cart</a>
    </div>
    
   
    <form method="Get" action="logout" class="logout-btn">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>




