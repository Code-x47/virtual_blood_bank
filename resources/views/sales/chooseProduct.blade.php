<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeBlood - Blood Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/chooseProduct.css')}}">
    <link rel="stylesheet" href="styles.css">
    <style>
        
    </style>
</head>
<body>
    <div class="wave-top"></div>
    <div class="wave-bottom"></div>
    
    <!-- Blood drops will be added by JavaScript -->
    
    <div class="product-container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="page-title">
            <h1>Select Product By Blood Bank Of Your Choice</h1>
            @if (isset($company) && $company->bloodbank)
             <h3>These Are Products From <span>{{$company->bloodbank->name}}</span></h3>
            @endif
        </div>
        
        <div class="product-table-container">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Blood Type</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($product as $products)
                    <tr>
                          
                        <td>{{$products->id}}</td>
                        <td>{{$products->blood_type}}</td>
                        <td>{{$products->quantity}}</td>
                        <td><a href="{{Route('agent_remove_item',$products->id)}}" class="remove-link">Remove</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <a href="{{Route('agent.dashboard')}}" class="back-link">Return to Dashboard</a>
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
        
        window.addEventListener('load', function() {
            createBloodDrops();
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                });
            }, 5000);
        });
    </script>
</body>
</html>
