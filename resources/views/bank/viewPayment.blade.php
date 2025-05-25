<!--<h1>View Payment Table</h1>

<table border=1>
    <tr>
        <th>Order Id</th>
        <th>Amount</th>
        <th>Payment Method</th>
        <th>Payment Status</th>
        <th>User Id</th>
    </tr>
@foreach($payment As $paid)
    <tr>
        <td>{{$paid->order_id}}</td>
        <td>{{$paid->amount}}</td>
        <td>{{$paid->payment_method}}</td>
        <td>{{$paid->payment_status}}</td>
        <td>{{$paid->user->name}}</td>
        
    </tr>
@endforeach    
</table>-->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details - LifeBlood</title>
    <!--<link rel="stylesheet" href="../styles/main.css">-->

<style>

/* Payments Table Styles */
.payments-container {
  width: 100%;
  max-width: 1200px;
  margin: 2rem auto;
  padding: 0 1rem;
  position: relative;
  overflow: hidden;
}

.payments-header {
  text-align: center;
  margin-bottom: 2rem;
  position: relative;
}

.payments-header h1 {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--blood);
  margin-bottom: 0.5rem;
  position: relative;
  z-index: 1;
}

.payments-header::after {
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

.payments-table-container {
  background-color: var(--white);
  border-radius: 0.75rem;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  margin-bottom: 2rem;
}

.payments-table {
  width: 100%;
  border-collapse: collapse;
  overflow: hidden;
}

.payments-table thead {
  background: linear-gradient(180deg, var(--blood) 0%, var(--blood-dark) 100%);
  color: var(--white);
}

.payments-table th {
  padding: 1.25rem 1rem;
  text-align: left;
  font-weight: 600;
  position: relative;
}

.payments-table td {
  padding: 1rem;
  border-bottom: 1px solid var(--gray-200);
}

.payments-table tbody tr:last-child td {
  border-bottom: none;
}

.payments-table tbody tr {
  transition: background-color 0.3s ease;
}

.payments-table tbody tr:hover {
  background-color: var(--blood-light);
}

.payment-status {
  display: inline-block;
  padding: 0.25rem 0.75rem;
  border-radius: 999px;
  font-weight: 500;
  font-size: 0.875rem;
}

.status-completed {
  background-color: rgba(34, 197, 94, 0.2);
  color: rgb(21, 128, 61);
}

.status-pending {
  background-color: rgba(234, 179, 8, 0.2);
  color: rgb(161, 98, 7);
}

.status-failed {
  background-color: rgba(239, 68, 68, 0.2);
  color: rgb(153, 27, 27);
}

.status-processing {
  background-color: rgba(59, 130, 246, 0.2);
  color: rgb(29, 78, 216);
}

.payment-method-card {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.payment-method-card::before {
  content: '💳';
  font-size: 1rem;
}

.payment-method-bank {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.payment-method-bank::before {
  content: '🏦';
  font-size: 1rem;
}

.payment-method-cash {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.payment-method-cash::before {
  content: '💵';
  font-size: 1rem;
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

/* Responsive adjustments */
@media (max-width: 992px) {
  .payments-table {
    display: block;
    overflow-x: auto;
  }
}

@media (max-width: 768px) {
  .payments-header h1 {
    font-size: 2rem;
  }
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
    <!-- Replace this with your actual navbar component -->
    <div class="navbar">
        <!-- Navbar content -->
    </div>

    <div class="payments-container">
        <!-- Decorative blood drops -->
        <div class="blood-drop" style="top: 15%; left: 8%;"></div>
        <div class="blood-drop" style="top: 35%; left: 15%;"></div>
        <div class="blood-drop" style="top: 65%; right: 12%;"></div>
        <div class="blood-drop" style="top: 25%; right: 8%;"></div>
        
        <div class="payments-header">
            <h1>Payment Records</h1>
        </div>
        
        <div class="payments-table-container">
            <table class="payments-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payment As $paid)
                        <tr>
                            <td>{{$paid->order_id}}</td>
                            <td>₦{{$paid->amount}}</td>
                            <td>
                                <span class="
                                    @if($paid->payment_method == 'card') payment-method-card
                                    @elseif($paid->payment_method == 'bank') payment-method-bank
                                    @elseif($paid->payment_method == 'cash') payment-method-cash
                                    @endif">
                                    {{$paid->payment_method}}
                                </span>
                            </td>
                            <td>
                                <span class="payment-status 
                                    @if($paid->payment_status == 'completed') status-completed 
                                    @elseif($paid->payment_status == 'pending') status-pending 
                                    @elseif($paid->payment_status == 'failed') status-failed 
                                    @elseif($paid->payment_status == 'processing') status-processing 
                                    @endif">
                                    {{$paid->payment_status}}
                                </span>
                            </td>
                            <td>{{$paid->user->name}}</td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        
        <a href="{{Route('agent.dashboard')}}" class="back-to-dashboard">← Back to Dashboard</a>
    </div>

    <!-- Replace this with your actual footer component -->
    <div class="footer">
        <!-- Footer content -->
    </div>

    <script>
        // Add some random floating blood drops for decoration
        function createBloodDrops(count) {
            const container = document.querySelector('.payments-container');
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
