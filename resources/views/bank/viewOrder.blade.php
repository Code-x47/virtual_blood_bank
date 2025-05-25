


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Example - LifeBlood</title>
    <style>
        :root {
          --blood: #ea384c;
          --blood-dark: #c02638;
          --blood-light: #ffdee2;
          --white: #ffffff;
          --black: #222222;
          --gray-100: #f8f9fa;
          --gray-200: #e9ecef;
          --gray-300: #dee2e6;
          --gray-400: #ced4da;
          --gray-500: #adb5bd;
          --gray-600: #6c757d;
          --gray-700: #495057;
          --gray-800: #343a40;
          --gray-900: #212529;
        }
        
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        
        body {
          font-family: 'Poppins', sans-serif;
          line-height: 1.6;
          color: var(--gray-800);
          background-color: var(--gray-100);
          padding: 2rem;
        }
        
        /* Orders Table Styles */
        .orders-container {
          width: 100%;
          max-width: 1200px;
          margin: 2rem auto;
          padding: 0 1rem;
          position: relative;
          overflow: hidden;
        }

        .orders-header {
          text-align: center;
          margin-bottom: 2rem;
          position: relative;
        }

        .orders-header h1 {
          font-size: 2.5rem;
          font-weight: 700;
          color: var(--blood);
          margin-bottom: 0.5rem;
          position: relative;
          z-index: 1;
        }

        .orders-header::after {
          content: '';
          position: absolute;
          bottom: -0.5rem;
          left: 50%;
          transform: translateX(-50%);
          width: 6rem;
          height: 0.25rem;
          background-color: var(--blood);
          border-radius: 0.25rem;
        }

        .orders-table-container {
          background-color: var(--white);
          border-radius: 0.75rem;
          box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
          overflow: hidden;
          margin-bottom: 2rem;
        }

        .orders-table {
          width: 100%;
          border-collapse: collapse;
          overflow: hidden;
        }

        .orders-table thead {
          background: linear-gradient(180deg, var(--blood) 0%, var(--blood-dark) 100%);
          color: var(--white);
        }

        .orders-table th {
          padding: 1.25rem 1rem;
          text-align: left;
          font-weight: 600;
          position: relative;
        }

        .orders-table td {
          padding: 1rem;
          border-bottom: 1px solid var(--gray-200);
        }

        .orders-table tbody tr:last-child td {
          border-bottom: none;
        }

        .orders-table tbody tr {
          transition: background-color 0.3s ease;
        }

        .orders-table tbody tr:hover {
          background-color: var(--blood-light);
        }

        .cancel-link {
          color: var(--blood);
          text-decoration: none;
          font-weight: 500;
          transition: all 0.3s ease;
          position: relative;
          padding: 0.25rem 0.5rem;
          border-radius: 0.25rem;
          display: inline-block;
        }

        .cancel-link::before {
          content: '';
          position: absolute;
          bottom: 0;
          left: 0;
          width: 0;
          height: 2px;
          background-color: var(--blood);
          transition: width 0.3s ease;
        }

        .cancel-link:hover {
          background-color: rgba(234, 56, 76, 0.1);
        }

        .cancel-link:hover::before {
          width: 100%;
        }

        .blood-drop {
          position: absolute;
          width: 15px;
          height: 15px;
          background-color: var(--blood);
          border-radius: 50% 50% 50% 5%;
          transform: rotate(45deg);
          opacity: 0.2;
          z-index: 0;
        }

        .order-status {
          display: inline-block;
          padding: 0.25rem 0.75rem;
          border-radius: 999px;
          font-weight: 500;
          font-size: 0.875rem;
        }

        .status-pending {
          background-color: rgba(234, 179, 8, 0.2);
          color: rgb(161, 98, 7);
        }

        .status-delivered {
          background-color: rgba(34, 197, 94, 0.2);
          color: rgb(21, 128, 61);
        }

        .status-cancelled {
          background-color: rgba(239, 68, 68, 0.2);
          color: rgb(153, 27, 27);
        }

        .status-processing {
          background-color: rgba(59, 130, 246, 0.2);
          color: rgb(29, 78, 216);
        }

        .back-to-dashboard {
          display: inline-block;
          margin-top: 1rem;
          color: var(--gray-600);
          text-decoration: none;
          transition: color 0.3s ease;
          font-weight: 500;
        }

        .back-to-dashboard:hover {
          color: var(--blood);
        }

        /* Blood drop animation */
        @keyframes float-drop {
          0% {
            transform: translateY(0) rotate(45deg);
          }
          50% {
            transform: translateY(-20px) rotate(45deg);
          }
          100% {
            transform: translateY(0) rotate(45deg);
          }
        }

        .blood-drop:nth-child(odd) {
          animation: float-drop 8s infinite ease-in-out;
        }

        .blood-drop:nth-child(even) {
          animation: float-drop 6s infinite ease-in-out;
        }
    </style>
</head>
<body>
    <div class="orders-container">
        <!-- Decorative blood drops -->
        <div class="blood-drop" style="top: 20%; left: 5%;"></div>
        <div class="blood-drop" style="top: 40%; left: 12%;"></div>
        <div class="blood-drop" style="top: 70%; right: 8%;"></div>
        <div class="blood-drop" style="top: 30%; right: 15%;"></div>
        
        <div class="orders-header">
            <h1>Here Are Your Orders</h1>
        </div>
        
        <div class="orders-table-container">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Blood Type</th>
                        <th>Quantity</th>
                        <th>Delivery Address</th>
                        <th>Order Date</th>
                        <th>Price</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>
              
           @if($order->isEmpty()) 
              <h1>Order Not Available</h1>
            @endif
            @foreach($order as $new_orders)
            
                <tr>
                    <td>{{ $new_orders->blood_inventory->blood_type ?? 'N/A' }}</td>
                    <td>{{ $new_orders['quantity'] }}</td>
                    <td>{{ $new_orders['delivery_address'] }}</td>
                    <td>{{ $new_orders['order_date'] }}</td>
                    <td>N{{ $new_orders['price'] }}</td>
                    <td>{{ $new_orders['status'] }}</td>
                    <td><a style="color:red; text-decoration:none;" href="{{route('customer.cancel_order',$new_orders->id)}}">Cancel</a></td>
                </tr>
            @endforeach    
            </tbody>
            </table>
        </div>
        
        <a href="{{Route('agent.dashboard')}}" class="back-to-dashboard">← Back to Dashboard</a>
    </div>

    <script>
        // Add some random floating blood drops for decoration
        function createBloodDrops(count) {
            const container = document.querySelector('.orders-container');
            for (let i = 0; i < count; i++) {
                const drop = document.createElement('div');
                drop.className = 'blood-drop';
                drop.style.top = `${Math.random() * 100}%`;
                drop.style.left = `${Math.random() * 100}%`;
                drop.style.animationDelay = `${Math.random() * 5}s`;
                container.appendChild(drop);
            }
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            createBloodDrops(6);
        });
    </script>
</body>
</html>
