<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solarenergie GmbH</title>
    <link rel="stylesheet" href="styles.css"> <!-- Verweis auf das CSS-Stylesheet -->
    <script src="script.js"></script> <!-- Verweis auf das JavaScript-Datei -->
</head>

<body>
    <!-- Der Menü-Button bleibt im Header -->
    <header id="header">
        <a id="header-icon" href="" title="Solarenergie GmbH"></a>
        <!-- Der Menü-Button mit dem Klickereignis "toggleMenu()" -->
        <a onclick="toggleMenu()"><img src="Bilder/logo.png" id="menu-icon" alt="logo" /></a>
    </header>

    <!-- Das Off-Canvas-Menü außerhalb des sichtbaren Bereichs -->
    <div id="off-canvas-menu" class="off-canvas-menu">
        <ul class="menu" id="menuItems">
            <!-- Menüpunkte -->
            <li><a href="#">Startseite</a></li>
            <li><a href="#">Über uns</a></li>
            <li><a href="#">Dienstleistungen</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
        <!-- Hinzugefügte breite, transparente Box -->
    </div>
    <div class="wide-transparent-box"></div>


    <!-- Abschnitte der Webseite -->
    <section id="start" class="bg-grey user-interface">
        <div class="section-overlay">
            <?php 
            include("willkommen.php"); // Einbindung von Inhalten aus "willkommen.php"
            ?>
        </div>
    </section>
    <section id="über-uns" class="bg-white user-interface">
        <?php 
            include("ueber_us.php"); // Einbindung von Inhalten aus "ueber_us.php"
            ?>
    </section>
    <section id="dienstleistungen" class="bg-grey user-interface">
        <?php 
            include("dienstleistungen.php"); // Einbindung von Inhalten aus "dienstleistungen.php"
            ?>
    </section>
    <section id="kontakt" class="bg-white user-interface">
        <?php 
            include("kontakt.php"); // Einbindung von Inhalten aus "kontakt.php"
            ?>
    </section>

    <!-- Zurück-nach-oben-Button -->
    <button id="back-to-top">Nach oben</button>

    <!-- JavaScript-Code -->
    <script>
    const backToTopButton = document.getElementById('back-to-top');
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'block'; // Anzeigen des Zurück-nach-oben-Buttons
        } else {
            backToTopButton.style.display = 'none'; // Ausblenden des Zurück-nach-oben-Buttons
        }
    });
    backToTopButton.addEventListener('click', (event) => {
        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    const backToTopButton = document.getElementById('back-to-top');
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'block'; // Anzeigen des Zurück-nach-oben-Buttons
        } else {
            backToTopButton.style.display = 'none'; // Ausblenden des Zurück-nach-oben-Buttons
        }
    });
    backToTopButton.addEventListener('click', (event) => {
        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    function toggleMenu() {
        const menu = document.getElementById('off-canvas-menu');
        const wideTransparentBox = document.querySelector('.wide-transparent-box');

        if (menu.style.left === '-250px') {
            menu.style.left = '0';
            wideTransparentBox.style.left = '250px';
        } else {
            menu.style.left = '-250px';
            wideTransparentBox.style.left = '0';
        }
    }
    </script>
</body>

</html>