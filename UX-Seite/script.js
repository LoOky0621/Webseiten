
// script.js
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const mainNav = document.getElementById("main-nav");

    menuToggle.addEventListener("click", function () {
        if (mainNav.style.display === "block") {
            mainNav.style.display = "none";
        } else {
            mainNav.style.display = "block";
        }
    });
});
