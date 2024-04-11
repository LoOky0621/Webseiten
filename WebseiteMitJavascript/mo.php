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
            <h1>Viel Vergnügen bei Memory</h1>
            <script>
                // Dateinamen in Array speichern
                const mem = ["Bilder/memory/arrow.gif", "Bilder/memory/bear.gif", "Bilder/memory/bin.gif",
                    "Bilder/memory/computer.gif", "Bilder/memory/dino01.gif", "Bilder/memory/dino02.gif",
                    "Bilder/memory/earth.gif",
                    "Bilder/memory/entertai.gif", "Bilder/memory/gif.gif", "Bilder/memory/IntExpl.gif",
                    "Bilder/memory/kermit.gif",
                    "Bilder/memory/key.gif", "Bilder/memory/marble.gif", "Bilder/memory/ms.gif",
                    "Bilder/memory/paint.gif", "Bilder/memory/people.gif",
                    "Bilder/memory/redstar.gif", "Bilder/memory/walkgman.gif"
                ];

                // Nummer des aktuellen Spielers, 0 oder 1
                let spieler = 0;

                // Punkte der Spieler
                const punkte = [0, 0];

                // Anzeige, welcher Spieler die Bilder gefunden hat
                const anzeige = ["Bilder/memory/dbrown.gif", "Bilder/memory/brown.gif"];

                // Nummer des ersten und des zweiten umgedrehten Bildes
                let erste, zweite;

                // Erstes oder zweites Bild?
                let erstesBild = true;

                // Während der Wartezeit kann nichts Anderes gemacht werden
                let warten = false;

                // Anzahl umgedrehter Paare, bei 18 ist Ende
                let anzahl = 0;

                // Jedes Bild zweimal anordnen
                for (let i = 0; i < 18; i++)
                    mem[i + 18] = mem[i];

                // Mischen
                for (let i = 1; i <= 500; i++) {
                    const p1 = parseInt(Math.random() * 36);
                    const p2 = parseInt(Math.random() * 36);
                    const temp = mem[p1];
                    mem[p1] = mem[p2];
                    mem[p2] = temp;
                }

                // Bild sichtbar machen
                function bilderSehen(e) {
                    if (warten) return;

                    // id der Quelle ermitteln
                    const id = e.target.id;

                    // Dateinummer des Bildes aus der ID ermitteln
                    const dateinummer = id.substr(2, 2);

                    if (mem[dateinummer] == "") return;

                    // Falls zweimal dasselbe Bild
                    if (dateinummer == erste) return;

                    // Falls erstes Bild
                    if (erstesBild) {
                        bild[dateinummer].src = mem[dateinummer];
                        erste = dateinummer;
                        erstesBild = false;
                    }

                    // Falls zweites Bild
                    else {
                        bild[dateinummer].src = mem[dateinummer];
                        bild[erste].src = mem[erste];
                        zweite = dateinummer;
                        erstesBild = true;
                        warten = true;

                        // Falls Paar gefunden
                        if (mem[erste] == mem[zweite]) {
                            mem[erste] = "";
                            mem[zweite] = "";
                            setTimeout(bilderEntfernen, 1000);
                        }

                        // Falls kein Paar gefunden
                        else
                            setTimeout(bilderUmdrehen, 2500);
                    }
                }

                // Bild wieder unsichtbar machen
                function bilderUmdrehen() {
                    bild[erste].src = "Bilder/memory/darkred.gif";
                    bild[zweite].src = "Bilder/memory/darkred.gif";
                    erste = "";

                    // Spielerwechsel
                    if (spieler == 0) {
                        bildSpieler.src = "Bilder/memory/brown.gif";
                        spieler = 1;
                    } else {
                        bildSpieler.src = "Bilder/memory/dbrown.gif";
                        spieler = 0;
                    }

                    warten = false;
                }

                // Bild entfernen, falls Paar gefunden
                function bilderEntfernen() {
                    // Anzeige, welcher Spieler die Bilder gefunden hat
                    bild[erste].src = anzeige[spieler];
                    bild[zweite].src = anzeige[spieler];
                    punkte[spieler]++;
                    warten = false;

                    // Spiel zu Ende?
                    anzahl++;
                    if (anzahl > 17) {
                        let text;
                        if (punkte[0] > punkte[1])
                            text = "Spieler 1 hat mit " + punkte[0] + " zu " + punkte[1] + " gewonnen.";
                        else if (punkte[1] > punkte[0])
                            text = "Spieler 2 hat mit " + punkte[1] + " zu " + punkte[0] + " gewonnen.";
                        else
                            text = "Unentschieden.";

                        if (confirm(text + " Noch einmal ?"))
                            location.href = "Bilder/memory/memory.htm";
                    }
                }

                function regeln() {
                    if (warten)
                        return;
                    alert("Klicken Sie zwei Bilder an. Die Bilder bleiben 2-3 Sekunden sichtbar.\n" +
                        "Falls Sie zwei gleiche Bilder gefunden haben, bekommen Sie zwei Punkte.\n");
                }
            </script>
            <table>
                <tr>
                    <td style="text-align:center;" colspan="6">Memory, für zwei Spieler</td>
                </tr>
                <script>
                    for (let i = 0; i < 6; i++) {
                        document.write("<tr>");
                        for (let k = 0; k < 6; k++)
                            document.write("<td><img id='id" + (i * 6 + k) +
                                "' src='Bilder/memory/darkred.gif' style='width:32px; height:32px;' alt='Bild'></td>");
                        document.write("</tr>");
                    }
                </script>
                <tr>
                    <td colspan="2"><input id="idRegeln" type="button" value="Regeln"></td>
                    <td colspan="3">Spieler:</td>
                    <td><img id="idSpieler" src="Bilder/memory/dbrown.gif" alt="Spieler"></td>
                </tr>
            </table>

            <script>
                const bild = new Array(36);
                for (let i = 0; i < 36; i++) {
                    bild[i] = document.getElementById("id" + i);
                    bild[i].addEventListener("click", bilderSehen);
                }
                const bildSpieler = document.getElementById("idSpieler");
                document.getElementById("idRegeln").addEventListener("click", regeln);
            </script>

        </div>
        <div id="overlay-container" class="overlay-container">
        </div>
    </main>
    <footer>

    </footer>
    <script src="script.js"></script>
</body>

</html>