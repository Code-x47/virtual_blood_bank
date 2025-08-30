<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="{{'asset/css/agentDashboard.css'}}">
  <title>RedDropz Dashboard</title>
 
</head>



<body>

  <header>
    <div class="logo">
      <div class="logo-icon">RD</div>
      RedDropz
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

