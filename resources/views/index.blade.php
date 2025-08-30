<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LifeBlood - Give Blood, Save Lives</title>
  <meta name="description" content="LifeBlood - Donate blood and save lives. Find a donation center near you." />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/home.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="container">
      <div class="logo">
        <div class="logo-circle">B+</div>
        <span class="logo-text">RedDropz</span>
      </div>
      <div class="nav-links" id="navLinks">
        <a href="#" class="active">Home</a>
        <a href="about">About</a>
        <a href="#donate">Donate</a>
        <a href="#compatibility">Compatibility</a>
        <a href="#testimonials">Stories</a>
      </div>
      <button class="donate-btn"><a href="{{route('user.login')}}">Blood Bank<a></button>
      <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="waves-overlay"></div>
    <div class="container hero-content">
      <div class="hero-text">
        <h1 class="fade-in">Give Blood,<br><span>Save Lives</span></h1>
        <p class="fade-in">Your donation today can save up to 3 lives. Join our mission to ensure blood is available for everyone in need.</p>
        <div class="hero-btns fade-in">
          <button class="btn btn-white">Learn More</button>
          <button class="btn btn-outline">Find Center</button>
        </div>
      </div>
      <div class="hero-visual">
        <div class="pulse-circle">
          <svg class="heart-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.5 13.5L12 21L4.5 13.5C3.5 12.5 2.5 10.5 2.5 9C2.5 5.5 5.5 3.5 8 3.5C10 3.5 11.5 4.5 12 5C12.5 4.5 14 3.5 16 3.5C18.5 3.5 21.5 5.5 21.5 9C21.5 10.5 20.5 12.5 19.5 13.5Z" fill="#ea384c" stroke="#ea384c"/>
          </svg>
        </div>
        <div class="stats-card">
          <p class="stats-number">4.5M</p>
          <p class="stats-text">Lives saved annually</p>
        </div>
      </div>
    </div>
    <div class="blood-drops-container">
      <!-- Blood drops will be inserted by JavaScript -->
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about">
    <div class="container">
      <div class="section-header">
        <h2>Why Blood Donation Matters</h2>
        <div class="section-line"></div>
      </div>

      <div class="stats-cards">
        <div class="stat-card">
          <div class="stat-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 21C16.4183 21 20 17.4183 20 13C20 10 18 6.5 12 2C6 6.5 4 10 4 13C4 17.4183 7.58172 21 12 21Z" stroke="#ea384c" stroke-width="2"/>
            </svg>
          </div>
          <h3>1 in 7</h3>
          <p>Hospital patients need blood</p>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.5 13.5L12 21L4.5 13.5C3.5 12.5 2.5 10.5 2.5 9C2.5 5.5 5.5 3.5 8 3.5C10 3.5 11.5 4.5 12 5C12.5 4.5 14 3.5 16 3.5C18.5 3.5 21.5 5.5 21.5 9C21.5 10.5 20.5 12.5 19.5 13.5Z" stroke="#ea384c" stroke-width="2"/>
            </svg>
          </div>
          <h3>38,000</h3>
          <p>Donations needed daily</p>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.73 21a2 2 0 0 1-3.46 0M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M8.5 2C9 2 9.5 2.5 9 3L8 5c-.5.5 0 1 .5 1H12m0 0h3.5c.5 0 1-.5.5-1L15 3c-.5-.5 0-1 .5-1" stroke="#ea384c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3>43,000</h3>
          <p>Lives saved each day</p>
        </div>
      </div>

      <div class="about-content">
        <div class="about-text">
          <h3>Your donation makes a difference</h3>
          <p>
            Every day, blood donors help patients of all ages: accident and burn victims, heart surgery and organ transplant patients, 
            and those battling cancer. In fact, every two seconds, someone in the world needs blood.
          </p>
          <p>
            Blood and platelets cannot be manufactured; they can only come from volunteer donors. The blood supply 
            must be constantly replenished as red blood cells have a shelf life of just 42 days.
          </p>
          <div class="facts">
            <div class="fact"><span></span> <strong>13.6 million</strong> units of whole blood and red blood cells collected annually</div>
            <div class="fact"><span></span> <strong>45%</strong> of people in the Nigeria have Type O blood (most requested)</div>
            <div class="fact"><span></span> <strong>3 lives</strong> can be saved by one donation</div>
          </div>
        </div>
        <div class="about-image">
         <img src="asset/img/donor.jpg" alt="Blood donation">

          <div class="image-label">
            <p class="label-title">Every 2 seconds</p>
            <p class="label-text">Someone needs blood</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Compatibility Section -->
  <section id="compatibility" class="compatibility">
    <div class="container">
      <div class="section-header light">
        <h2>Blood Type Compatibility</h2>
        <div class="section-line"></div>
        <p>Understanding blood type compatibility is crucial for safe transfusions. Select your blood type below to see your donor and recipient compatibility.</p>
      </div>

      <div class="compatibility-card">
        <h3>Select Your Blood Type</h3>
        <div class="blood-type-selector">
          <select id="bloodType">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
          <div class="blood-type-display">AB+</div>
        </div>

        <div class="compatibility-grid">
          <div class="donate-to">
            <h4>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21C16.4183 21 20 17.4183 20 13C20 10 18 6.5 12 2C6 6.5 4 10 4 13C4 17.4183 7.58172 21 12 21Z" fill="rgba(34, 197, 94, 0.2)" stroke="#22c55e"/>
              </svg>
              Can Donate To
            </h4>
            <div class="compatibility-types" id="donateTypes"></div>
          </div>
          <div class="receive-from">
            <h4>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21C16.4183 21 20 17.4183 20 13C20 10 18 6.5 12 2C6 6.5 4 10 4 13C4 17.4183 7.58172 21 12 21Z" fill="rgba(59, 130, 246, 0.2)" stroke="#3b82f6"/>
              </svg>
              Can Receive From
            </h4>
            <div class="compatibility-types" id="receiveTypes"></div>
          </div>
        </div>

        <div class="compatibility-note">
          <p>Remember: O- is the universal donor and AB+ is the universal recipient.</p>
          <button class="btn btn-outline-red">Learn More About Blood Types</button>
        </div>
      </div>
    </div>
    <div class="blood-drops-container">
      <!-- Blood drops will be inserted by JavaScript -->
    </div>
  </section>

  <!-- Call To Action Section -->
  <section class="cta">
    <div class="blood-drops-container">
      <!-- Blood drops will be inserted by JavaScript -->
    </div>
    <div class="container">
      <div class="cta-content">
        <h2>Your Donation Makes a Difference</h2>
        <p>Join thousands of donors today and help save lives in your community.
          One donation can save up to three lives.</p>
        <div class="cta-buttons">
          <button class="btn btn-white">Donate Now</button>
          <button class="btn btn-outline">Find Donation Center</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-logo">
          <div class="logo-circle">B+</div>
          <span>RedDropz</span>
        </div>
        <div class="footer-links">
          <div class="footer-column">
            <h4>About Us</h4>
            <a href="#">Our Mission</a>
            <a href="#">History</a>
            <a href="#">Team</a>
            <a href="#">Careers</a>
          </div>
          <div class="footer-column">
            <h4>Resources</h4>
            <a href="#">Eligibility</a>
            <a href="#">Locations</a>
            <a href="#">FAQs</a>
            <a href="#">Host a Drive</a>
          </div>
          <div class="footer-column">
            <h4>Contact</h4>
            <a href="#">Support</a>
            <a href="#">Feedback</a>
            <a href="#">Partnerships</a>
            <a href="#">Media</a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 RedDropz. All rights reserved.</p>
        <div class="footer-social">
          <a href="#" class="social-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 2H15C13.6739 2 12.4021 2.52678 11.4645 3.46447C10.5268 4.40215 10 5.67392 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73478 14.1054 6.48043 14.2929 6.29289C14.4804 6.10536 14.7348 6 15 6H18V2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <a href="#" class="social-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M23 3.00005C22.0424 3.67552 20.9821 4.19216 19.86 4.53005C19.2577 3.83756 18.4573 3.34674 17.567 3.12397C16.6767 2.90121 15.7395 2.95724 14.8821 3.2845C14.0247 3.61176 13.2884 4.19445 12.773 4.95376C12.2575 5.71308 11.9877 6.61238 12 7.53005V8.53005C10.2426 8.57561 8.50127 8.18586 6.93101 7.39549C5.36074 6.60513 4.01032 5.43868 3 4.00005C3 4.00005 -1 13 8 17C5.94053 18.398 3.48716 19.099 1 19C10 24 21 19 21 7.50005C20.9991 7.2215 20.9723 6.94364 20.92 6.67005C21.9406 5.66354 22.6608 4.39276 23 3.00005Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <a href="#" class="social-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 8C17.5913 8 19.1174 8.63214 20.2426 9.75736C21.3679 10.8826 22 12.4087 22 14V21H18V14C18 13.4696 17.7893 12.9609 17.4142 12.5858C17.0391 12.2107 16.5304 12 16 12C15.4696 12 14.9609 12.2107 14.5858 12.5858C14.2107 12.9609 14 13.4696 14 14V21H10V14C10 12.4087 10.6321 10.8826 11.7574 9.75736C12.8826 8.63214 14.4087 8 16 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6 9H2V21H6V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M4 6C5.10457 6 6 5.10457 6 4C6 2.89543 5.10457 2 4 2C2.89543 2 2 2.89543 2 4C2 5.10457 2.89543 6 4 6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <a href="#" class="social-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17 2H7C4.23858 2 2 4.23858 2 7V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V7C22 4.23858 19.7614 2 17 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5932 15.1514 13.8416 15.5297C13.0901 15.9079 12.2385 16.0396 11.4078 15.9059C10.5771 15.7723 9.80977 15.3801 9.21485 14.7852C8.61993 14.1902 8.22774 13.4229 8.09408 12.5922C7.96042 11.7615 8.09208 10.9099 8.47034 10.1584C8.8486 9.40685 9.45419 8.79374 10.201 8.40624C10.9478 8.01874 11.7978 7.87659 12.63 8C13.4789 8.12588 14.2649 8.52146 14.8717 9.1283C15.4785 9.73515 15.8741 10.5211 16 11.37Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M17.5 6.5H17.51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <script src="asset/js/script.js"></script>
</body>
</html>