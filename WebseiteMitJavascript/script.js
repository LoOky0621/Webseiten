document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const menuContainer = document.getElementById("menu-container");
    const overlayContainer = document.getElementById("overlay-container");

    // Event-Listener für das Menü-Overlay
    function toggleMenu() {
        menuContainer.classList.toggle("active");
        overlayContainer.classList.toggle("active");
    }

    menuToggle.addEventListener("click", toggleMenu);

    overlayContainer.addEventListener("click", toggleMenu);

    // Event-Listener für die Menüpunkte
    const menuItems = document.querySelectorAll("#menu-container ul li a");
    menuItems.forEach(function (menuItem) {
        menuItem.addEventListener("click", function () {
            menuContainer.classList.remove("active");
            overlayContainer.classList.remove("active");
        });
    });
});
