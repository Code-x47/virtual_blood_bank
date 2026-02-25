<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('asset/css/customerChooseProduct.css')}}">
    <title>Select Product</title>
    <style>
    
      .text-danger{
        background: #fff4f4;
        color: #d92d20;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 13.5px;
        border: 1px solid #fecdca;
        }

    </style>
    
</head>
<body>

@error('quantity')
    <div class="text-danger">{{ $message }}</div>
@enderror



    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
      
      <h1>Select Product By Blood Bank Of Your Choice</h1>
        
        @if($company)
        <h3>These Are Products From <span>{{$company->bloodbank->name}}</span></h3>
        @else
        <h3>No Blood found for this blood bank</h3>
        @endif

   
   
    <table>
        <tr>
            <th>S/N</th>
            <th>Blood Type</th>
            <th>Product Available</th>
            <th>Price (per unit)</th>
            <th>Quantity</th>    
        </tr>

        @foreach($product as $products)
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->blood_type}}</td>
            <td>{{$products->quantity}}</td>
            <td>₦{{$products->price}}</td>
            <td>
                <form action="{{route('customer.add2cart',$products->id)}}" method="POST">
                    @csrf
                    <input type="number" value="1" min="1" name="quantity">
                    <button>Add to Cart</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
   
    <p style="text-align:center; margin-top:20px;">
        <a href="{{route('user.dashboard')}}">⬅ Back to Home</a>
    </p>

<script>
window.addEventListener("pageshow", function (event) {
    if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
        window.location.reload();
    }
});
</script>
</body>
</html>
