<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeBlood - View Products</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/viewProduct.css')}}">
</head>
<body>
    <div class="wave-top"></div>
    <div class="wave-bottom"></div>
    
    <!-- Blood drops will be added by JavaScript -->
    
    <div class="container">
        <div class="header">
            <div class="logo-circle">RD</div>
            <h2>Red Dropz 🩸</h2>
        </div>
        
        <div class="page-title">
            <h1>Available Blood Products</h1>
        </div>
        
        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
        @endif


        <table class="products-table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Blood Bank</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($specificBank->isEmpty())
                <tr>
                    <td colspan="3" class="empty-message">No products available at this time</td>
                </tr>
                @endif
                
                @foreach($specificBank AS $bank)
                <tr>
                    <td>{{$bank['id']}}</td>
                    <td>{{$bank->name ?? 'N/A'}}</td>
                    <td>
                        @if(!empty($bank['id']))
                        <a href="{{ route('customer.buy', $bank['id']) }}" class="buy-btn">View</a>
                        @else
                          <span class="text-muted">No products available</span>
                        @endif
                        <!---<a href="buyproduct/{{$bank['id']}}" class="buy-btn">View</a>-->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{Route('user.dashboard')}}" class="back-link">Return to Dashboard</a>
    </div>

    <script>
        // Create blood drops animation
        function createBloodDrops() {
            const numberOfDrops = 15;
            
            for(let i = 0; i < numberOfDrops; i++) {
                const drop = document.createElement('div');
                drop.classList.add('blood-drop');
                
                // Random position and animation delay
                const posX = Math.random() * window.innerWidth;
                const delay = Math.random() * 15;
                const size = Math.random() * 10 + 10;
                
                drop.style.left = `${posX}px`;
                drop.style.animationDelay = `${delay}s`;
                drop.style.width = `${size}px`;
                drop.style.height = `${size * 1.2}px`;
                
                document.body.appendChild(drop);
            }
        }
        
        // Add ripple effect to buttons
        function createRippleEffect() {
            const buttons = document.querySelectorAll('.buy-btn');
            
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const rect = button.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const ripple = document.createElement('span');
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        }
        
        window.addEventListener('load', function() {
            createBloodDrops();
            createRippleEffect();
        });
    </script>
</body>
</html>
