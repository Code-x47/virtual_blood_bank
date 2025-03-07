<h1>User Registration</h1>

<form action="{{route('user.registration')}}" method="Post">
    @csrf
<input type="text" name="name" placeholder="Enter Your Name Here"><br><br>
<input type="text" name="email" placeholder="Enter Your Email Here"><br><br>
<input type="password" name="password" placeholder="Enter Your Password Here" ><br><br>
<select name="role">
    <option value="Hospital">Hospital</option>
    <option value="Individual">Individual</option>
    <option value="Agent">Agent</option>
</select>

<button>Register</button>

</form>