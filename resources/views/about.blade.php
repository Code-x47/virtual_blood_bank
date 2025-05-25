<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - LifeBlood</title>
  <meta name="description" content="Learn about LifeBlood's mission, history and team dedicated to saving lives through blood donation." />
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
        <span class="logo-text">LifeBlood</span>
      </div>
      <div class="nav-links" id="navLinks">
        <a href="/">Home</a>
        <a href="about" class="active">About</a>
        <a href="#donate">Donate</a>
        <a href="#compatibility">Compatibility</a>
        <a href="#testimonials">Stories</a>
      </div>
      <button class="donate-btn">Donate Now</button>
      <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>

  <!-- About Hero Section -->
  <section class="about-hero">
    <div class="container">
      <div class="section-header">
        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">About LifeBlood</h1>
        <div class="section-line"></div>
        <p class="max-w-3xl mx-auto text-gray-600">
          We are dedicated to saving lives through blood donation, connecting donors with patients in need,
          and promoting awareness about the importance of regular blood donation.
        </p>
      </div>
    </div>
  </section>

  <!-- Our Mission Section -->
  <section class="py-16 bg-gray-100">
    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-2xl md:text-3xl font-bold mb-6">Our Mission</h2>
          <p class="text-gray-600 mb-4">
            Since our founding in 2010, LifeBlood has been committed to providing a reliable and safe blood supply to hospitals
            and medical facilities across the country. We believe that everyone deserves access to life-saving blood when they need it most.
          </p>
          <p class="text-gray-600 mb-4">
            Our mission is to save lives by ensuring a stable and diverse blood supply, educating the public about the
            critical need for blood donation, and connecting generous donors with patients in need.
          </p>
          <p class="text-gray-600">
            Through community outreach, mobile donation drives, and partnerships with healthcare providers, we've helped save
            over 2 million lives and continue to grow our impact each year.
          </p>
        </div>
        <div class="relative">
          <div class="bg-blood p-1 rounded-lg rotate-3 shadow-xl">
            <img src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?ixlib=rb-4.0.3&auto=format&fit=crop&w=1187&q=80" 
                 alt="Blood donation center" class="rounded-lg">
          </div>
          <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-lg shadow-lg">
            <p class="font-bold text-blood">2M+</p>
            <p class="text-sm text-gray-600">Lives saved</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Values Section -->
  <section class="py-16">
    <div class="container">
      <div class="section-header">
        <h2 class="text-3xl font-bold mb-4">Our Core Values</h2>
        <div class="section-line"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <div class="value-card">
          <div class="value-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#ea384c" stroke-width="2" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.5 13.5L12 21L4.5 13.5C3.5 12.5 2.5 10.5 2.5 9C2.5 5.5 5.5 3.5 8 3.5C10 3.5 11.5 4.5 12 5C12.5 4.5 14 3.5 16 3.5C18.5 3.5 21.5 5.5 21.5 9C21.5 10.5 20.5 12.5 19.5 13.5Z" />
            </svg>
          </div>
          <h3 class="value-title">Compassion</h3>
          <p class="text-gray-600">
            We approach our work with empathy and understanding, recognizing the impact blood donation has on patients and their families.
          </p>
        </div>

        <div class="value-card">
          <div class="value-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#ea384c" stroke-width="2" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 21C16.4183 21 20 17.4183 20 13C20 10 18 6.5 12 2C6 6.5 4 10 4 13C4 17.4183 7.58172 21 12 21Z" />
            </svg>
          </div>
          <h3 class="value-title">Excellence</h3>
          <p class="text-gray-600">
            We maintain the highest standards in blood collection, testing, and distribution to ensure safety and efficacy.
          </p>
        </div>

        <div class="value-card">
          <div class="value-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#ea384c" stroke-width="2" xmlns="http://www.w3.org/2000/svg">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 8L12 12" />
              <path d="M12 16L12 16" />
            </svg>
          </div>
          <h3 class="value-title">Integrity</h3>
          <p class="text-gray-600">
            We operate with transparency and honesty, building trust with donors, recipients, and healthcare partners.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Our History Timeline -->
  <section class="py-16 bg-gray-100">
    <div class="container">
      <div class="section-header">
        <h2 class="text-3xl font-bold mb-4">Our Journey</h2>
        <div class="section-line"></div>
      </div>

      <div class="timeline">
        <div class="timeline-item left">
          <div class="timeline-content">
            <div class="timeline-year">2010</div>
            <h3>LifeBlood Founded</h3>
            <p>Started with a single donation center and a team of five dedicated professionals.</p>
          </div>
        </div>
        
        <div class="timeline-item right">
          <div class="timeline-content">
            <div class="timeline-year">2013</div>
            <h3>Mobile Donation Program</h3>
            <p>Launched our first mobile donation vehicles to reach underserved communities.</p>
          </div>
        </div>
        
        <div class="timeline-item left">
          <div class="timeline-content">
            <div class="timeline-year">2015</div>
            <h3>Regional Expansion</h3>
            <p>Opened 10 new centers across the country, dramatically increasing our coverage.</p>
          </div>
        </div>
        
        <div class="timeline-item right">
          <div class="timeline-content">
            <div class="timeline-year">2018</div>
            <h3>Research Division</h3>
            <p>Established our research division to improve blood storage and transfusion techniques.</p>
          </div>
        </div>
        
        <div class="timeline-item left">
          <div class="timeline-content">
            <div class="timeline-year">2022</div>
            <h3>National Recognition</h3>
            <p>Received the National Health Service Excellence Award for our contribution to healthcare.</p>
          </div>
        </div>
        
        <div class="timeline-item right">
          <div class="timeline-content">
            <div class="timeline-year">2025</div>
            <h3>Today</h3>
            <p>Operating 50+ centers nationwide with over 500 dedicated staff members and thousands of volunteer donors.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Leadership Team Section -->
  <section class="py-16">
    <div class="container">
      <div class="section-header">
        <h2 class="text-3xl font-bold mb-4">Our Leadership Team</h2>
        <div class="section-line"></div>
      </div>

      <div class="team-grid">
        <div class="team-member">
          <div class="team-image">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=387&q=80" alt="Dr. Sarah Johnson">
          </div>
          <div class="team-info">
            <h3 class="team-name">Dr. Sarah Johnson</h3>
            <p class="team-role">Chief Executive Officer</p>
            <p class="text-gray-600">Former hematologist with 15 years of experience in healthcare management and blood banking systems.</p>
          </div>
        </div>

        <div class="team-member">
          <div class="team-image">
            <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?ixlib=rb-4.0.3&auto=format&fit=crop&w=387&q=80" alt="Dr. Michael Chen">
          </div>
          <div class="team-info">
            <h3 class="team-name">Dr. Michael Chen</h3>
            <p class="team-role">Medical Director</p>
            <p class="text-gray-600">Board-certified transfusion medicine specialist who oversees our medical protocols and safety standards.</p>
          </div>
        </div>

        <div class="team-member">
          <div class="team-image">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=388&q=80" alt="Emily Rodriguez">
          </div>
          <div class="team-info">
            <h3 class="team-name">Emily Rodriguez</h3>
            <p class="team-role">Community Outreach Director</p>
            <p class="text-gray-600">Leads our donor recruitment initiatives and educational programs in communities nationwide.</p>
          </div>
        </div>

        <div class="team-member">
          <div class="team-image">
            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=387&q=80" alt="James Wilson">
          </div>
          <div class="team-info">
            <h3 class="team-name">James Wilson</h3>
            <p class="team-role">Operations Director</p>
            <p class="text-gray-600">Ensures the efficient operation of our donation centers and blood distribution network.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call To Action Section -->
  <section class="cta">
    <div class="blood-drops-container">
      <!-- Blood drops will be inserted by JavaScript -->
    </div>
    <div class="container">
      <div class="cta-content">
        <h2>Join Our Life-Saving Mission</h2>
        <p>Become part of our community of donors and help us save more lives every day.</p>
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
          <span>LifeBlood</span>
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
        <p>&copy; 2025 LifeBlood. All rights reserved.</p>
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
