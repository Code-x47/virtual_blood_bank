<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{'asset/css/doc.css'}}">
    <!-- Bootstrap 5 CSS CDN -->
    <!-- Bootstrap 5.3.3 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://unpkg.com/vue@3.0.2"></script>

    <style>
      
    </style>
</head>

<body>
<div id="app">
    <!-- Mobile menu toggle button -->
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    <div class="overlay" onclick="toggleSidebar()"></div>
        
    <div class="sidebar">
        @yield('navbar')
    </div>
            
    <div class="main-content">
        <div class="header">🩸 RedDropz Admin Dashboard</div>
                
        <div class="my_cards">
            @yield('cards')
        </div>
            
        <div class="table-container" >
            <div class="table-wrapper">
                @yield('order_table')
            </div>
        </div>
                                
        <div class="table-container">
            <div class="table-wrapper">
                @yield('user_table')
            </div>
        </div>
                           
        <div class="table-container">
            <div class="table-wrapper">
                @yield('payment_table')
            </div>
        </div>
                  
        <div class="table-container">
            <div class="table-wrapper">
                @yield('inventory_table')
            </div>
        </div>
                    
        <div class="table-container">
            <div class="table-wrapper">
                @yield('blood_bank_table')
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5.3.3 JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoVn0E+0gg6Lr9Hf7jL+T1U8GQX84QZkXWGLPZ5yD2TmnsF" crossorigin="anonymous"></script>

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');
        
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
        
        // Prevent body scroll when sidebar is open on mobile
        if (sidebar.classList.contains('show')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    }

    // Enhanced mobile responsiveness
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');
        const mainContent = document.querySelector('.main-content');
        
        // Auto-close sidebar when window is resized to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        });
        
        // Close sidebar when clicking outside on mobile
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
            document.body.style.overflow = 'auto';
        });
        
        // Touch gesture support for mobile
        let startX = 0;
        let currentX = 0;
        
        sidebar.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
        });
        
        sidebar.addEventListener('touchmove', function(e) {
            currentX = e.touches[0].clientX;
        });
        
        sidebar.addEventListener('touchend', function() {
            if (startX - currentX > 50) {
                // Swipe left to close
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        });
        
        // Improve table scrolling on mobile
        const tableWrappers = document.querySelectorAll('.table-wrapper');
        tableWrappers.forEach(wrapper => {
            wrapper.addEventListener('scroll', function() {
                // Add visual feedback for scrollable tables
                if (this.scrollLeft > 0) {
                    this.style.boxShadow = 'inset 10px 0 10px -10px rgba(220, 20, 60, 0.2)';
                } else {
                    this.style.boxShadow = 'none';
                }
            });
        });
    });

    // Viewport height fix for mobile browsers
    function setViewportHeight() {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    }
    
    window.addEventListener('resize', setViewportHeight);
    window.addEventListener('orientationchange', setViewportHeight);
    setViewportHeight();
</script>

</body>
</html>
