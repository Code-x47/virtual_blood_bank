<!-- <h1>Blood Banks Can Register Their Companies Here</h1>

<form action="{{route('bank.register')}}" method="Post">
@csrf
<input type="text" name="name" placeholder="Enter Blood Bank's Name"><br><br>
<input type="text" name="email" placeholder="Enter Blood Bank's Email Address"><br><br>
<input type="text" name="address" placeholder="Enter Blood Bank's Address"><br><br>
<input type="text" name="phone" placeholder="Enter Your Phone Address"><br><br>
<input type="text" name="city" placeholder="Enter Your Current City"><br><br>
<button>Submit</button>
</form>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeBlood - Blood Bank Registration</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
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

        .registration-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 500px;
            max-width: 90%;
            position: relative;
            z-index: 10;
            animation: fadeIn 0.8s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
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
            color: var(--blood);
        }

        .form-header h1 {
            color: var(--gray-800);
            font-size: 1.75rem;
            font-weight: 600;
            position: relative;
            margin-bottom: 0.5rem;
        }

        .form-header h1::after {
            content: '';
            position: absolute;
            width: 4rem;
            height: 0.25rem;
            background-color: var(--blood);
            bottom: -0.5rem;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 0.125rem;
        }

        .form-header p {
            color: var(--gray-600);
            margin-top: 1.5rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--gray-700);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--blood);
            box-shadow: 0 0 0 3px var(--blood-light);
        }

        .form-group input::placeholder {
            color: var(--gray-500);
        }

        button {
            background-color: var(--blood);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        button:hover {
            background-color: var(--blood-dark);
        }

        button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        button:focus:not(:active)::after {
            animation: ripple 1s ease-out;
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

        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .form-footer a {
            color: var(--blood);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .form-footer a:hover {
            color: var(--blood-dark);
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .registration-container {
                padding: 1.5rem;
            }
            
            .form-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wave-bottom"></div>
    
    <div class="registration-container">
        <div class="form-header">
            <div class="logo-container">
                <div class="logo-circle">LB</div>
                <div class="logo-text">LifeBlood</div>
            </div>
            <h1>Blood Bank Registration</h1>
            <p>Register your blood bank to join our life-saving network</p>
        </div>
        
        <form action="{{route('bank.register')}}" method="Post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Enter Blood Bank's Name">
            </div>
            
            <div class="form-group">
                <input type="text" name="email" placeholder="Enter Blood Bank's Email Address">
            </div>
            
            <div class="form-group">
                <input type="text" name="address" placeholder="Enter Blood Bank's Address">
            </div>
            
            <div class="form-group">
                <input type="text" name="phone" placeholder="Enter Your Phone Address">
            </div>
            
            <div class="form-group">
                <input type="text" name="city" placeholder="Enter Your Current City">
            </div>
            
            <button type="submit">Register Blood Bank</button>
        </form>
        
        <div class="form-footer">
            Already registered? <a href="#">Sign in to your account</a>
        </div>
    </div>
    
    <script>
        // Create animated blood drops
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
        
        // Add ripple effect to submit button
        function addRippleEffect() {
            const button = document.querySelector('button');
            
            button.addEventListener('click', function(e) {
                const rect = button.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const ripple = document.createElement('span');
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
            });
        }
        
        window.addEventListener('load', function() {
            createBloodDrops();
            addRippleEffect();
        });
    </script>
</body>
</html>
