<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 50%;
        }

        h1 {
            color: #333;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .nav-links a {
            text-decoration: none;
            background: red;
            color: white;
            padding: 12px;
            border-radius: 5px;
            display: block;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background: darkred;
        }

        .logout-btn {
            margin-top: 20px;
        }

        .logout-btn button {
            padding: 10px 20px;
            border: none;
            background: red;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn button:hover {
            background: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, {{ session('data') }}!</h1>
    <p>Select your preferred service below:</p>
    
    <div class="nav-links">
        <a href="{{ route('order_table') }}">View Your Order</a>
        <a href="{{ route('view.products_by_customers') }}">Purchase Blood</a>
        <a href="{{ route('pay.pod') }}">Payment Details</a>
        <a href="{{ route('customer.my_cart') }}">View Cart</a>
        <a href="{{ route('customer.cart.redirect') }}">View Cart2</a>
    </div>
    
   
    <form method="Get" action="logout" class="logout-btn">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeBlood - User Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            background: linear-gradient(180deg, var(--blood) 0%, var(--blood-dark) 100%);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        .wave-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15vh;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 1200 120' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='%23FFFFFF'/%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='%23FFFFFF'/%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='%23FFFFFF'/%3E%3C/svg%3E");
            background-size: cover;
            z-index: 0;
        }

        .blood-drop {
            position: absolute;
            width: 15px;
            height: 20px;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            transform: rotate(135deg);
            filter: blur(2px);
            opacity: 0;
            z-index: 0;
            animation: drop 15s infinite linear;
        }

        @keyframes drop {
            0% {
                transform: rotate(135deg) translateY(-100vh) translateX(0);
                opacity: 0;
            }
            20% {
                opacity: 0.5;
            }
            80% {
                opacity: 0.5;
            }
            100% {
                transform: rotate(135deg) translateY(100vh) translateX(20px);
                opacity: 0;
            }
        }

        .dashboard-container {
            width: 90%;
            max-width: 550px;
            margin: 2rem auto;
            padding: 2rem 1rem;
            position: relative;
            z-index: 10;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo-circle {
            width: 2.5rem;
            height: 2.5rem;
            background-color: var(--blood);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1.2rem;
            animation: pulse 2s infinite;
            margin-right: 0.5rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white);
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.8s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .card-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .card-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem;
            background-color: var(--blood);
            color: var(--white);
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover {
            background-color: var(--blood-dark);
            transform: translateY(-2px);
        }

        .icon {
            margin-right: 0.75rem;
            display: inline-flex;
        }

        .logout-btn {
            margin-top: 2rem;
        }

        .logout-btn button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 1rem;
            background: transparent;
            color: var(--blood);
            border: 1px solid var(--blood);
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn button:hover {
            background-color: rgba(234, 56, 76, 0.1);
        }

        .logout-icon {
            margin-right: 0.5rem;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(234, 56, 76, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(234, 56, 76, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(234, 56, 76, 0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive styles */
        @media (max-width: 480px) {
            .dashboard-container {
                width: 95%;
                padding: 1rem 0.5rem;
                margin: 1rem auto;
            }
            
            .card {
                padding: 1.5rem 1rem;
            }
            
            .card-title {
                font-size: 1.5rem;
            }

            .nav-link {
                padding: 0.875rem 1rem;
            }
        }

        @media (max-width: 380px) {
            .dashboard-container {
                width: 98%;
                padding: 0.75rem 0.25rem;
            }
            
            .card {
                padding: 1.25rem 0.75rem;
            }
            
            .card-title {
                font-size: 1.35rem;
            }

            .card-subtitle {
                font-size: 0.9rem;
            }

            .nav-link {
                padding: 0.75rem 0.875rem;
                font-size: 0.95rem;
            }

            .logo-circle {
                width: 2.25rem;
                height: 2.25rem;
                font-size: 1rem;
            }

            .logo-text {
                font-size: 1.35rem;
            }
        }

        @media (min-width: 768px) {
            .dashboard-container {
                margin: 3rem auto;
            }
        }

        @media (min-height: 800px) {
            .dashboard-container {
                margin: 4rem auto;
            }
        }

        /* Handle tall screens */
        @media (min-height: 1000px) {
            .dashboard-container {
                margin: 6rem auto;
            }
        }
    </style>
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
            <div class="logo-text">LifeBlood</div>
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
