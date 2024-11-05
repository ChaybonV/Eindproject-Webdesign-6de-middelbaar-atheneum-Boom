<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleRegistratie.css">
    <title>Bevestigingspagina</title>
</head>

<body> <?php
$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");
?> <div id="hoofd-container">
        <h3>Bevestiging</h3>
        <p>Om je account te activeren, moet je u login en registratiecode die je hebt gekregen in je mail invoegen in de velden hieronder.</p>
        <div class="container">
            <form name="formulier" method="post">
                <fieldset>
                    <table>
                        <tr>
                            <td><b>Login:</b></td>
                            <td><input type="text" placeholder="Enter Login" name="login"></td>
                        </tr>
                        <tr>
                            <td><b>Wachtwoord:</b></td>
                            <td><input type="password" placeholder="Enter Wachtwoord" name="ww"></td>
                        </tr>
                        <tr>
                            <td><b>Registratiecode:</b></td>
                            <td><input type="text" placeholder="Enter Registratiecode" name="code"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="bevestig" value="Bevestiging"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="reset" class="cancelbtn" value="Reset"></td>
                        </tr>
                    </table>
                </fieldset>
            </form> <?php

$fout = $login = $ww = "";

    if(isset($_POST["bevestig"])){
        if(empty($_POST["login"])||empty($_POST["code"])||empty($_POST["ww"])){
            $fout = "Login, wachtwoord en registratiecode moeten ingevuld zijn";
            echo $fout;
        }
        else{
            $login = $_POST["login"];
            $ww = md5($_POST["ww"]);
            $sql = "SELECT * FROM klanten WHERE klant_login='$login' AND klant_ww='$ww'";
            $queryresult = $connect->query($sql);

            if($queryresult->num_rows!=1){
                $fout = "Je hebt nog niet geregistreerd. Doe dit eerst en dan krijg je de juiste gegevens mee via de mail.";
                echo $fout;
            }
            else{
                while($endresult=$queryresult->fetch_assoc()){
                    if($_POST["code"]!=$endresult["klant_reg"]){
                        $fout = "Je registratiecode is niet correct, kopier de code van in de mail.";
                        echo $fout;
                    }
                    else{
                        $sql2 = "UPDATE klanten SET klant_aangemeld=1 WHERE klant_login='$login'";
                        $queryresult2 = $connect->query($sql2);
                        $connect->close();
                        echo "Welkom, ".$endresult["klant_voornaam"]." ".substr($endresult["klant_naam"],0,1).".<br>Je bent nu definitief geregistreerd en ingelogd";
                    }
                }
            }
        }
    }

?>
        </div>
    </div>
<?php
include($hoofdmap."design/footer.php");
?> 
</body>
</html>