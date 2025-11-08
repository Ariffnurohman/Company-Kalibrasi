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


  const waButton = document.getElementById('waButton');
  const waPopup = document.getElementById('waPopup');
  const waClose = document.getElementById('waClose');

  waButton.addEventListener('click', () => {
    waPopup.classList.toggle('show');
  });

  waClose.addEventListener('click', () => {
    waPopup.classList.remove('show');
  });


  