<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleArtikelDetail.css">
    <title>Artikeldetail pagina</title>
</head>
<body>    
<?php

$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");

?>

<div id="container">
    <?php
    $artikelID = $_GET['artikelID'];
    $sql = "SELECT * FROM artikelen WHERE artikelID=$artikelID";
    $queryresult = $connect->query($sql);
    $endresult = $queryresult->fetch_assoc();
    ?>
    
    <div class="artikel-detail">
        <div class="artikel-image">
            <img src="../images/<?php echo $endresult['foto'] ?>" alt="Artikel afbeelding">
        </div>
        <div class="artikel-info">
            <p><?php echo $endresult['beschrijving']; ?></p>
            <h4>Prijs: &euro; <?php echo $endresult['prijs']; ?></h4>
            <form method="POST" action="">
                <label for="aantal">Aantal:</label>
                <input type="number" min="1" max="9" name="aantal" id="aantal" value="">
                <br>
                <input type="submit" name="winkelwagen" value="Voeg toe aan winkelwagen">
            </form>
            <?php if(isset($_POST['winkelwagen'])){ ?>
                <?php if(!isset($_SESSION['login'])){ ?>
                    <span>Je moet ingelogd zijn om een product toe te voegen aan je winkelwagen</span>
                <?php } else{ ?>
                    <?php
                    $klantID = $_SESSION["klantID"];
                    $aantal = $_POST['aantal'];
                    
                    if(empty($aantal)||$aantal<1||$aantal>9) {
                        echo "<span>Het ingevoerde aantal is ongeldig.</span>";
                    } else {
                        $sql_check_total = "SELECT SUM(hoeveelheid) AS total_hoeveelheid FROM winkelwagen WHERE artikelID=$artikelID AND klantID=$klantID";
                        $result_check_total = $connect->query($sql_check_total);
                        $row_check_total = $result_check_total->fetch_assoc();
                        $total_hoeveelheid = $row_check_total['total_hoeveelheid'] + $aantal;
                        if($total_hoeveelheid > 9) {
                            echo "<span>Je kunt niet meer dan 9 stuks van dit product toevoegen aan je winkelwagen.<br>Kijk in je winkelwagen om te kijken hoeveel stuks je er al hebt inzitten</span>";
                        } else {
                            $sql_check = "SELECT * FROM winkelwagen WHERE artikelID=$artikelID AND klantID=$klantID";
                            $result_check = $connect->query($sql_check);
                            if ($result_check->num_rows > 0) {
                                $sql_update = "UPDATE winkelwagen SET hoeveelheid=hoeveelheid+$aantal WHERE artikelID=$artikelID AND klantID=$klantID";
                                $queryresult_update = $connect->query($sql_update);
                                echo "<span id='sp'>Hoeveelheid van het product is bijgewerkt in uw winkelwagen</span>";
                            } else {
                                $sql_insert = "INSERT INTO winkelwagen (artikelID, hoeveelheid, klantID) VALUES ('$artikelID', '$aantal', '$klantID')";
                                $queryresult_insert = $connect->query($sql_insert);
                                if($queryresult_insert){
                                    echo "<span id='sp'>Het product is correct toegevoegd aan uw winkelwagen</span>";
                                } else {
                                    echo "<span>Er is een fout opgetreden bij het toevoegen aan de winkelwagen</span>";
                                }
                            }
                        }
                    }
                    ?>
                <?php } ?>
            <?php } ?>
            <br>
            <a href="index.php">Terug naar alle producten</a>
        </div>
    </div>
</div>

<?php
include($hoofdmap."design/footer.php");
?>

</body>
</html>