<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{'asset/css/doc.css'}}">
    <style>
       
    </style>
</head>
<body>
    <div class="sidebar">
       @yield('navbar')
    <!--<h2>Admin Panel</h2>
        <ul>
            <li>Dashboard</li>
            <li>Users</li>
            <li>Orders</li>
            <li>Settings</li>
            <li>Logout</li>
        </ul>-->
    </div>
    <div class="main-content">
        <div class="header">Admin Dashboard</div>
        
        <div class="my_cards">
        @yield('cards')
        </div>
        
        <div class="table-container">
        @yield('order_table')   
        </div>


        <div class="table-container">
        @yield('user_table') 
        </div>

        <div class="table-container">
        @yield('payment_table') 
        </div>

    </div>
</body>
</html>
