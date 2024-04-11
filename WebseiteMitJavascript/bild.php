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
            <h1>Bild hochladen</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                Wählen Sie ein Bild aus: <br>
                <input type="file" name="image" class="button2"><br>
                <input type="submit" value="Hochladen" class="button2">
            </form>
            <img src="Bilder/upload.png" style="width:60%; height:40%;">

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