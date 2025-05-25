<!--<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1{
            text-align: center;
        }
        span {
            margin: 10px;
            color: red;
            
        }

        form {
            margin-top: 30px;
        }
        div span a {
            text-decoration: none;
            color: red;
            margin-left: 10%;
        }
       
    </style>
</head>
<body>

<h1>Welcome {{session('data')}} To Your Agent Dashboard You Can Select You Prefered Services</h1>

<div>
<span><a href="{{route('view.inventoryForm')}}">Register Blood</a></span>
<span><a href="{{route('view.products')}}">View Available Blood</a></span>
<span><a href="agent_view_order">View Orders</a></span>
<span><a href="agent_view_payment">View Payments</a></span>
<span><a href="{{route('form.bloodBank')}}">Register Blood Bank</a></span>
</div>

<form method="Get" action="logout">
    <button> Logout </button>
</form>
    
</body>
</html>

-->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LifeBlood Dashboard</title>
 
 <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f2f4f7;
      color: #333;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    header {
      background: #fff;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
      font-weight: bold;
      font-size: 1.3rem;
      color: #d32f2f;
    }

    .logo-icon {
      background: #d32f2f;
      color: white;
      border-radius: 50%;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
    }

    .user-actions {
      display: flex;
      align-items: center;
      gap: 1rem;
      font-size: 0.95rem;
    }

    .logout-button {
      border: none;
      background: none;
      color: #d32f2f;
      cursor: pointer;
      font-size: 0.95rem;
    }

    .hero {
      background: linear-gradient(to right, #ffe5e5, #fff1f1);
      padding: 3rem 2rem;
      text-align: center;
    }

    .hero h1 {
      font-size: 2rem;
      font-weight: bold;
    }

    .hero p {
      color: #555;
      max-width: 600px;
      margin: 1rem auto 0;
    }

    .status {
      margin-top: 1rem;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 0.9rem;
      color: #444;
    }

    .status-indicator {
      width: 10px;
      height: 10px;
      background: green;
      border-radius: 50%;
      margin-right: 5px;
    }

    .main {
      padding: 3rem 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .main h2 {
      text-align: center;
      font-size: 1.6rem;
      margin-bottom: 0.5rem;
    }

    .main p {
      text-align: center;
      color: #666;
      margin-bottom: 2rem;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 1.5rem;
    }

    .card {
      background: white;
      border-radius: 12px;
      padding: 2rem 1.5rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      text-align: center;
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
    }

    .card-icon {
      font-size: 2.4rem;
      color: #d32f2f;
      margin-bottom: 10px;
      text-decoration: none;
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: bold;
      margin-bottom: 8px;
      text-decoration: none;
    }

    .card-desc {
      font-size: 0.95rem;
      color: #666;
    }

    footer {
      text-align: center;
      padding: 1.5rem 0;
      background: #fff;
      border-top: 1px solid #eee;
      font-size: 0.85rem;
      color: #666;
      margin-top: 3rem;
    }
  </style>
</head>



<body>

  <header>
    <div class="logo">
      <div class="logo-icon">LB</div>
      LifeBlood
    </div>
    <div class="user-actions">
    <span >Welcome, {{session('data')}}</span>
      <form action="/logout" method="GET" style="display: flex; align-items: center;">
         <button class="logout-button" type="submit">
           <span class="logout-icon">🔓</span> Logout
        </button>
     </form>

    </div>
  </header>

  <section class="hero">
    <h1>Welcome <span id="hero-user">{{session('data')}}</span></h1>
    <p>Your role is crucial in our mission to save lives. Access all the tools you need to manage blood inventory and streamline operations.</p>
    <div class="status">
      <div class="status-indicator"></div>
      System Status: Online
    </div>
  </section>

  <main class="main">
    <h2>Agent Services</h2>
    <p>Select from the following available services</p>
    <div class="grid">
      <a href="{{route('view.inventoryForm')}}" class="card">
        <div class="card-icon">📦</div>
        <div class="card-title">Register Blood</div>
        <div class="card-desc">Add new blood inventory to the system</div>
      </a>

      <a href="{{route('view.products')}}" class="card">
        <div class="card-icon">🗃️</div>
        <div class="card-title">View Available Blood</div>
        <div class="card-desc">Check current blood inventory levels</div>
      </a>

      <a href="agent_view_order" class="card">
        <div class="card-icon">📄</div>
        <div class="card-title">View Orders</div>
        <div class="card-desc">Manage pending and completed orders</div>
      </a>

      <a href="agent_view_payment" class="card">
        <div class="card-icon">💰</div>
        <div class="card-title">View Payments</div>
        <div class="card-desc">Track payment status and history</div>
      </a>

      <a href="{{route('form.bloodBank')}}" class="card">
        <div class="card-icon">🏥</div>
        <div class="card-title">Register Blood Bank</div>
        <div class="card-desc">Add a new blood bank to the network</div>
      </a>
    </div>
  </main>

  <footer>
    © 2025 LifeBlood Blood Bank Management System. All rights reserved.
  </footer>

  <script>
    const userName = 'John Doe';
    document.getElementById('user-name').textContent = `Welcome, ${userName}`;
    document.getElementById('hero-user').textContent = userName;
  </script>

</body>
</html>

