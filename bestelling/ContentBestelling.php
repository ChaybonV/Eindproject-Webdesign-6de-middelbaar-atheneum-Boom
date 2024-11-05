<div id="container">
    <h1>Bestelling</h1>
    <?php
    date_default_timezone_set("Europe/Brussels");
    $login = $_SESSION["login"];
    $klantID = $_SESSION["klantID"];
    $totaalbedrag = $_SESSION["totaleBestelling"];
    $date = date("Y.m.d");
    if($totaalbedrag==0){
        echo "Je hebt niets besteld";
    }
    else{
        $sql = "INSERT INTO bestellingen(bestellingID,klantID,totaal,bestelDatum) VALUES (NULL,'$klantID','$totaalbedrag','$date')";
        $queryresult = $connect->query($sql);
        $lastID = $connect->insert_id;

        $sql2 = "INSERT INTO bestelling_details(bestellingID,artikelID,aantal) SELECT LAST_INSERT_ID(),artikelID,hoeveelheid FROM winkelwagen WHERE klantID=$klantID";
        $queryresult = $connect->query($sql2);

        $sql3 = "DELETE FROM winkelwagen WHERE klantID=$klantID";
        $queryresult = $connect->query($sql3);

        $sql4 = "SELECT A1.bestellingID,A1.klantID,A1.totaal,A2.klant_voornaam FROM bestellingen AS A1, klanten AS A2 WHERE A1.bestellingID=$lastID AND A1.klantID=$klantID AND A1.klantID=A2.klantID";
        $queryresult = $connect->query($sql4);

        if($queryresult->num_rows>0){
            while($endresult = $queryresult->fetch_assoc()){
                echo "Beste <b>".$endresult["klant_voornaam"]."</b><br> Bestelling: ".$endresult["bestellingID"]."<br> van ".$date."<br> met een totaalprijs van &euro; ".$endresult["totaal"]." werd goed ontvangen.";
                $_SESSION["totaleBestelling"] = 0;
            }
        }
        else{
            echo "Je hebt niets besteld";
        }
    }

    $connect->close();
    ?>
</div>