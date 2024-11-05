<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleAdminCreate.css">
    <title>Klant bewerken pagina</title>
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

    function samenvoegen($test){
        $test = trim(stripslashes(htmlspecialchars($test)));
        return $test;
    }

    $message = "";

    if(isset($_GET["klantID"])){
        $klantID = $_GET["klantID"];
        $sql = "SELECT * FROM klanten WHERE klantID='$klantID'";
        $queryresult = $connect->query($sql);
        if($queryresult->num_rows > 0) {
            $endresult = $queryresult->fetch_assoc();
        } else {
            echo "Geen resultaten gevonden voor deze klant.";
            exit;
        }
    }

    if(isset($_POST["submit"])){
        $klantID = $_GET["klantID"];
        $voornaam = samenvoegen($_POST["voornaam"]);
        $naam = samenvoegen($_POST["naam"]);
        $email = samenvoegen($_POST["email"]);
        $login = samenvoegen($_POST["login"]);
        $wachtwoord = md5(samenvoegen($_POST["wachtwoord"]));
        $fout = "";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $fout .= "Ongeldig e-mailadres. ";
        }

        if($fout != ""){
            $message = "Het formulier bevat de volgende fouten:<br>".$fout."<br><a href=\"javascript:history.back(1)\">Ga terug naar het formulier en verbeter je input</a>";
        }
        else{
            $sql = "UPDATE klanten SET klant_voornaam='$voornaam', klant_naam='$naam', klant_email='$email', klant_login='$login', klant_ww='$wachtwoord' WHERE klantID='$klantID'";
            $queryresult = $connect->query($sql);
            if($queryresult === TRUE){
                $message = "Klantgegevens zijn gewijzigd<br><a href='index.php'>Ga terug naar de adminpagina</a>";
            }
            else {
                $message = "Error: ".mysqli_error($connect); 
            }
        }
    }

    ?>

    <form name="formulier" method="post">
        <fieldset>
            <table>
                <tr>
                    <td><b>Voornaam:</b></td>
                    <td><input type="text" placeholder="Enter voornaam" name="voornaam"></td>
                </tr>
                <tr>
                    <td><b>Naam:</b></td>
                    <td><input type="text" placeholder="Enter naam" name="naam"></td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td><input type="text" placeholder="Enter email" name="email"></td>
                </tr>
                <tr>
                    <td><b>Login:</b></td>
                    <td><input type="text" placeholder="Enter login" name="login"></td>
                </tr>
                <tr>
                    <td><b>Wachtwoord:</b></td>
                    <td><input type="text" placeholder="Enter wachtwoord" name="wachtwoord"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Aanpassen"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="reset" class="cancelbtn" value="Reset"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <?php
    if($message!="") {
        echo "<div class='message'>$message</div>";
    }
    ?>
    <br>
</div>

<?php
include($hoofdmap."design/footer.php");
?>

</body>
</html>