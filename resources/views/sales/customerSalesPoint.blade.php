<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Blood Banks</title>
     <link rel="stylesheet" href="{{asset('asset/css/customerSalesPoint.css')}}">
    
</head>
<body>
<div class="table-container">
    <a href="{{ route('user.dashboard') }}" class="back-button">⬅ Back to Dashboard</a>

    <h1>Available Blood Banks</h1>
    <p class="description">
        Browse through our trusted blood bank partners below and choose the one that best suits your needs. 
        Click "Buy" to proceed to place a request from your preferred vendor.
    </p>

    <table>
        <tr>
            <th>S/N</th>
            <th>Blood Bank</th>
            <th>Action</th>
        </tr>
        @if($specificBank->isEmpty())
            <tr>
                <td colspan="3" class="empty-message">No blood banks are currently available. Please check back later.</td>
            </tr>
        @endif
        @foreach($specificBank as $bank)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bank->name ?? 'N/A' }}</td>
                <td><a href="customerBuy/{{ $bank['id'] }}">Buy from {{ $bank->name }}</a></td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
