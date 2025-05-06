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

// register form submission
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("register-form").addEventListener("submit", function (e) {
      e.preventDefault();
      
      var password = document.getElementById("password").value;
      var cpassword = document.getElementById("cpassword").value;

      if (password === cpassword) {
          var formData = new FormData(this);
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "student_signup.php", true);
          xhr.onload = function () {
              if (xhr.status === 200) {
                var response = xhr.responseText.trim();
                console.log("Server Response:", response);
                  
                  if (response === 'true') {
                    registrationNotification("Loading File Please Wait......", true);
                    registrationNotification("Welcome to EduSphere Learning Management System", false, 'Access Granted');
                    setTimeout(function () {
                        window.location.href = 'dashboard/dashboard_teacher.php'; // Ensure correct redirection
                    }, 1000);
                  } else if (response === 'true_student') {
                    registrationNotification("Welcome to EduSphere Learning Management System", false, 'Access Granted');
                    setTimeout(function () {
                        window.location.href = 'student/dashboard_student.php'; // Ensure correct redirection
                    }, 1000);
                  } else {
                    registrationNotification("Please Check your username and Password", false, 'Login Failed');
                  }
              }else {
                console.error("Error: Unable to connect to the server.");
                registrationNotification("An error occurred. Please try again later.", false, 'Error');
            }
          };
          xhr.onerror = function () {
            console.error("Error: Network error occurred.");
            registrationNotification("Network error. Please check your connection.", false, 'Error');
          };
          
          xhr.send(formData);
      } else {
        registrationNotification("Passwords do not match", 'warning');
      }
  });

  function registrationNotification(message, isLoading = false, header = '') {
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