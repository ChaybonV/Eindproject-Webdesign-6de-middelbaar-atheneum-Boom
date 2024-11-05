<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="design/css/styleHome.css">
    <title>Hoofdpagina GIP Chaybon Verlooy</title>
</head>
<body onload="slidesVeranderen()">

<?php

$hoofdmap = "";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");

?>
<div id="container">
    <div id="contentContainer">
        <div class="content">
            <?php
            $sql = "SELECT foto FROM artikelen WHERE categorieID = 1 ORDER BY RAND() LIMIT 3";
            $queryresult = $connect->query($sql);
                        
            if ($queryresult->num_rows > 0) {
                while($endresult = $queryresult->fetch_assoc()) {
                    echo '<div class="slide"><img src="images/'.$endresult["foto"].'"></div>';
                }
            }
            ?>
        </div>
        <div class="blokBol">
            <span class="bol active"></span>
            <span class="bol"></span>
            <span class="bol"></span>
        </div>
    </div>   
    <div id="hoofdTitels"><b>Categoriën:</b></div>     
    <?php
    $sql_kerstballen = "SELECT foto FROM artikelen WHERE artikelID = 4 LIMIT 1";
    $queryresult_kerstballen = $connect->query($sql_kerstballen);
    $endresult_kerstballen = $queryresult_kerstballen->fetch_assoc();

    $sql_kerstlampen = "SELECT foto FROM artikelen WHERE categorieID = 2 LIMIT 1";
    $queryresult_kerstlampen = $connect->query($sql_kerstlampen);
    $endresult_kerstlampen = $queryresult_kerstlampen->fetch_assoc();

    $sql_kerstbomen = "SELECT foto FROM artikelen WHERE categorieID = 3 LIMIT 1";
    $queryresult_kerstbomen = $connect->query($sql_kerstbomen);
    $endresult_kerstbomen = $queryresult_kerstbomen->fetch_assoc();
    ?>

    <div class="producten">
        <a href="artikel/index.php"><img src="images/<?php echo $endresult_kerstballen["foto"]; ?>"></a>
        <p><b>Kerstballen</b></p>
    </div>

    <div class="producten">
        <a href="artikel/index.php"><img src="images/<?php echo $endresult_kerstlampen["foto"]; ?>"></a>
        <p><b>Kerstlampen</b></p>
    </div>

    <div class="producten">
        <a href="artikel/index.php"><img src="images/<?php echo $endresult_kerstbomen["foto"]; ?>"></a>
        <p><b>Kerstbomen</b></p>
    </div>

    <div id="overOns">
    <img src="<?php echo $hoofdmap ?>images/overons.jpg" id="overOnsImage">
        <div id="overOnsTekst">
            <h2>Over Ons</h2>
            <p>
                Welkom bij <span class="highlight">Boll & Ball</span>, waar de magie van Kerstmis tot leven komt! Wij zijn jouw toegewijde gids naar een feestelijke wereld vol sprankelende kerstballen, sfeervolle kaarsen en betoverende lampen.
                Onze passie voor de feestdagen en liefde voor prachtige decoraties hebben ons gedreven om een plek te creëren waar de warmte van Kerstmis voelbaar is. Van traditionele charme tot eigentijdse flair, onze collectie is zorgvuldig samengesteld om jouw huis om te toveren tot een winterwonderland.
                Met een hart dat klopt voor de feestelijke sfeer, streven we ernaar om jouw kerstervaring onvergetelijk te maken. Ontdek onze selectie en laat je inspireren om dit seizoen te vieren met een vleugje schittering en een overvloed aan warmte.
                Bij <span class="highlight">Boll & ball</span> gaat het niet alleen om decoraties; het gaat om het creëren van magische momenten die de echte essentie van Kerstmis vangen. Stap binnen en laat ons samen de magie van de feestdagen ontdekken!
            </p>
        </div>
    </div>

</div>

</div>
<script src="<?php echo $hoofdmap ?>design/js/script.js"></script>
<?php

include($hoofdmap."design/footer.php");

?>

</body>
</html>