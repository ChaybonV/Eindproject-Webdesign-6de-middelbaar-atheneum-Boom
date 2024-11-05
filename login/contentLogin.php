<div id="hoofd-container">
    <?php
    
    $fout = $login = $ww = "";
    $melding = "";

    function samenvoegen($test){
        $test = trim(stripslashes(htmlspecialchars($test)));
        return $test;
    }

    function controleerVeld($waarde,$type) {
        if ($type=="T_TEXT") {
            if (empty($waarde)) {
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

    if(isset($_POST["submit"])){
        if(empty($_POST["login"])||empty($_POST["ww"])){
            $melding = "Je login en/of wachtwoord moet ingevuld worden om te kunnen inloggen";
            $fout = "1";
        } 
        else {
            $login = samenvoegen($_POST["login"]);
            $ww = samenvoegen($_POST["ww"]);

            if(!controleerVeld($login,"T_TEXT")||!controleerVeld($ww,"T_PASSWORD")){
                $melding = "Ongeldige invoer. Controleer uw gegevens.";
                $fout = "2";
            }
            else {
                $ww = md5($ww);
                $sql = "SELECT * FROM klanten WHERE klant_login='$login' AND klant_ww='$ww'";
                $queryresult = $connect->query($sql);

                if($queryresult->num_rows!=1){
                    $melding = "Je bent nog niet geregistreerd, ga naar de <a href=\"../registratie/index.php\">registratiepagina</a> om je eerst te registreren.";
                    $fout = "3";
                }
                else {
                    while($endresult=$queryresult->fetch_assoc()){
                        if($endresult["klant_aangemeld"]==0){
                            $melding = "Je hebt je registratie nog niet bevestigd via de mail, Bekijk de mail en volg de verdere instructies voor u kan inloggen";
                            $fout = "4";
                        }
                        else {
                            $_SESSION["login"] = $login;
                            $_SESSION["klantID"] = $endresult["klantID"];
                            $connect->close();
                            if(isset($_SESSION["login"])){
                                header("Location: ../index.php");
                            }
                        }
                    }
                }
                if(!empty($fout)){
                    $melding .= "<br>Indien je nog niet geregistreerd bent, ga dan naar de registratiepagina! <br> Als je wel al geregistreerd bent, dan heb je u account nog niet bevestigd. Je hebt hiervoor een mail gekregen, gelieve deze te bekijken en verdere instructies op te volgen";
                }
            }
        }
    }
    ?>

    <h3>Login</h3>
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
                        <td><a href="wachtwoord_change.php">Wachtwoord vergeten?</a></td>
                        <td><input type="submit" name="submit" value="Login"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="reset" class="cancelbtn" value="Reset"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php
        if (!empty($melding)) {
            echo "<div style='color: red;'>$melding</div>";
        }
        ?>
    </div>
</div>