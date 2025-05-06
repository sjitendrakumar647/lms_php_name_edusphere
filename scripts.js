document.addEventListener('DOMContentLoaded', function() {
    // Theme toggle functionality
    const themeToggle = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;
    
    // Check for saved theme preference or use preferred color scheme
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      htmlElement.className = savedTheme;
    } else {
      // Check if user prefers dark mode
      const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (prefersDarkMode) {
        htmlElement.classList.add('dark-mode');
        htmlElement.classList.remove('light-mode');
      }
    }
    
    // Toggle theme when button is clicked
    themeToggle.addEventListener('click', function() {
      if (htmlElement.classList.contains('dark-mode')) {
        htmlElement.classList.remove('dark-mode');
        htmlElement.classList.add('light-mode');
        localStorage.setItem('theme', 'light-mode');
      } else {
        htmlElement.classList.add('dark-mode');
        htmlElement.classList.remove('light-mode');
        localStorage.setItem('theme', 'dark-mode');
      }
    });
  
    // Header scroll effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const navButtons = document.querySelector('.nav-buttons');
    
    menuToggle.addEventListener('click', function() {
      navLinks.classList.toggle('active');
      navButtons.classList.toggle('active');
      menuToggle.classList.toggle('active');
    });
  
    // Category buttons
    const categoryButtons = document.querySelectorAll('.category-btn');
    categoryButtons.forEach(button => {
      button.addEventListener('click', function() {
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
      });
    });
  
    // Testimonial slider
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.testimonial-btn.prev');
    const nextBtn = document.querySelector('.testimonial-btn.next');
    let currentSlide = 0;
  
    function showSlide(index) {
      testimonialSlides.forEach(slide => slide.classList.remove('active'));
      dots.forEach(dot => dot.classList.remove('active'));
      
      testimonialSlides[index].classList.add('active');
      dots[index].classList.add('active');
      currentSlide = index;
    }
  
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => showSlide(index));
    });
  
    prevBtn.addEventListener('click', function() {
      currentSlide = (currentSlide - 1 + testimonialSlides.length) % testimonialSlides.length;
      showSlide(currentSlide);
    });
  
    nextBtn.addEventListener('click', function() {
      currentSlide = (currentSlide + 1) % testimonialSlides.length;
      showSlide(currentSlide);
    });
  
    // Auto-advance testimonials
    setInterval(function() {
      currentSlide = (currentSlide + 1) % testimonialSlides.length;
      showSlide(currentSlide);
    }, 5000);
  
    // Animate stats counter
    const statNumbers = document.querySelectorAll('.stat-number');
    
    function animateCounter(element) {
      const target = parseInt(element.getAttribute('data-count'));
      const duration = 2000; // 2 seconds
      const step = target / (duration / 16); // 60fps
      let current = 0;
      
      const timer = setInterval(function() {
        current += step;
        if (current >= target) {
          element.textContent = target.toLocaleString();
          clearInterval(timer);
        } else {
          element.textContent = Math.floor(current).toLocaleString();
        }
      }, 16);
    }
  
    // Intersection Observer for stats animation
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          statNumbers.forEach(stat => animateCounter(stat));
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
  
    const statsSection = document.querySelector('.stats');
    if (statsSection) {
      observer.observe(statsSection);
    }
  
    // Smooth scrolling for anchor links
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
        }
      });
    });
  });