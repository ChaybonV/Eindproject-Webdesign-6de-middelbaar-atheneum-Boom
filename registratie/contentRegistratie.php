<?php

$fout = $voornaam = $achternaam = $email = $login = $ww = $ww2 = "";

function regCode(){
    return (md5(microtime().mt_rand(10000,99999)));
}

function samenvoegen($test){
    $test = trim(stripslashes(htmlspecialchars($test)));
    return $test;
}

function controleerVeld($waarde,$type) {
    if ($type=="T_TEXT") {
        if (empty($waarde)||is_numeric($waarde)||!preg_match("/^[A-Z][a-zA-Z ]*$/",$waarde)) {
            return false;
        }
        else {
            return true;
        }
    } 
    if ($type=="T_NUM") {
        if (empty($waarde)||!is_numeric($waarde)) {
            return false;
        }
        else {
            return true;
        }
    } 
    if ($type=="T_EMAIL") {
        if (empty($waarde)||!filter_var($waarde,FILTER_VALIDATE_EMAIL)) {
            return false;
        } 
        else {
            return true;
        }
    } 
    if ($type=="T_PASSWORD") {
        if (empty($waarde)||!preg_match("/^[a-zA-Z0-9].{3,10}$/",$waarde)) {
            return false;
        }
        else {
            return true;
        }
    } 
    else {
        return false;
    }
}

if(isset($_POST["registreer"])){
    $voornaam = samenvoegen($_POST["voornaam"]);
    $achternaam = samenvoegen($_POST["achternaam"]);
    $email = samenvoegen($_POST["email"]);
    $login = substr(ucfirst($voornaam),0,2).strtolower(substr($achternaam,0,1)).strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,3)).rand(0,9);
    $ww = samenvoegen($_POST["ww"]);
    $ww2 = samenvoegen($_POST["ww2"]);
    $reg_code = regCode();
    $actiefAccount = 0;

    $sql = "SELECT * FROM klanten WHERE klant_voornaam = '$voornaam' AND klant_naam = '$achternaam'";
    $queryresult = $connect->query($sql);
    if($queryresult->num_rows==1){
        $fout.="Mnr/Mvr. (<b>$voornaam</b>), u login bestaat al. Gelieve u in te loggen via de de login pagina.<br />";
    }
    else{
        if(!controleerVeld($voornaam,"T_TEXT")){
            $fout.="Je moet een voornaam ingeven en deze mag geen cijfers bevatten en moet beginnen met een hoofdletter.<br>";
        }
        if(!controleerVeld($achternaam,"T_TEXT")){
            $fout.="Je moet een achternaam ingeven en deze mag geen cijfers bevatten en moet beginnen met een hoofdletter.<br>";
        }
        if(!controleerVeld($email,"T_EMAIL")){
            $fout.="Je moet een geldig email ingeven.<br>";
        }
        if(!controleerVeld($ww,"T_PASSWORD")){
            $fout.="Je moet een wachtwoord ingeven en deze moet minimaal 3 karakters hebben en maximaal 10 karakters.<br>";
        }
        if(!controleerVeld($ww2,"T_PASSWORD")){
            $fout.="Je hebt een ongeldig 2e wachtwoord ingegeven.<br>";
        }else{
            if(strcmp($ww,$ww2)!=0){
                $fout.="De wachtwoorden die je hebt opgegeven komen niet overeen<br>";
            }
        }
        if(empty($fout)){
            if($_POST["captcha"]!=$_SESSION["cijfers"]){
                $fout .= "De captcha code die je hebt ingevoerd is niet correct.<br>";
                session_destroy();
            }
        }
    }
}
?>

<div id="hoofd-container">
    <h3>Registratie</h3>
    <div class="container">
        <form name="formulier" method="post">
            <fieldset>
                <table>
                    <tr>
                        <td><b>Voornaam:</b></td>
                        <td><input type="text" placeholder="Enter Voornaam" name="voornaam" required></td>
                    </tr>
                    <tr>
                        <td><b>Achternaam:</b></td>
                        <td><input type="text" placeholder="Enter Achternaam" name="achternaam" required></td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td><input type="email" placeholder="Enter Email" name="email" required></td>
                    </tr>
                    <tr>
                        <td width="40%"><b>Wachtwoord:</b></td>
                        <td><input type="password" placeholder="Enter Wachtwoord" name="ww" required></td>
                    </tr>
                    <tr>
                        <td><b>Wachtwoord herhalen:</b></td>
                        <td><input type="password" placeholder="Enter Wachtwoord" name="ww2" required></td>
                    </tr>
                    <tr>
                        <td><b>Type de code correct over</b></td>
                        <td>
                            <img src="<?php echo $hoofdmap ?>captcha.php" alt="captcha" class="captcha-img" width="108%" height="50px">
                            <input type="text" placeholder="Enter Captcha" name="captcha">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="remember"> Onthoud gegevens</td>
                        <td><input type="submit" name="registreer" value="Registreer"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="reset" class="cancelbtn" value="Reset"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php
        if(isset($_POST["registreer"])) {
            if($fout){
                echo "<p align=\"center\">".$fout."<br><br>Ga terug naar de <a href=\"javascript:history.back(1)\">registratiepagina</a> en probeer opnieuw een account aan te maken.</p>";
            }
            else {
                $ww = md5($ww);
                echo "Je gaf volgende gegevens in:<br>Voornaam: ".$voornaam."<br>Achternaam: ".$achternaam."<br>Email: ".$email."<br>Je ontvangt een mail met een login en een registratiecode, deze moet je beide gebruiken om definitief te kunnen inloggen<br>Volg de instructies in je email verder.";
                $sql2 = "INSERT INTO klanten (klant_voornaam,klant_naam,klant_email,klant_login,klant_ww,klant_reg,klant_aangemeld) VALUES ('$voornaam','$achternaam','$email','$login','$ww','$reg_code',0)";
                $queryresult2 = $connect->query($sql2);

                date_default_timezone_set("Europe/Brussels");
                ini_set("SMTP","smtp.telenet.be");
                ini_set("sendmail_from","ivo.goyens@telenet.be");
                $ontvanger = $email;
                $header = "From: bollball@telenet.be";
                $website = "http://".$_SERVER["HTTP_HOST"]."/eindwerk/registratie/bevestigingAccount.php";
                $onderwerp = "Activeer je account";
                $bericht = "Welkom bij Boll&Ball \n\n";
                $bericht.="Wij danken u alvast voor u registratie met het volgende emailadres: $email \n Je gebruikerslogin is: $login \n Je verificatiecode is: $reg_code \n Gelieve deze code te kopieren en te plakken in het veld op: ".$website."\n";
                mail($ontvanger,$onderwerp,$bericht,$header);
                $connect->close();
            }
        }
        ?>
    </div>
</div>