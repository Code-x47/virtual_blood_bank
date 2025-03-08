<h1>Blood Banks Can Register Their Companies Here</h1>

<form action="{{route('bank.register')}}" method="Post">
@csrf
<input type="text" name="name" placeholder="Enter Blood Bank's Name"><br><br>
<input type="text" name="email" placeholder="Enter Blood Bank's Email Address"><br><br>
<input type="text" name="address" placeholder="Enter Blood Bank's Address"><br><br>
<input type="text" name="phone" placeholder="Enter Your Phone Address"><br><br>
<input type="text" name="city" placeholder="Enter Your Current City"><br><br>

</form>