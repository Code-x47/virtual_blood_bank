<html lang="en">
@extends('sales.dashboard_template')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
</head>
<body>


@section('navbar')
 <h2>Admin Panel</h2>
        <ul>
            <li>Dashboard</li>
            <li><a href="{{route('view.products')}}">View Available Blood</a></li>
            <li><a href="{{route('form.bloodBank')}}">Register Blood Bank</a></li>
            <li>Users</li>
            <li>Deliveries</li>
            <li>Orders</li>
            <li>Payments</li>
            <li>Settings</li>
            <li><a href="logout">Logout</a></li>
        </ul>
@endsection

@section('cards')

   <div class="cards">

            <div class="card">Total Users: {{$countUsers}}</div>
            <div class="card">Orders: {{$countOrders}}</div>
            <div class="card">Revenue: N{{$revenue}}</div>
    </div>
@endsection


@section('order_table')
<h3>Recent Orders</h3>
            <table>
                <tr>
                  <th>Blood Type</th>
                  <th>Quantity</th>
                  <th>Delivery Address</th>
                  <th>Order Date</th>
                  <th>Price</th>
                  <th>Order_Status</th>
                  <th>Action</th>
                </tr>
                @foreach($order as $orders)
                <tr>
                <td>{{$orders->blood_inventory->blood_type}}</td>
                <td>{{$orders['quantity']}}</td>
                <td>{{$orders['delivery_address']}}</td>
                <td>{{$orders['order_date']}}</td>
                <td>{{$orders['price']}}</td>
                <td>{{$orders['status']}}</td>
                <td>
                <a href="{{route('admin.edit',$orders['id'])}}" style="color:blue; cursor:pointer">update</a> 
                <a href="{{route('admin.delete_order',$orders['id'])}}" style="color:red; cursor:pointer">delete</a>
               </td>
                </tr>
               @endforeach
            </table>

@endsection

@section('user_table')
<h3>Users Table</h3>
        <table>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email Address</th>
                  <th>Home Address</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>

                @foreach($users as $user)
                 <tr>
                 <td>{{$user['id']}}</td>
                 <td>{{$user['name']}}</td>
                 <td>{{$user['email']}}</td>
                 <td>{{$user['address']}}</td>
                 <td>{{$user['phone']}}</td>
                 <td>
                 <a href="{{route('admin.edit_user',$user->id)}}" style="color:blue; cursor:pointer">update</a> 
                 <a href="{{route('admin.delete_user',$user->id)}}" style="color:red; cursor:pointer">delete</a>
                 </td> 
                 <tr>
                @endforeach
        </table>
@endsection



@section('payment_table')
<h3>Payment Table</h3>
        <table>
                <tr>
                  <th>ID</th>
                  <th>Order_Id</th>
                  <th>Amount</th>
                  <th>Payment Method</th>
                  <th>Payment Status</th>
                  <th>customer Id</th>
                  <th>Action</th>
                </tr>

                @foreach($payment as $pay)
                 <tr>
                 <td>{{$pay['id']}}</td>
                 <td>{{$pay['order_id']}}</td>
                 <td>{{$pay['amount']}}</td>
                 <td>{{$pay['payment_method']}}</td>
                 <td>{{$pay['payment_status']}}</td>
                 <td>{{$pay['user_id']}}</td>
                 <td>
                 <a href="{{route('admin.edit_payment',$pay->id)}}" style="color:blue; cursor:pointer">update</a> 
                 <a href="{{route('admin.delete_payment',$pay->id)}}" style="color:red; cursor:pointer">delete</a>
                 </td> 
                 <tr>
                @endforeach
        </table>
@endsection

</body>
</html>


