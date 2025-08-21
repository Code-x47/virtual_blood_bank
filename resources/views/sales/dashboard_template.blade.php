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
    <!-- Add this inside body (outside sidebar and main-content) -->
     <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    <div class="overlay" onclick="toggleSidebar()"></div>

       <div class="sidebar">
         @yield('navbar')
       </div>
    
       <div class="main-content">
        <div class="header">Admin Dashboard</div>
        
        <div class="my_cards">
        @yield('cards')
        </div>
        
     


       
        
        <div class="table-container">
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
<script src="{{'asset/js/app.js'}}"></script>

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }
</script>


</body>
</html>
