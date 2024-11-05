<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleWachtwoordChange.css">
    <title>Wachtwoord veranderen</title>
</head>
<body>
    <?php
    $hoofdmap = "../";
    include($hoofdmap."connection.php");
    include($hoofdmap."design/header.php");
    include($hoofdmap."design/nav.php");
    ?>

    <div id="hoofd-container">
        <?php

        $fout = $email = $new_password = $confirm_password = "";
        $melding = "";

        function samenvoegen($test){
            $test = trim(stripslashes(htmlspecialchars($test)));
            return $test;
        }

        function controleerVeld($waarde, $type) {
            if ($type == "T_TEXT") {
                return !empty($waarde);
            }
            if ($type == "T_PASSWORD") {
                return !empty($waarde) && preg_match("/^[a-zA-Z0-9]{4,10}$/", $waarde);
            }
            return false;
        }

        if (isset($_POST["submit"])) {
            $email = samenvoegen($_POST["email"]);
            $new_password = samenvoegen($_POST["new_password"]);
            $confirm_password = samenvoegen($_POST["confirm_password"]);

            if (empty($email) || empty($new_password) || empty($confirm_password)) {
                $melding = "Alle velden zijn verplicht.";
                $fout = "1";
            } elseif ($new_password !== $confirm_password) {
                $melding = "De wachtwoorden komen niet overeen.";
                $fout = "2";
            } else {
                if (!controleerVeld($email, "T_TEXT") || !controleerVeld($new_password, "T_PASSWORD")) {
                    $melding = "Ongeldige invoer. Controleer uw gegevens.";
                    $fout = "3";
                } else {
                    $new_password = md5($new_password);
                    $sql = "UPDATE klanten SET klant_ww='$new_password' WHERE klant_email='$email'";
                    $connect->query($sql);
                    $melding = "Wachtwoord is gewijzigd!";

                    date_default_timezone_set("Europe/Brussels");
                    ini_set("SMTP","smtp.telenet.be");
                    ini_set("sendmail_from","ivo.goyens@telenet.be");
                    $ontvanger = $email;
                    $header = "From: bollball@telenet.be";
                    $onderwerp = "Bevestiging nieuw wachtwoord";
                    $bericht = "Welkom bij Boll&Ball \n\n";
                    $bericht.="U hebt u wachtwoord veranderd naar: ".$confirm_password."\n U kan nu opnieuw inloggen";
                    mail($ontvanger,$onderwerp,$bericht,$header);
                    $connect->close();
                }
            }
        }
        ?>

        <h3>Wachtwoord Veranderen</h3>
        <form method="post">
            <table>
                <tr>
                    <td>E-mailadres:</td>
                    <td><input type="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>Nieuw Wachtwoord:</td>
                    <td><input type="password" placeholder="Enter wachtwoord" name="new_password"></td>
                </tr>
                <tr>
                    <td>Bevestig Nieuw Wachtwoord:</td>
                    <td><input type="password" placeholder="Enter bevestiging wachtwoord" name="confirm_password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Bevestigen"></td>
                </tr>
            </table>
        </form>
        <?php
        if (!empty($melding)) {
            echo "<div style='color: red;'>$melding</div>";
        }
        ?>
    </div>

    <?php
    include($hoofdmap."design/footer.php");
    ?>
</body>
</html>