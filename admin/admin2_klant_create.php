<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleAdminCreate.css">
    <title>Klant toevoegen pagina</title>
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

    if(isset($_POST["submit"])){
        $voornaam = samenvoegen($_POST["voornaam"]);
        $naam = samenvoegen($_POST["naam"]);
        $email = samenvoegen($_POST["email"]);
        $login = samenvoegen($_POST["login"]);
        $wachtwoord = md5(samenvoegen($_POST["wachtwoord"]));
        $fout = "";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $fout .= "Ongeldig e-mailadres. ";
        }

        if ($fout != ""){
            $message = "Het formulier bevat de volgende fouten:<br>".$fout."<br><a href=\"javascript:history.back(1)\">Ga terug naar het formulier en verbeter je input</a>";
        } else {
            $sql = "INSERT INTO klanten (klant_voornaam, klant_naam, klant_email, klant_login, klant_ww, klant_reg, klant_aangemeld) VALUES ('$voornaam', '$naam', '$email', '$login', '$wachtwoord', 'NULL', '1')";
            $queryresult = $connect->query($sql);
            if($queryresult){
                $message = "Nieuwe klant toegevoegd<br><a href='index.php'>Ga terug naar de adminpagina</a>";
            } else {
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
                    <td><input type="submit" name="submit" value="Toevoegen"></td>
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