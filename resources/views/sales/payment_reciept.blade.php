<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #b30000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #b30000;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .message {
            font-size: 18px;
            padding: 10px;
            background-color: #e6f7ff;
            border-left: 6px solid #0099cc;
            margin-bottom: 20px;
        }

        .message b {
            color: #cc0000;
        }

        .no-payment {
            font-size: 16px;
            color: #888;
            font-style: italic;
        }

        #btn {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background-color: #b30000;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        #btn:hover {
            background-color: #800000;
        }

        .btn-secondary {
         display: inline-block;
         margin-top: 10px;
         text-decoration: none;
         background-color: #cccccc;
         color: #333;
         padding: 10px 20px;
         border-radius: 6px;
         transition: background-color 0.3s ease;
         margin-left: 10px;
       }

    .btn-secondary:hover {
    background-color: #999999;
    color: #fff;
       }


        @media print {
            #btn {
                display: none !important;
            }

            .container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Receipt Summary</h1>

    <table>
        <thead>
            <tr>
                <th>Blood Type</th>
                <th>Quantity</th>
                <th>Delivery Address</th>
                <th>Order Date</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

          
    @if(isset($error))
    <div class="message" style="border-left-color: #ff9900;">
        {{ $error }}
    </div>
    @endif
               <?php
                $total = 0;
               ?>
           
            @foreach($orders as $order) 

            @if($order && is_object($order) && isset($order->blood_inventory))
            <tr>
                <td>{{$order->blood_inventory->blood_type}}</td>
                <td>{{$order['quantity']}}</td>
                <td>{{$order['delivery_address']}}</td>
                <td>{{$order['order_date']}}</td>
                <td>N{{$order['price']}}</td>
                <td>{{$order['status']}}</td>
            </tr>
            @else
             <tr>
                 <td colspan="6">Invalid order data or missing blood inventory</td>
            </tr>
            @endif
          
            @endforeach
        </tbody>
    </table>

    
    <div class="message">
       
        Hello valued <strong>{{ session('data') }}</strong>, you are to pay 
       
        <b>N{{$payment->gross_total ?? '00.0'}}</b> when our delivery team arrives at your destination.
        <p>Thanks!</p>
    
    </div>
    @if(isset($orders) && isset($payment))
  
    @if(!isset($pdf))

    <a id="btn" href="{{ Route('printPdf') }}" onclick="display()">Print Receipt</a>

    @endif

    @else
    <h1>You Cant Print An Empty Result</h1>

    @endif


   

    <a class="btn-secondary" href="{{route('user.dashboard')}}">Back To Dashboard</a>

</div>
</body>
</html>
