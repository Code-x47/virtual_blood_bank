<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1{
            text-align: center;
        }
        span {
            margin: 10px;
            color: red;
            
        }

        form {
            margin-top: 30px;
        }
        div span a {
            text-decoration: none;
            color: red;
            margin-left: 10%;
        }
       
    </style>
</head>
<body>

<h1>Welcome To Your Admin Dashboard You Can Select You Prefered Services</h1>

<div>
<span><a href="#">Register Inventory</a></span>
<span><a href="{{route('view.products')}}">View Available Blood</a></span>
<span><a href="#">Register Blood Details</a></span>
<span><a href="{{route('form.bloodBank')}}">Register Blood Bank</a></span>
</div>

<form method="Get" action="logout">
    <button> Logout </button>
</form>
    
</body>
</html>


