
<?php include('header.php'); ?>
  <link rel="stylesheet" href="styles.css">

<body>
  <div class="container">
    <!-- Purple gradient circles -->
    <div class="gradient-circle top"></div>
    <div class="gradient-circle bottom"></div>
    
    <div class="content">
      <!-- Left side welcome text -->
      <div class="welcome-section">
        <h1 id="welcome-title">Welcome Back .!</h1>
        <button class="skip-button">Skip the lag ?</button>
      </div>
      
      <!-- Right side form container with both forms -->
      <div class="form-container">
        <div class="forms-wrapper">
          <!-- Login Form -->
          <div class="card login-card">
            <div class="card-header">
              <h2>Login</h2>
              <p>Glad you're back.!</p>
            </div>
            
            <form id="login-form" method="post">
              <div class="form-group">
                <input type="text" id="Username" name="username" placeholder="Username" required>
              </div>
              
              <div class="form-group password-group">
                <input type="password" id="login-password" name="password" placeholder="Password" required>
                <button type="button" class="toggle-password" data-for="login-password">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-off-icon hidden">
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                  </svg>
                </button>
              </div>
              
              <div class="form-group remember-group">
                <input type="checkbox" id="remember" checked>
                <label for="remember">Remember me</label>
              </div>
              
              <button type="submit" name="login" id="signin" class="submit-button">Login</button>
              
              <div class="forgot-password">
                <a href="#">Forgot password ?</a>
              </div>
            </form>
            
            <div class="divider">
              <span>Or</span>
            </div>
            
            <div class="social-login">
              <button class="social-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="#EA4335" d="M5.26620003,9.76452941 C6.19878754,6.93863203 8.85444915,4.90909091 12,4.90909091 C13.6909091,4.90909091 15.2181818,5.50909091 16.4181818,6.49090909 L19.9090909,3 C17.7818182,1.14545455 15.0545455,0 12,0 C7.27006974,0 3.1977497,2.69829785 1.23999023,6.65002441 L5.26620003,9.76452941 Z"/>
                  <path fill="#34A853" d="M16.0407269,18.0125889 C14.9509167,18.7163016 13.5660892,19.0909091 12,19.0909091 C8.86648613,19.0909091 6.21911939,17.076871 5.27698177,14.2678769 L1.23746264,17.3349879 C3.19279051,21.2970142 7.26500293,24 12,24 C14.9328362,24 17.7353462,22.9573905 19.834192,20.9995801 L16.0407269,18.0125889 Z"/>
                  <path fill="#4A90E2" d="M19.834192,20.9995801 C22.0291676,18.9520994 23.4545455,15.903663 23.4545455,12 C23.4545455,11.2909091 23.3454545,10.5818182 23.1272727,9.90909091 L12,9.90909091 L12,14.4545455 L18.4363636,14.4545455 C18.1187732,16.013626 17.2662994,17.2212117 16.0407269,18.0125889 L19.834192,20.9995801 Z"/>
                  <path fill="#FBBC05" d="M5.27698177,14.2678769 C5.03832634,13.556323 4.90909091,12.7937589 4.90909091,12 C4.90909091,11.2182781 5.03443647,10.4668121 5.26620003,9.76452941 L1.23999023,6.65002441 C0.43658717,8.26043162 0,10.0753848 0,12 C0,13.9195484 0.444780743,15.7301709 1.23746264,17.3349879 L5.27698177,14.2678769 Z"/>
                </svg>
              </button>
              <button class="social-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </button>
              <button class="social-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="#FFFFFF" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                </svg>
              </button>
            </div>
            
            <div class="account-switch">
              <p>Don't have an account? <a href="#" id="show-register">Signup</a></p>
              
              <div class="footer-links">
                <a href="#">Terms & Conditions</a>
                <a href="#">Support</a>
                <a href="#">Customer Care</a>
              </div>
            </div>
          </div>
          
          <!-- Register Form -->
          <div class="card register-card">
            <div class="card-header">
              <h2>Register</h2>
              <p>Create your account</p>
            </div>
            
            <form method="post" action="student/student_signup.php" >
              <div class="form-row">
                <div class="form-group">
                  <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
                </div>
                
                <div class="form-group">
                  <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
                </div>
              </div>
              
              <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
              </div>

              <div class="form-group">
                <select name="user" id="user" required>
                  <option value="" disabled selected>Select User Type</option>
                  <option value="teacher" name="teacher">Teacher</option>
                  <option value="student" name="student">Student</option>
                </select>
              </div>

              <div class="form-group">
                <select name="department_id" id="department" required>
                  <option value="" disabled selected>Select Department</option>
                  <?php
                    $query = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name") or die(mysqli_error());
                      while ($row = mysqli_fetch_array($query)) {
                          echo "<option value='{$row['department_id']}'>{$row['department_name']}</option>";
                      }
                  ?>
                </select>
              </div>
              
              <div class="form-group password-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="button" class="toggle-password" data-for="password">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-off-icon hidden">
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                  </svg>
                </button>
              </div>
              
              <div class="form-group password-group">
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                <button type="button" class="toggle-password" data-for="cpassword">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-off-icon hidden">
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                  </svg>
                </button>
              </div>
              
              <div class="form-group terms-group">
                <input type="checkbox" id="terms" required checked>
                <label for="terms">I agree to the <a href="#">Terms & Conditions</a></label>
              </div>
              
              <button type="submit" class="submit-button">Create Account</button>
            </form>
            
            <div class="divider">
              <span>Or</span>
            </div>
            
            <div class="social-login">
              <button class="social-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="#EA4335" d="M5.26620003,9.76452941 C6.19878754,6.93863203 8.85444915,4.90909091 12,4.90909091 C13.6909091,4.90909091 15.2181818,5.50909091 16.4181818,6.49090909 L19.9090909,3 C17.7818182,1.14545455 15.0545455,0 12,0 C7.27006974,0 3.1977497,2.69829785 1.23999023,6.65002441 L5.26620003,9.76452941 Z"/>
                  <path fill="#34A853" d="M16.0407269,18.0125889 C14.9509167,18.7163016 13.5660892,19.0909091 12,19.0909091 C8.86648613,19.0909091 6.21911939,17.076871 5.27698177,14.2678769 L1.23746264,17.3349879 C3.19279051,21.2970142 7.26500293,24 12,24 C14.9328362,24 17.7353462,22.9573905 19.834192,20.9995801 L16.0407269,18.0125889 Z"/>
                  <path fill="#4A90E2" d="M19.834192,20.9995801 C22.0291676,18.9520994 23.4545455,15.903663 23.4545455,12 C23.4545455,11.2909091 23.3454545,10.5818182 23.1272727,9.90909091 L12,9.90909091 L12,14.4545455 L18.4363636,14.4545455 C18.1187732,16.013626 17.2662994,17.2212117 16.0407269,18.0125889 L19.834192,20.9995801 Z"/>
                  <path fill="#FBBC05" d="M5.27698177,14.2678769 C5.03832634,13.556323 4.90909091,12.7937589 4.90909091,12 C4.90909091,11.2182781 5.03443647,10.4668121 5.26620003,9.76452941 L1.23999023,6.65002441 C0.43658717,8.26043162 0,10.0753848 0,12 C0,13.9195484 0.444780743,15.7301709 1.23746264,17.3349879 L5.27698177,14.2678769 Z"/>
                </svg>
              </button>
              <button class="social-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </button>
              <button class="social-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="#FFFFFF" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                </svg>
              </button>
            </div>
            
            <div class="account-switch">
              <p>Already have an account? <a href="#" id="show-login">Login</a></p>
              
              <div class="footer-links">
                <a href="#">Terms & Conditions</a>
                <a href="#">Support</a>
                <a href="#">Customer Care</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="script.js"></script> -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const formsWrapper = document.querySelector('.forms-wrapper');
    const showRegisterBtn = document.getElementById('show-register');
    const showLoginBtn = document.getElementById('show-login');
    const welcomeTitle = document.getElementById('welcome-title');
    const gradientCircles = document.querySelectorAll('.gradient-circle');
    const gradientColor = document.querySelectorAll('body');
    
    // Toggle password visibility for all password fields
    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
    
    togglePasswordBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const targetId = this.getAttribute('data-for');
        const passwordInput = document.getElementById(targetId);
        const eyeIcon = this.querySelector('.eye-icon, .eye-icon-confirm');
        const eyeOffIcon = this.querySelector('.eye-off-icon, .eye-off-icon-confirm');
        
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          eyeIcon.classList.add('hidden');
          eyeOffIcon.classList.remove('hidden');
        } else {
          passwordInput.type = 'password';
          eyeIcon.classList.remove('hidden');
          eyeOffIcon.classList.add('hidden');
        }
      });
    });
    
    // Switch between login and register forms with animation
    showRegisterBtn.addEventListener('click', function(e) {
      e.preventDefault();
      formsWrapper.classList.add('show-register');
      welcomeTitle.textContent = 'Join Us .!';
      welcomeTitle.style.animation = 'fadeIn 0.5s forwards';
      
      // Animate gradient circles
      gradientCircles.forEach(circle => {
        circle.style.filter = 'blur(120px)';
        circle.style.background = 'rgba(3, 0, 200, 0.4)';
      });
      gradientColor.forEach(background => {
        background.style.background = 'linear-gradient(to right, #9333ea, #4f46e5)';
      });
    });
    
    showLoginBtn.addEventListener('click', function(e) {
      e.preventDefault();
      formsWrapper.classList.remove('show-register');
      welcomeTitle.textContent = 'Welcome Back .!';
      welcomeTitle.style.animation = 'fadeIn 0.5s forwards';
      
      // Animate gradient circles back
      gradientCircles.forEach(circle => {
        circle.style.filter = 'blur(100px)';
        circle.style.background = 'rgba(183, 0, 183, 0.56)';
      });
      gradientColor.forEach(background => {
        background.style.background = 'linear-gradient(to right, #4f46e5, #9333ea)';
      });
    });
    
    // Register form submission

    
    // Add animation to elements when page loads
    document.querySelectorAll('.card-header, .form-group, .submit-button, .gradient-circle').forEach((el, index) => {
      el.style.animation = `fadeIn 0.5s forwards ${index * 0.1}s`;
      el.style.opacity = '0';
    });
  });


  // login Form submission
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("login-form").addEventListener("submit", function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "login.php", true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = xhr.responseText.trim();
                console.log("Server Response:", response); // Debugging the response

                if (response === 'true') {
                    showNotification("Loading File Please Wait......", true);
                    showNotification("Welcome to EduSphere Learning Management System", false, 'Access Granted');
                    setTimeout(function () {
                        window.location.href = 'teacher/dashboard_teacher.php'; // Ensure correct redirection
                    }, 1000);
                } else if (response === 'true_student') {
                    showNotification("Welcome to EduSphere Learning Management System", false, 'Access Granted');
                    setTimeout(function () {
                        window.location.href = 'student/dashboard_student.php'; // Ensure correct redirection
                    }, 1000);
                } else {
                    showNotification("Please Check your username and Password", false, 'Login Failed');
                }
            } else {
                console.error("Error: Unable to connect to the server.");
                showNotification("An error occurred. Please try again later.", false, 'Error');
            }
        };

        xhr.onerror = function () {
            console.error("Error: Network error occurred.");
            showNotification("Network error. Please check your connection.", false, 'Error');
        };

        xhr.send(formData);
    });

    function showNotification(message, isLoading = false, header = '') {
        var notification = document.createElement("div");
        notification.className = "notification";
        notification.style.position = "fixed";
        notification.style.top = "10px";
        notification.style.right = "10px";
        notification.style.backgroundColor = isLoading ? "#4caf50" : "#f44336";
        notification.style.color = "#fff";
        notification.style.padding = "10px";
        notification.style.borderRadius = "5px";
        notification.style.boxShadow = "0px 0px 10px rgba(0,0,0,0.1)";
        notification.style.zIndex = "1000";
        notification.innerHTML = header ? `<strong>${header}</strong><br>${message}` : message;
        document.body.appendChild(notification);

        setTimeout(function () {
            notification.style.transition = "opacity 0.5s";
            notification.style.opacity = "0";
            setTimeout(function () {
                notification.remove();
            }, 500);
        }, 3000);
    }
});

  </script>

</body>
</html>