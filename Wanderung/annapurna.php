<?php 
        
$title = 'Annapurna';
include './inc/header.php';
        
?>

<h1><?php echo $title; ?>: Ein Ratgeber</h1>
<p>Alles, was Sie wissen müssen, um Ihre Trekking-Reise in Nepal zu planen und zu genießen.</p>

<section>
    <h2>Einführung</h2>
    <p>Der Annapurna Circuit Trek, gelegen im Herzen Nepals, ist eine der bekanntesten und beeindruckendsten Trekking-Routen der Welt...</p>
</section>

<section>
    <h2>Reiseplanung und beste Reisezeit</h2>
    <p>Die Planung Ihrer Reise ist von entscheidender Bedeutung, ebenso wie die Wahl der besten Zeit für den Trek...</p>
    <?php       
    
    $kilometer = 230;
    include './inc/laengen/km-mi.php';
        
    ?>
</section>

<section>
    <h2>Vorbereitung und Packliste</h2>
    <p>Höhenkrankheit, Kälte und lange Trekking-Tage erfordern eine sorgfältige Vorbereitung und Ausrüstung...</p>
    <div class="packliste">
        <h3>Vollständige Packliste</h3>
        <?php 
        
        include './inc/packlisten/annapurna.php';

        foreach ($packliste as $item) {
            echo $item . "<br>";
        }
        
        ?>
    </div>
    <div class="packliste werbung">
        <h3>Beworbene Gegenstände</h3>
        <?php
        
        echo $packliste[1]."<br>".$packliste[4];
        
        ?>
    </div>
    <div class="packliste anzahl">
        <h3>Anzahl der Gegenstände</h3>
        <?php

        $gezaehlt = count($packliste);
        echo $gezaehlt.' Gegenstände';

        ?>
    </div>
</section>

<section>
    <h2>Unterkünfte und Verpflegung auf dem Weg</h2>
    <p>Auf dem Annapurna Circuit Trek kommen Sie in gemütlichen Teehäusern unter und probieren lokale Gerichte...</p>
</section>

<section>
    <h2>Sicherheit und Gesundheit</h2>
    <p>Die Höhe und die anspruchsvollen Bedingungen des Treks erfordern besondere Vorsichtsmaßnahmen und Vorkehrungen...</p>
</section>

<section>
    <h2>Kultur und Etikette</h2>
    <p>Nepal hat eine reiche Kultur und Geschichte. Hier sind einige Dinge, die Sie über die lokale Etikette wissen sollten...</p>
</section>
<section>
    <h2>Kommentar schreiben</h2>
    <form action="./inc/comments/conn.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="comment">Kommentar:</label>
        <textarea name="comment" rows="4" cols="50" required></textarea>
        <br>
        <label for="option">Sie kommentieren:</label>
        <input type="text" name="trail" value="<?php echo $title; ?>" readonly>
        <br>
        <input type="submit" value="Kommentar speichern">
    </form>
</section>
<section>
    <h2>Kommentare lesen</h2>
    <?php include './inc/comments/save.php'; ?>
</section>

<?php include './inc/footer.php'; ?>