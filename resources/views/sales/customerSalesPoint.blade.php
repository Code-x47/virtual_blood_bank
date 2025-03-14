<table border=1>
    <tr>
    <th>S/N</th>
    <th>Blood Bank</th>
   
    <th>Action</th>
    </tr>
    @if($specificBank->isEmpty())

    <tr>
        <td colspan="3">No products available</td>
    </tr>
    @endif
    @foreach($specificBank AS $bank)
    
    <tr>
    <td>{{$bank['id']}}</td>
    <td>{{$bank->name ?? 'N/A'}}</td>
    <td><a href="customerBuy/{{$bank['id']}}">Buy</a></td>
    </tr>
    @endforeach
</table>