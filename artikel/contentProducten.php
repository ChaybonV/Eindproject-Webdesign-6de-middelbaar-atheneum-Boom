<div id="container">
    <div id="content-buttons">
        <button type="submit" class="knopfunctie" id="button-kerstballen" onclick="scrollToSection('Kerstballen')">Kerstballen</button>
        <button type="submit" class="knopfunctie" id="button-kerstlampen" onclick="scrollToSection('Kerstlampen')">Kerstlampen</button>
        <button type="submit" class="knopfunctie" id="button-kerstbomen" onclick="scrollToSection('Kerstbomen')">Kerstbomen</button>
    </div>

    <?php
    $sql = "SELECT A1.*, A2.categorieNaam FROM artikelen AS A1 INNER JOIN artikelen_categorie AS A2 ON A1.categorieID = A2.categorieID ORDER BY A1.categorieID";
    $queryresult = $connect->query($sql);
    if ($queryresult->num_rows>0) {
        $huidigeCategorie = ""; 
        while ($endresult = $queryresult->fetch_assoc()) {
            if ($huidigeCategorie != $endresult['categorieNaam']) { 
                $huidigeCategorie = $endresult['categorieNaam'];
                echo "<div id='$huidigeCategorie' class='Hoofdtitels'><b>$huidigeCategorie:</b></div>"; 
            }
            ?>

            <div class="producten">
                <img src="../images/<?php echo $endresult['foto'] ?>">
                <p><b><?php echo $endresult['artikelNaam'] ?></b></p>
                <p><b>&euro; <?php echo $endresult['prijs'] ?></b></p>
                <input type="submit" id="button-detail" value="Bekijk product" onclick="window.location='artikel_details.php?artikelID=<?php echo $endresult['artikelID'] ?>'">
            </div>

        <?php
        }
    } else {
        echo "Geen resultaten";
    }
    $connect->close();
    ?>
</div>
<script src="<?php echo $hoofdmap ?>design/js/script2.js"></script>