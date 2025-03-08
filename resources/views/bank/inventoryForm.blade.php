<h1>Register Blood Product Here</h1>

<form action="{{route('reg.inventory')}}" method="Post">
@csrf
<select name="blood_type">
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
</select><br>

<input type="number" name="quantity"><br>

<input type="date" name="expiry_date">

<button>Submit</button>

</form>