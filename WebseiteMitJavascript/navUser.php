<header>
    <button id="menu-toggle" class="button" style="height: 5vw">Menü</button>
</header>
<div id="menu-container">
    <nav>
        <ul>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li><a href="nutzer.php" class="button" style="width:90%">DatenBank</a></li>';
                echo '<li><a href="galerie.php" class="button" style="width:90%">Galerie</a></li>';
                echo '<li><a href="bild.php" class="button" style="width:90%">UpLoad</a></li>';
                echo '<li><a href="add.php" class="button" style="width:90%">Add</a></li>';
                echo '<li><a href="mo.php" class="button" style="width:90%">Memory</a></li>';
                echo '<li><a href="logout.php" class="button" style="width:90%; background-color:red">Logout</a></li>';
                echo '<li><a href="nutzerdaten.php" class="button" style="width:90%; background-color:red">Datenhinzu</a></li>';
            } else {
                echo '<li><a href="Regi.php" class="button" style="width:90%">Registrierung</a></li>';
                echo '<li><a href="Anmeldung.php" class="button" style="width:90%">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>