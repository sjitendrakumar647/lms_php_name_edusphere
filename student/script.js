// Set the progress bar width based on data-progress attribute
document.addEventListener('DOMContentLoaded', function() {
    const progressIndicators = document.querySelectorAll('.progress-indicator');
    progressIndicators.forEach(indicator => {
        const progress = indicator.getAttribute('data-progress');
        indicator.style.setProperty('--progress-width', progress + '%');
    });
    
    // Add hover effect for menu items
    const menuItems = document.querySelectorAll('.sidebar-nav li');
    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'translateX(5px)';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});



// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.edu-navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Dropdown animation
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    
    if (dropdownToggle && dropdownMenu) {
        dropdownToggle.addEventListener('click', function() {
            setTimeout(() => {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.add('dropdown-animation');
                } else {
                    dropdownMenu.classList.remove('dropdown-animation');
                }
            }, 10);
        });
    }

    // Navbar links hover effect
    const navLinks = document.querySelectorAll('.nav-link-animation');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Add ripple effect to buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;
            
            const ripple = document.createElement('span');
            ripple.classList.add('ripple-effect');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Function to preview the selected image before upload
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;
            
            // Add animation to the preview
            imagePreview.style.transform = 'scale(0.8)';
            setTimeout(() => {
                imagePreview.style.transform = 'scale(1)';
            }, 200);
        }
        
        reader.readAsDataURL(input.files[0]);
        
        // Update file upload label
        const fileName = input.files[0].name;
        const fileLabel = document.querySelector('.file-upload-label');
        if (fileLabel) {
            fileLabel.innerHTML = `<i class="bi bi-check-circle"></i> ${fileName}`;
            fileLabel.style.borderColor = '#4361ee';
            fileLabel.style.color = '#4361ee';
        }
    }
}

// Add CSS for ripple effect
document.head.insertAdjacentHTML('beforeend', `
<style>
.ripple-effect {
    position: absolute;
    background: rgba(255, 255, 255, 0.4);
    border-radius: 50%;
    pointer-events: none;
    width: 100px;
    height: 100px;
    transform: translate(-50%, -50%) scale(0);
    animation: ripple 0.6s linear;
}

@keyframes ripple {
    to {
        transform: translate(-50%, -50%) scale(4);
        opacity: 0;
    }
}
</style>
`);