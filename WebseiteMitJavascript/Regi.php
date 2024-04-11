<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include("head.php");
    ?>
</head>

<body>
    <?php
    include("navUser.php");
    ?>

    <main>
        <div class="hauptbox">
            <h2>Registrieren Sie sich</h2>
            <form method="post" action="RegiSenden.php">
                <label for="username">Username:</label>
                <br>
                <input type="text" name="username" required><br><br>

                <label for="password1">Passwort:</label>
                <br>
                <input type="password" name="password1" required><br><br>

                <label for="password2">Passwort:</label>
                <br>
                <input type="password" name="password2" required><br><br>

                <label for="email">E-Mail:</label>
                <br>
                <input type="email" name="email" required><br><br>



                <input type="submit" value="Registrieren">
            </form>
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