<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeBlood - User Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/userDashboard.css')}}">
    
</head>
<body>
    <div class="wave-bottom"></div>
    
    <!-- Animated blood drops -->
    <script>
        // Create blood drops
        function createBloodDrops() {
            const numberOfDrops = 20;
            
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
        
        window.addEventListener('load', createBloodDrops);
    </script>
    
    <div class="dashboard-container">
        <div class="logo">
            <div class="logo-circle">B+</div>
            <div class="logo-text">RedDropz 🩸</div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Welcome, {{ session('data') }}!</h1>
                <p class="card-subtitle">Select your preferred service below:</p>
            </div>
            
            <div class="nav-links">
                <a href="{{ route('order_table') }}" class="nav-link">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 15a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-4Z"></path>
                            <path d="M4 8a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8Z"></path>
                            <path d="M14 8a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V8Z"></path>
                        </svg>
                    </span>
                    View Your Order
                </a>
                <a href="{{ route('view.products_by_customers') }}" class="nav-link">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1"></circle>
                            <circle cx="19" cy="21" r="1"></circle>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                        </svg>
                    </span>
                    Purchase Blood
                </a>
                <a href="{{ route('pay.pod') }}" class="nav-link">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                            <line x1="2" x2="22" y1="10" y2="10"></line>
                        </svg>
                    </span>
                    Payment Details
                </a>
                <a href="{{ route('customer.my_cart') }}" class="nav-link">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1"></circle>
                            <circle cx="19" cy="21" r="1"></circle>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                        </svg>
                    </span>
                    View Cart
                </a>
                
            </div>
            
            <form method="Get" action="logout" class="logout-btn">
                @csrf
                <button type="submit">
                    <span class="logout-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </span>
                    Logout
                </button>
            </form>
        </div>
    </div>
</body>
</html>
