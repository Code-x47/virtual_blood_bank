<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Example - LifeBlood</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
          padding: clamp(0.5rem, 3vw, 2rem);
          min-height: 100vh;
        }
        
        /* Orders Table Styles */
        .orders-container {
          width: 100%;
          max-width: 1200px;
          margin: clamp(1rem, 3vw, 2rem) auto;
          padding: 0 clamp(0.5rem, 2vw, 1rem);
          position: relative;
          overflow: hidden;
        }

        .orders-header {
          text-align: center;
          margin-bottom: clamp(1.5rem, 4vw, 2rem);
          position: relative;
        }

        .orders-header h1 {
          font-size: clamp(1.8rem, 5vw, 2.5rem);
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
          width: clamp(4rem, 10vw, 6rem);
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
          overflow-x: auto;
          -webkit-overflow-scrolling: touch;
        }

        .orders-table {
          width: 100%;
          min-width: 700px;
          border-collapse: collapse;
          overflow: hidden;
        }

        .orders-table thead {
          background: linear-gradient(180deg, var(--blood) 0%, var(--blood-dark) 100%);
          color: var(--white);
        }

        .orders-table th {
          padding: clamp(0.75rem, 2vw, 1.25rem) clamp(0.5rem, 1.5vw, 1rem);
          text-align: left;
          font-weight: 600;
          position: relative;
          font-size: clamp(0.75rem, 1.8vw, 0.95rem);
          white-space: nowrap;
          border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .orders-table th:last-child {
          border-right: none;
        }

        .orders-table td {
          padding: clamp(0.75rem, 2vw, 1rem);
          border-bottom: 1px solid var(--gray-200);
          font-size: clamp(0.75rem, 1.6vw, 0.875rem);
          vertical-align: middle;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 150px;
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
          font-size: clamp(0.7rem, 1.5vw, 0.875rem);
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
          font-size: clamp(0.7rem, 1.4vw, 0.875rem);
          white-space: nowrap;
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
          display: inline-flex;
          align-items: center;
          margin-top: 1rem;
          color: var(--gray-600);
          text-decoration: none;
          transition: color 0.3s ease;
          font-weight: 500;
          font-size: clamp(0.8rem, 1.6vw, 0.95rem);
        }

        .back-to-dashboard:hover {
          color: var(--blood);
        }

        .no-orders {
          text-align: center;
          padding: 3rem 1rem;
          color: var(--gray-600);
          font-size: clamp(1rem, 2.5vw, 1.125rem);
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

        /* Responsive Design */
        @media (max-width: 768px) {
          body {
            padding: 0.5rem;
          }

          .orders-container {
            padding: 0 0.25rem;
          }

          .orders-table {
            min-width: 650px;
          }

          .orders-table th {
            font-size: 0.75rem;
            padding: 0.75rem 0.5rem;
          }

          .orders-table td {
            font-size: 0.75rem;
            padding: 0.75rem 0.5rem;
            max-width: 120px;
          }

          .blood-drop {
            display: none;
          }

          /* Make specific columns more readable on mobile */
          .orders-table th:nth-child(3), 
          .orders-table td:nth-child(3) {
            max-width: 180px;
          }

          .orders-table th:nth-child(4), 
          .orders-table td:nth-child(4) {
            max-width: 100px;
          }

          .orders-table th:nth-child(6), 
          .orders-table td:nth-child(6) {
            max-width: 90px;
          }
        }

        @media (max-width: 480px) {
          .orders-table {
            min-width: 580px;
          }

          .orders-table th {
            font-size: 0.7rem;
            padding: 0.6rem 0.4rem;
          }

          .orders-table td {
            font-size: 0.7rem;
            padding: 0.6rem 0.4rem;
            max-width: 100px;
          }

          .cancel-link {
            font-size: 0.7rem;
            padding: 0.2rem 0.4rem;
          }

          .order-status {
            font-size: 0.65rem;
            padding: 0.2rem 0.5rem;
          }

          /* Optimize column widths for very small screens */
          .orders-table th:nth-child(1), 
          .orders-table td:nth-child(1) {
            max-width: 60px;
          }

          .orders-table th:nth-child(2), 
          .orders-table td:nth-child(2) {
            max-width: 70px;
          }

          .orders-table th:nth-child(3), 
          .orders-table td:nth-child(3) {
            max-width: 140px;
          }

          .orders-table th:nth-child(4), 
          .orders-table td:nth-child(4) {
            max-width: 80px;
          }

          .orders-table th:nth-child(5), 
          .orders-table td:nth-child(5) {
            max-width: 80px;
          }

          .orders-table th:nth-child(6), 
          .orders-table td:nth-child(6) {
            max-width: 80px;
          }

          .orders-table th:nth-child(7), 
          .orders-table td:nth-child(7) {
            max-width: 60px;
          }
        }

        /* Tablet adjustments */
        @media (min-width: 769px) and (max-width: 1024px) {
          .orders-table {
            min-width: 700px;
          }

          .orders-table th,
          .orders-table td {
            padding: 0.875rem 0.75rem;
            font-size: 0.8rem;
          }
        }

        /* Large screen adjustments */
        @media (min-width: 1200px) {
          .orders-container {
            padding: 0 2rem;
          }

          .orders-table th,
          .orders-table td {
            padding: 1.25rem 1rem;
            font-size: 0.95rem;
          }

          .orders-table td {
            max-width: 200px;
          }
        }

        /* Horizontal scroll indicator */
        .orders-table-container::after {
          content: '';
          position: absolute;
          bottom: 0;
          right: 0;
          width: 20px;
          height: 20px;
          background: linear-gradient(45deg, transparent 40%, var(--blood) 60%);
          opacity: 0.3;
          pointer-events: none;
        }

        @media (min-width: 769px) {
          .orders-table-container::after {
            display: none;
          }
        }

        /* Improved touch scrolling for mobile */
        @media (max-width: 768px) {
          .orders-table-container {
            position: relative;
          }

          .orders-table-container::-webkit-scrollbar {
            height: 8px;
          }

          .orders-table-container::-webkit-scrollbar-track {
            background: var(--gray-200);
            border-radius: 4px;
          }

          .orders-table-container::-webkit-scrollbar-thumb {
            background: var(--blood);
            border-radius: 4px;
          }

          .orders-table-container::-webkit-scrollbar-thumb:hover {
            background: var(--blood-dark);
          }
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