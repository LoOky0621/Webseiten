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
            <h1>Bitte Anmelden</h1>
            <!-- Anmeldeformular -->
            <form method="POST" action="AnSenden.php">
                <label for="username">Username:</label>
                <br>
                <input type="text" name="name" id="username" required><br><br>

                <label for="password">Passwort:</label>
                <br>
                <input type="password" name="password" id="password" required><br><br>

                <input type="submit" value="Anmelden">
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