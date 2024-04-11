<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include "head.php";
    ?>
</head>

<body>
    <?php
    include("navUser.php");
    ?>

    <main>
        <div class="hauptbox">
            <h1>LOGOUT</h1>
            <?php
            // Starte die Sitzung
            session_start();

            // Sitzung beenden und alle Sitzungsdaten löschen
            session_destroy();

            // Weiterleitung zur Startseite oder einer anderen Seite nach dem Ausloggen
            header("Location: index.php"); // Ändern Sie "index.php" entsprechend Ihrer Startseite
            header("refresh:1;url=index.php");
            ?>
        </div>
        <div id="overlay-container" class="overlay-container">
        </div>
    </main>
    <footer>
        <!-- Footer-Inhalt -->
    </footer>
    <script src="script.js"></script>
</body>

</html>