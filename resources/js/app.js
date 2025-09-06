// active-menu.js
document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");
    const currentLocation = window.location.href;
  
    navLinks.forEach(link => {
      if (link.href === currentLocation) {
        link.classList.add("active");
      }
    });
  });
  