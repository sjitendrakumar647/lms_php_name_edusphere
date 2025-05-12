  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

body {
  background-color: #f5f5f5;
  color: #333;
  line-height: 1.6;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Footer Styles */
.footer {
  position: relative;
  background-color: #1a2235;
  color: white;
}

/* Footer Content */
.footer-content {
  padding: 80px 0 60px;
  background-color: #1a2235;
  position: relative;
  z-index: 0;
}

.footer-content .container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 2fr;
  gap: 30px;
}

.footer-column h4 {
  font-size: 0.9rem;
  font-weight: 500;
  letter-spacing: 1px;
  margin-bottom: 25px;
  color: #a0a8c0;
}

.footer-links {
  list-style: none;
}

.footer-links li {
  margin-bottom: 15px;
}

.footer-links a {
  color: white;
  text-decoration: none;
  transition: opacity 0.3s;
}

.footer-links a:hover {
  opacity: 0.8;
}

.logo {
  margin-top: 10px;
}

.newsletter-column p {
  margin-bottom: 20px;
  color: #e0e6f5;
  line-height: 1.6;
}

.newsletter-form {
  display: flex;
  max-width: 100%;
}

.newsletter-form input {
  flex: 1;
  padding: 12px 15px;
  border: none;
  border-radius: 6px 0 0 6px;
  font-size: 0.9rem;
}

.newsletter-form input:focus {
  outline: none;
}

.btn-subscribe {
  background-color: #6c5ce7;
  color: white;
  border: none;
  padding: 0 25px;
  border-radius: 0 6px 6px 0;
  cursor: pointer;
  font-weight: 500;
  transition: background-color 0.3s;
}

.btn-subscribe:hover {
  background-color: #5a4fcf;
}

/* Responsive Styles */
@media (max-width: 992px) {
  .footer-content .container {
    grid-template-columns: 1fr 1fr;
  }
  
  .logo-column {
    grid-column: 1 / 3;
    margin-bottom: 20px;
  }
  
  .newsletter-column {
    grid-column: 1 / 3;
    margin-top: 20px;
  }
}


@media (max-width: 576px) {
  .footer-content .container {
    grid-template-columns: 1fr;
  }
  
  .logo-column, .newsletter-column {
    grid-column: 1;
  }
  
  .newsletter-form {
    flex-direction: column;
  }
  
  .newsletter-form input {
    border-radius: 6px;
    margin-bottom: 10px;
  }
  
  .btn-subscribe {
    border-radius: 6px;
    padding: 12px;
  }
}
  </style>


  <footer class="footer">

    <!-- Footer Content -->
    <div class="footer-content">
      <div class="container">
        <!-- Logo Column -->
        <div class="footer-column logo-column">
          <div class="logo">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M40 15L25 30L40 45" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M20 15L35 30L20 45" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>

        <!-- About Column -->
        <div class="footer-column">
          <h4>ABOUT Edusphere</h4>
          <ul class="footer-links">
            <li><a href="dashboard_student.php">Home</a></li>
            <li><a href="student_notification.php">notification</a></li>
            <li><a href="../faq.html">FAQs</a></li>
          </ul>
        </div>

        <!-- Product Column -->
        <div class="footer-column">
          <h4>PRODUCT</h4>
          <ul class="footer-links">
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">How it works</a></li>
            <li><a href="#">Member Discounts</a></li>
          </ul>
        </div>

        <!-- Newsletter Column -->
        <div class="footer-column newsletter-column">
          <h4>NOT QUITE READY FOR SAVVY?</h4>
          <p>Join our online no-code community for free. No spam. Ever.</p>
          
            <form action="https://getform.io/f/amdkqmdb" method="post">
              <div class="newsletter-form">
              <input type="email" name="email" placeholder="Enter your email">
              <button type="submit" class="btn-subscribe">Subscribe</button>
              </div>
            </form>
          
        </div>
      </div>
    </div>
  </footer>