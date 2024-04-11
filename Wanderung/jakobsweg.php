<?php 
        
$title = 'Jakobsweg';
include './inc/header.php';
        
?>

<h1><?php echo $title; ?>: Ein Ratgeber</h1>
<p>Alles, was Sie wissen müssen, um Ihre Pilgerreise zu planen und zu genießen.</p>

<section>
    <h2>Einführung</h2>
    <p>Der Jakobsweg, auch bekannt als Camino de Santiago, ist eine berühmte Pilgerreise...</p>
</section>

<section>
    <h2>Routenwahl</h2>
    <p>Es gibt viele Routen, die nach Santiago de Compostela führen, aber einige sind beliebter und besser ausgestattet...</p>
    <?php       
    
    $kilometer = 783;
    include './inc/laengen/km-mi.php';
        
    ?>

</section>

<section>
    <h2>Vorbereitung und Packliste</h2>
    <p>Ein gut vorbereiteter Pilger ist ein glücklicher Pilger. Hier sind einige Tipps, was Sie mitnehmen sollten...</p>
    <div class="packliste">
        <h3>Vollständige Packliste</h3>
        <?php 
        
        include './inc/packlisten/jakobsweg.php';

        foreach ($packliste as $item) {
            echo $item . "<br>";
        }
        
        ?>
    </div>
    <div class="packliste optional">
        <h3>Optionale Packliste</h3>
        <?php
        
        echo $packliste[4];
        
        ?>
    </div>
    <div class="packliste notwendig">
        <h3>Notwendige Packliste</h3>
        <?php
        
        array_pop($packliste);

        foreach ($packliste as $item) {
            echo $item . "<br>";
        } 
        
        ?>
    </div>
</section>

<section>
    <h2>Unterkünfte auf dem Weg</h2>
    <p>Unterwegs werden Sie auf verschiedene Arten von Unterkünften stoßen, von Herbergen bis hin zu Hotels...</p>
</section>

<section>
    <h2>Sicherheit und Gesundheit</h2>
    <p>Die Sicherheit und Gesundheit auf dem Camino sind sehr wichtig. Hier sind einige Tipps, um gesund und sicher zu bleiben...</p>
</section>

<section>
    <h2>Kultur und Etikette</h2>
    <p>Der Jakobsweg hat eine lange Geschichte und eine reiche Kultur. Hier sind einige Dinge, die Sie wissen sollten...</p>
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