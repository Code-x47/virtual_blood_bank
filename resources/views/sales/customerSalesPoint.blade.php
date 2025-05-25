<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Bank Table</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 40px;
        }

        .table-container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f2f6fc;
        }

        tr:hover {
            background-color: #e9f1ff;
        }

        td a {
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            background-color: #28a745;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        td a:hover {
            background-color: #218838;
        }

        .empty-message {
            text-align: center;
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="table-container">
    <table>
        <tr>
            <th>S/N</th>
            <th>Blood Bank</th>
            <th>Action</th>
        </tr>
        @if($specificBank->isEmpty())
            <tr>
                <td colspan="3" class="empty-message">No products available</td>
            </tr>
        @endif
        @foreach($specificBank as $bank)
            <tr>
                <td>{{ $bank['id'] }}</td>
                <td>{{ $bank->name ?? 'N/A' }}</td>
                <td><a href="customerBuy/{{ $bank['id'] }}">Buy</a></td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Blood Banks</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 40px;
        }

        .table-container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 8px 16px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .back-button:hover {
            background-color: #5a6268;
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 10px;
        }

        p.description {
            text-align: center;
            color: #6c757d;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 16px 20px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f2f6fc;
        }

        tr:hover {
            background-color: #e9f1ff;
        }

        td a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            background-color: #28a745;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        td a:hover {
            background-color: #218838;
        }

        .empty-message {
            text-align: center;
            color: #888;
            font-style: italic;
        }
    </style>
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
