document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("theme-toggle");
    const body = document.body;
  
    // Cek mode dari localStorage
    if (localStorage.getItem("theme") === "dark") {
      body.classList.add("dark-mode");
      body.classList.remove("light-mode");
      toggleBtn.textContent = "☀️";
    } else {
      body.classList.add("light-mode");
      toggleBtn.textContent = "🌙";
    }
  
    // Toggle event
    toggleBtn.addEventListener("click", () => {
      if (body.classList.contains("light-mode")) {
        body.classList.remove("light-mode");
        body.classList.add("dark-mode");
        toggleBtn.textContent = "☀️";
        localStorage.setItem("theme", "dark");
      } else {
        body.classList.remove("dark-mode");
        body.classList.add("light-mode");
        toggleBtn.textContent = "🌙";
        localStorage.setItem("theme", "light");
      }
    });
  });
  