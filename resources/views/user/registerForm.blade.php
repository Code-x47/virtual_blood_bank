
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeBlood - Registration</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/register.css">
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
    
    <div class="registration-container">
        <div class="login-logo">
            <div class="logo-circle">RD</div>
            <div class="logo-text">RedDropz</div>
        </div>
        
        <h1>User Registration</h1>
        
        <form action="{{route('user.reg')}}" method="Post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name Here" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter Your Email Here" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter Your Phone Number Here" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter Your Address Here" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password Here" required>
            </div>
            
            <div class="form-group">
                <label for="role">Register as</label>
                <select id="role" name="role" required>
                    <option value="Hospital">Hospital</option>
                    <option value="Individual">Individual</option>
                    <option value="Agent">Agent</option>
                </select>
            </div>
            
            <button type="submit">Register</button>
            
            <div class="login-link">
                Already have an account? <a href="{{route('user.login')}}">Sign in</a>
            </div>
        </form>
    </div>
</body>
</html>