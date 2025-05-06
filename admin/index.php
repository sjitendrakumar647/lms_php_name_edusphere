<?php include('../header.php'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    
    body {
      background: linear-gradient(to bottom, #f79df8, #4a5ae9);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    
    .login-container {
      width: 100%;
      max-width: 1000px;
      background: #f5f7fa;
      border-radius: 20px;
      overflow: hidden;
      display: flex;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      position: relative;
      background: #f5f7fa40;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }
    
    .left-panel {
      background: #c41c54;
      background-image: url("data:image/svg+xml,%3Csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3Cpattern id='pattern' width='40' height='40' viewBox='0 0 40 40' patternUnits='userSpaceOnUse' patternTransform='rotate(45)'%3E%3Crect width='100%25' height='100%25' fill='%23c41c54'/%3E%3Cpath d='M0 20 L40 20 M20 0 L20 40' stroke='%23b51a4e' stroke-width='2'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23pattern)'/%3E%3C/svg%3E");
      color: white;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 40%;
      position: relative;
    }
    
    .left-panel::after {
      content: "";
      position: absolute;
      top: 0;
      right: -100px;
      width: 200px;
      height: 100%;
      background: #c41c54;
      background-image: url("data:image/svg+xml,%3Csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3Cpattern id='pattern' width='40' height='40' viewBox='0 0 40 40' patternUnits='userSpaceOnUse' patternTransform='rotate(45)'%3E%3Crect width='100%25' height='100%25' fill='%23c41c54'/%3E%3Cpath d='M0 20 L40 20 M20 0 L20 40' stroke='%23b51a4e' stroke-width='2'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23pattern)'/%3E%3C/svg%3E");
      border-radius: 0 100% 100% 0 / 50%;
      z-index: 1;
    }
    
    .right-panel {
      padding: 40px;
      width: 60%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      position: relative;
      z-index: 2;
    }
    
    .book-now {
      background: rgba(255, 255, 255, 0.2);
      padding: 5px 15px;
      border-radius: 4px;
    }
    
    .dashboard-title {
      margin-bottom: 10px;
      font-size: 20px;
      font-weight: 500;
    }
    
    .admin-login-title {
      font-size: 45px;
      font-weight: 700;
      z-index: 10;
    }
    
    .logo {
      margin-bottom: 30px;
    }
    
    .logo img {
      width: 150px;
      height: auto;
    }
    
    .welcome-text {
      text-align: center;
      margin-bottom: 30px;
    }
    
    .welcome-text h2 {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      margin-bottom: 5px;
    }
    
    .welcome-text p {
      color: #666;
      font-size: 14px;
    }
    
    .login-form {
      width: 100%;
      max-width: 350px;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      color: #333;
      background-color: #dddddd48;
    }
    
    .form-control:focus {
      outline: none;
      border-color: #2a1cc4;
      box-shadow: 0 0 0 2px rgba(63, 51, 234, 0.3);
      background-color: #dddddd48;

    }
    
    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      font-size: 13px;
    }
    
    .checkbox-container {
      display: flex;
      align-items: center;
    }
    
    .checkbox-container input {
      margin-right: 8px;
    }
    
    .forgot-password {
      color: #666;
      text-decoration: none;
    }
    
    .forgot-password:hover {
      text-decoration: underline;
    }
    
    .login-btn {
      width: 100%;
      padding: 12px;
      background: linear-gradient(to right, #2d1cc4, #b51aa3);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      /* transition: background 0.5s ease;  */
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease-in-out;
    }

        .login-btn::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease-in-out;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
        }

        .login-btn:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .login-btn:hover {
          background: linear-gradient(to right, #b51aa3, #2d1cc4); 
            transform: scale(1.05);
        }
    
    .privacy-text {
      margin-top: 30px;
      font-size: 12px;
      color: #2a2929;
      text-align: center;
      max-width: 350px;
      line-height: 1.5;
    }
    
    .footer {
      margin-top: 30px;
      color: white;
      font-size: 14px;
      font-weight: 500;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
      }
      
      .left-panel {
        width: 100%;
        padding: 30px;
      }
      
      .left-panel::after {
        display: none;
      }
      
      .right-panel {
        width: 100%;
        padding: 30px;
      }
      .admin-login-title {
      font-size: 35px;
    }
      
    }
  </style>
<body id="login" class="alert alert-info">
    <div class="login-container">
    
    <div class="left-panel">
      <div class="dashboard-title">MY DASHBOARD</div>
      <div class="admin-login-title">ADMIN LOGIN</div>
    </div>
    
    <div class="right-panel">
      <div class="logo">
        <svg width="150" height="50" viewBox="0 0 150 50" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="30" cy="25" r="20" fill="#1E88E5"/>
          <path d="M20 25C20 19.5 24.5 15 30 15C35.5 15 40 19.5 40 25C40 30.5 35.5 35 30 35C24.5 35 20 30.5 20 25Z" fill="#1E88E5"/>
          <path d="M30 15C24.5 15 20 19.5 20 25C20 30.5 24.5 35 30 35C35.5 35 40 30.5 40 25C40 19.5 35.5 15 30 15ZM30 32C26.1 32 23 28.9 23 25C23 21.1 26.1 18 30 18C33.9 18 37 21.1 37 25C37 28.9 33.9 32 30 32Z" fill="white"/>
          <path d="M30 18C26.1 18 23 21.1 23 25C23 28.9 26.1 32 30 32C33.9 32 37 28.9 37 25C37 21.1 33.9 18 30 18ZM30 29C27.8 29 26 27.2 26 25C26 22.8 27.8 21 30 21C32.2 21 34 22.8 34 25C34 27.2 32.2 29 30 29Z" fill="#1E88E5"/>
          <path d="M35 22L38 19M22 31L25 28M25 22L22 19M38 31L35 28" stroke="white" stroke-width="1"/>
          <path d="M50 25H55M55 25C55 23 56 20 60 20C64 20 65 23 65 25C65 27 64 30 60 30C56 30 55 27 55 25Z" stroke="#1E88E5" stroke-width="2"/>
          <path d="M67 20H70V30H67V20Z" fill="#1E88E5"/>
          <path d="M72 20H75L80 25L75 30H72L77 25L72 20Z" fill="#1E88E5"/>
          <path d="M82 20H85L90 25L85 30H82L87 25L82 20Z" fill="#1E88E5"/>
          <path d="M92 20H95V30H92V20Z" fill="#1E88E5"/>
          <path d="M97 25C97 22 99 20 102 20C105 20 107 22 107 25C107 28 105 30 102 30C99 30 97 28 97 25Z" fill="#1E88E5"/>
          <path d="M109 20H112V30H109V20Z" fill="#1E88E5"/>
          <path d="M114 20H124V22H117V24H123V26H117V28H124V30H114V20Z" fill="#1E88E5"/>
          <path d="M126 20H136V22H129V24H135V26H129V28H136V30H126V20Z" fill="#1E88E5"/>
          <path d="M138 20H148C150 20 150 22 150 23C150 24 150 25 148 25L150 30H147L145 25H141V30H138V20ZM141 23H147C147.5 23 147.5 22.5 147.5 22C147.5 21.5 147.5 21 147 21H141V23Z" fill="#1E88E5"/>
          <path d="M60 35L65 35" stroke="#1E88E5" stroke-width="1"/>
          <text x="60" y="40" font-family="Arial" font-size="8" fill="#1E88E5">experience the service</text>
        </svg>
      </div>
      
      <div class="welcome-text">
        <h2>WELCOME BACK!</h2>
        <p>Please login to view your dashboard</p>
      </div>
      
      <form class="login_form">
        <div class="form-group">
          <input type="text" class="form-control"id="username" name="username" placeholder="User Name" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        
        <div class="form-options">
          <div class="checkbox-container">
            <input type="checkbox" id="remember-me" checked>
            <label for="remember-me">Keep me logged in</label>
          </div>
          <a href="#" class="forgot-password">Forgot password? Reset now</a>
        </div>
        
        <button type="submit" class="login-btn">LOGIN</button>
      </form>
      
      <div class="privacy-text">
        By signing in you accept all our terms and conditions, privacy policy and cookie policy. We however do not use any third-party vendor to share your data and its safe with us.
      </div>
    </div>
  </div>
  
  <div class="footer">
    www.edusphere.com | call: +91-00000 00000
  </div>
    <script>
            document.addEventListener("DOMContentLoaded", function () {
                const loginForm = document.querySelector(".login_form"); // Use the correct selector

                loginForm.addEventListener("submit", function (e) {
                    e.preventDefault();

                    let formData = new FormData(this);

                    fetch("login.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.text())
                    .then(html => {
                        console.log("Server Response:", html); // Debug the server response

                        if (html.trim() === 'true') {
                            showNotification("Welcome to Edusphere Learning Management System", "Access Granted");
                            setTimeout(() => window.location.href = 'dashboard/dashboard.php', 2000); // Ensure correct redirection
                        } else {
                            showNotification("Please Check your username and Password", "Login Failed");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showNotification("An error occurred. Please try again later.", "Error");
                    });
                });

                function showNotification(message, header) {
                    let notification = document.createElement("div");
                    notification.className = "alert alert-info shadow-lg position-fixed top-0 end-0 m-3 p-3";
                    notification.innerHTML = `<strong>${header}</strong><br>${message}`;
                    document.body.appendChild(notification);
                    setTimeout(() => notification.remove(), 3000);
                }
            });
        </script>
</body>
</html>