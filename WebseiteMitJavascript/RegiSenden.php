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
            <?php

            $registriert = isset($_SESSION['registriert']) && $_SESSION['registriert'] === true;

            if ($registriert) {
                echo '<h1>Sie können sich jetzt einloggen.</h1>';
                echo '<a href="Anmeldung.php" class="button" style="width:90%">Hier Klicken</a>';
            } else {
                echo '<h1>Bitte registrieren Sie sich.</h1>';
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password1 = $_POST["password1"];
                $password2 = $_POST["password2"];
                $email = $_POST["email"];

                if ($password1 == $password2) {
                    $stmt = $conn->prepare("INSERT INTO login (UserName, Password, EMail) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $username, $password1, $email);

                    if ($stmt->execute()) {
                        echo "<h1>Registrierung erfolgreich!</h1>";
                        $_SESSION['registriert'] = true;
                        header("refresh:5;url=Anmeldung.php");
                        echo "<h1>Sie werden gleich weitergeleitet</h1>";
                    } else {
                        //echo "<h1>Fehler bei der Registrierung: " . $stmt->error . "</h1>";
                        echo "<h1>UserName ist schon Vorhanden!</h1>";
                        header("refresh:3;url=Regi.php");
                    }

                    $stmt->close();
                } else {
                    echo "<h1>Die angegebenen Passwörter stimmen nicht überein</h1>";
                    header("refresh:3;url=Regi.php");
                }
            }

            $conn->close();
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