<?php 
        
$title = 'Inkatrail';
include './inc/header.php';
        
?>

<h1><?php echo $title; ?>: Ein Ratgeber</h1>
<p>Alles, was Sie wissen müssen, um Ihre Wanderung zum Machu Picchu zu planen und zu genießen.</p>

<section>
    <h2>Einführung</h2>
    <p>Der Inka Trail, der zur berühmten archäologischen Stätte Machu Picchu führt, ist einer der bekanntesten und atemberaubendsten Wanderwege in Südamerika...</p>
</section>

<section>
    <h2>Reiseplanung und Genehmigungen</h2>
    <p>Die Planung Ihrer Reise zum Inka Trail erfordert einige spezifische Schritte, einschließlich der rechtzeitigen Beantragung einer Wandererlaubnis...</p>
    <?php       
    
    $kilometer = 45;
    include './inc/laengen/km-mi.php';
        
    ?>

</section>

<section>
    <h2>Vorbereitung und Packliste</h2>
    <p>Die Vorbereitung auf den Inka Trail erfordert sorgfältige Überlegungen hinsichtlich des Wetters, der Höhenkrankheit und der Anforderungen des Trails...</p>
    <div class="packliste">
        <h3>Vollständige Packliste</h3>
        <?php 
        
        include './inc/packlisten/inkatrail.php';

        foreach ($packliste as $item) {
            echo $item . "<br>";
        }
        
        ?>
    </div>
    <div class="packliste optional">
        <h3>Optionale Packliste</h3>
        <?php
        
        echo $packliste[0];
        
        ?>
    </div>
    <div class="packliste notwendig">
        <h3>Notwendige Packliste</h3>
        <?php
        
        array_shift($packliste);

        foreach ($packliste as $item) {
            echo $item . "<br>";
        } 
        
        ?>
    </div>
    <div class="packliste anzahl">
        <h3>Anzahl der notwendigen Gegenstände</h3>
        <?php

        $gezaehlt = count($packliste);
        echo $gezaehlt.' Gegenstände';

        ?>
    </div>
</section>

<section>
    <h2>Unterkünfte und Verpflegung auf dem Weg</h2>
    <p>Auf dem Inka Trail verbringen Sie die Nächte in Zelten und essen Mahlzeiten, die von Ihrem Trekkingteam zubereitet werden...</p>
</section>

<section>
    <h2>Sicherheit und Gesundheit</h2>
    <p>Wie bei jeder anspruchsvollen Wanderung, sind auch beim Inka Trail spezielle Sicherheits- und Gesundheitsmaßnahmen zu beachten...</p>
</section>

<section>
    <h2>Kultur und Geschichte</h2>
    <p>Der Inka Trail ist ein Pfad mit einer reichen Geschichte und Kultur. Hier sind einige wichtige Informationen, die Sie kennen sollten...</p>
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