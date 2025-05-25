document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    const logoText = document.querySelector('.logo-text');
    const navLinks = document.querySelectorAll('.nav-links a');
    
    function handleScroll() {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    }
    
    window.addEventListener('scroll', handleScroll);
    
    // Mobile navigation toggle
    const hamburger = document.getElementById('hamburger');
    const navLinksContainer = document.getElementById('navLinks');
    
    hamburger.addEventListener('click', function() {
      navLinksContainer.classList.toggle('show');
      const spans = hamburger.querySelectorAll('span');
      spans[0].classList.toggle('rotate-45');
      spans[1].classList.toggle('opacity-0');
      spans[2].classList.toggle('-rotate-45');
    });
    
    // Blood drops animation
    function createBloodDrops() {
      const containers = document.querySelectorAll('.blood-drops-container');
      
      containers.forEach(container => {
        for (let i = 0; i < 15; i++) {
          const drop = document.createElement('div');
          drop.className = 'blood-drop';
          drop.innerHTML = `<svg width="${20 + Math.random() * 30}" height="${20 + Math.random() * 30}" viewBox="0 0 24 24" fill="rgba(255, 255, 255, 0.2)" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 21C16.4183 21 20 17.4183 20 13C20 10 18 6.5 12 2C6 6.5 4 10 4 13C4 17.4183 7.58172 21 12 21Z" stroke="rgba(255, 255, 255, 0.3)"/>
          </svg>`;
          
          const left = Math.random() * 100;
          const top = Math.random() * 100;
          const delay = Math.random() * 5;
          const duration = 3 + Math.random() * 4;
          
          drop.style.left = `${left}%`;
          drop.style.top = `${top}%`;
          drop.style.animation = `floating ${duration}s ease-in-out infinite`;
          drop.style.animationDelay = `${delay}s`;
          
          container.appendChild(drop);
        }
      });
    }
    
    createBloodDrops();
    
    // Blood type compatibility selector
    const bloodTypeSelector = document.getElementById('bloodType');
    const bloodTypeDisplay = document.querySelector('.blood-type-display');
    const donateTypesContainer = document.getElementById('donateTypes');
    const receiveTypesContainer = document.getElementById('receiveTypes');
    
    const compatibility = {
      "A+": { canDonateTo: ["A+", "AB+"], canReceiveFrom: ["A+", "A-", "O+", "O-"] },
      "A-": { canDonateTo: ["A+", "A-", "AB+", "AB-"], canReceiveFrom: ["A-", "O-"] },
      "B+": { canDonateTo: ["B+", "AB+"], canReceiveFrom: ["B+", "B-", "O+", "O-"] },
      "B-": { canDonateTo: ["B+", "B-", "AB+", "AB-"], canReceiveFrom: ["B-", "O-"] },
      "AB+": { canDonateTo: ["AB+"], canReceiveFrom: ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"] },
      "AB-": { canDonateTo: ["AB+", "AB-"], canReceiveFrom: ["A-", "B-", "AB-", "O-"] },
      "O+": { canDonateTo: ["A+", "B+", "AB+", "O+"], canReceiveFrom: ["O+", "O-"] },
      "O-": { canDonateTo: ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"], canReceiveFrom: ["O-"] }
    };
    
    function updateCompatibility(bloodType) {
      // Update the display
      bloodTypeDisplay.textContent = bloodType;
      
      // Clear previous types
      donateTypesContainer.innerHTML = '';
      receiveTypesContainer.innerHTML = '';
      
      // Add donate types
      compatibility[bloodType].canDonateTo.forEach(type => {
        const badge = document.createElement('div');
        badge.className = 'type-badge donate-badge';
        badge.innerHTML = `<span></span>${type}`;
        donateTypesContainer.appendChild(badge);
      });
      
      // Add receive types
      compatibility[bloodType].canReceiveFrom.forEach(type => {
        const badge = document.createElement('div');
        badge.className = 'type-badge receive-badge';
        badge.innerHTML = `<span></span>${type}`;
        receiveTypesContainer.appendChild(badge);
      });
    }
    
    // Initialize compatibility display
    updateCompatibility('AB+');
    
    // Add change event listener
    bloodTypeSelector.addEventListener('change', function() {
      updateCompatibility(this.value);
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: 'smooth'
          });
          
          // Update active link
          document.querySelectorAll('.nav-links a').forEach(link => {
            link.classList.remove('active');
          });
          this.classList.add('active');
        }
      });
    });
    
    // Scroll animation for elements
    function animateOnScroll() {
      const elements = document.querySelectorAll('.stat-card, .about-text h3, .about-text p, .facts, .about-image');
      
      elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementTop < windowHeight - 100) {
          element.classList.add('fade-in');
        }
      });
    }
    
    // Run once on page load
    animateOnScroll();
    
    // Then run on scroll
    window.addEventListener('scroll', animateOnScroll);
  });

  // Additional script for About page animations
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize blood drops for the CTA section
    createBloodDrops();
    
    // Animate timeline items on scroll
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    function animateTimeline() {
      timelineItems.forEach(item => {
        const itemTop = item.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (itemTop < windowHeight - 100) {
          item.classList.add('fade-in');
        }
      });
    }
    
    // Initialize animation
    animateTimeline();
    
    // Add scroll event listener
    window.addEventListener('scroll', animateTimeline);
  });