<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Update</h2>
      
        <form action="{{route('admin.update_user')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$editUser['id']}}">
            
            <label for="quantity">Name:</label>
            <input type="text" id="name" name="name" value="{{$editUser['name']}}">
            
            <label for="price">Email:</label>
            <input type="text" id="email" name="email" value="{{$editUser['email']}}">
            
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="{{$editUser['phone']}}">
            
            <label for="phone">Address:</label>
            <input type="text" id="address" name="address" value="{{$editUser['address']}}">
            
            <label for="usertype">UserType:</label>
            <select id="usertype" name="usertype" value="{{$editUser['usertype']}}">
                <option value="0">User</option>
                <option value="1">Admin</option>
              
            </select>


            <label for="role">Role:</label>
            <select id="role" name="role" value="{{$editUser['role']}}">
                <option value="individual">Individual</option>
                <option value="hospital">Hospital</option>
                <option value="admin">Admin</option>
            </select>
            
            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>
