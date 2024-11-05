<div id="container">
    <h1>Winkelwagen</h1>
    <div id="left">
        <table>
            <?php
            $klantID = $_SESSION["klantID"];
            $winkelwagen = array(); 
            $totaalprijs = 0;

            $sql = "SELECT A2.foto,A2.artikelNaam,A2.prijs FROM winkelwagen AS A1 INNER JOIN artikelen AS A2 ON A1.artikelID = A2.artikelID WHERE A1.klantID=$klantID";
            $queryresult = $connect->query($sql);
            if ($queryresult->num_rows > 0) {
                while ($endresult = $queryresult->fetch_assoc()) {
            ?>
            <tr>
                <td><img src="../images/<?php echo $endresult['foto'] ?>" width="165px"></td>
            </tr>
            <tr>
                <td style="border-bottom: 2px solid white;"><b><?php echo $endresult['artikelNaam'] ?></b></td>
            </tr>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>Geen resultaten<br><a href='../artikel/index.php'>Verder winkelen</a></td></tr>";
                }
            ?>
        </table>
    </div>
    <div id="right">
        <form name="formulier" method="post">
            <table>
                <tr>
                    <td style="border-bottom: 1px solid white;">Artikelnummer</td>
                    <td style="border-bottom: 1px solid white;">Artikel</td>
                    <td style="border-bottom: 1px solid white;">Hoeveelheid</td>
                    <td style="border-bottom: 1px solid white;">Totaalprijs</td>
                </tr>
                <?php
                $klantID = $_SESSION["klantID"];
                $winkelwagen = array(); 
                $totaalprijs = 0;

                $sql2 = "SELECT A1.*,A2.foto,A2.artikelNaam,A2.prijs FROM winkelwagen AS A1 INNER JOIN artikelen AS A2 ON A1.artikelID = A2.artikelID WHERE A1.klantID=$klantID";
                $queryresult2 = $connect->query($sql2);
                if ($queryresult2->num_rows > 0) {
                    while ($endresult = $queryresult2->fetch_assoc()) {
                        if (array_key_exists($endresult['artikelID'], $winkelwagen)) {
                            $winkelwagen[$endresult['artikelID']]['hoeveelheid'] += $endresult['hoeveelheid'];
                        } else {
                            $winkelwagen[$endresult['artikelID']] = $endresult;
                        }
                    }
                    foreach ($winkelwagen as $artikel) {
                ?>
                <tr>
                    <td><?php echo $artikel['artikelID'] ?></td>
                    <td><?php echo $artikel['artikelNaam'] ?></td>
                    <td><?php echo $artikel['hoeveelheid'] ?></td>
                    <td>&euro; <?php echo $artikel['prijs'] * $artikel['hoeveelheid'] ?></td>
                </tr>
                <tr>
                    <td>
                        <form name="formulier2" action="" method="post">
                            <input type="hidden" name="artikelID" value="<?php echo $artikel['artikelID']; ?>">
                            <input type="button" class="aanpassen-button" value="Aanpassen" onclick="promptAantal(this)">
                        </form>
                    </td>
                    <td>
                        <form name="verwijderen_form" action="" method="post">
                            <input type="hidden" name="verwijderen_<?php echo $artikel['artikelID']; ?>" value="Verwijderen">
                            <input type="submit" name="verwijderen_submit" value="Verwijderen">
                        </form>
                    </td>
                </tr>
                <?php
                    $totaalprijs+=$artikel['prijs'] * $artikel['hoeveelheid'];
                    }
                } else {
                    echo "<tr><td colspan='8'>Geen resultaten</td></tr>";
                }
                $_SESSION["totaleBestelling"] = $totaalprijs;
                ?>
            </table>
        </form>
    </div>
    <div id="right2">
        <?php
        $deleteMessage = "";
        foreach ($_POST as $key => $value) {
            if (substr($key, 0, 12) == 'verwijderen_') {
                $artikelID = substr($key, 12);
                $sqldelete = "DELETE FROM winkelwagen WHERE artikelID=$artikelID AND klantID=$klantID";
                $queryresultdelete = $connect->query($sqldelete);
                $deleteMessage = "<span id='sp'>Het artikel is verwijderd uit uw winkelwagen</span>";
            }
            if ($key == 'artikelID' && isset($_POST['nieuwAantal'])) {
                $artikelID = $_POST['artikelID'];
                $nieuwAantal = (int)$_POST['nieuwAantal'];
                    if ($nieuwAantal <= 0) {
                        $sqldelete = "DELETE FROM winkelwagen WHERE artikelID=$artikelID AND klantID=$klantID";
                        $queryresultdelete = $connect->query($sqldelete);
                        $deleteMessage = "<span id='sp'>Het artikel is verwijderd uit uw winkelwagen</span>";
                    } else {
                        $sqlupdate = "UPDATE winkelwagen SET hoeveelheid=$nieuwAantal WHERE artikelID=$artikelID AND klantID=$klantID";
                        $queryresultupdate = $connect->query($sqlupdate);
                        $deleteMessage = "<span id='sp'>Het aantal artikelen is bijgewerkt naar $nieuwAantal</span>";
                    }
            }
        }
        if (!empty($deleteMessage)) {
            echo $deleteMessage;
        }
        ?>
        <br>
        <b>:Totaalprijs</b> <?php echo $totaalprijs ?> &euro;
        <br>
        <input type="submit" id="bst" name="bestellen" value="Bestellen" onclick="window.location='../bestelling/index.php'">
    </div>
</div>
<script src="<?php echo $hoofdmap ?>design/js/script4.js"></script>