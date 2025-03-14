<h1>User Login</h1>


<form action="/login" method="Post">
    @csrf

<input type="text" name="email" placeholder="Enter Your Email Here"><br><br>
<input type="password" name="password" placeholder="Enter Your Password Here" ><br><br>


<button>Login</button>

</form>