<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details - LifeBlood</title>
    <link rel="stylesheet" href="asset/css/payment.css">

<style>

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
