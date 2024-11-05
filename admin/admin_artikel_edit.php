<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleAdminCreate.css">
    <title>Artikel bewerken pagina</title>
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

    $categoryArray = ["kerstballen" => 1,"kerstlampen" => 2,"kerstbomen" => 3];

    $message = "";

    if(isset($_POST["submit"])){
        $artikelID = $_GET["artikelID"];
        $categorieNaam = strtolower(samenvoegen($_POST["categorieID"]));
        $artikelnaam = samenvoegen($_POST["artikelNaam"]);
        $prijs = samenvoegen($_POST["prijs"]);
        $foto = samenvoegen($_POST["foto"]);
        $beschrijving = addslashes(samenvoegen($_POST["beschrijving"]));
        $fout = "";

        if(array_key_exists($categorieNaam, $categoryArray)){
            $categorie = $categoryArray[$categorieNaam];
        } else {
            $fout .= "De opgegeven categorie bestaat niet. ";
        }

        if(!is_numeric($prijs)){
            $fout .= "Je prijs mogen alleen cijfers bevatten.";
        }

        if($fout!=""){
            $message = "Het formulier bevat volgende fouten:<br>".$fout."<br><a href=\"javascript:history.back(1)\">Ga terug naar het formulier en verbeter je input</a>";
        }
        else{
            $sql = "UPDATE artikelen SET categorieID='$categorie',artikelNaam='$artikelnaam',prijs='$prijs',foto='$foto',beschrijving='$beschrijving' WHERE artikelID='$artikelID'";
            $queryresult = $connect->query($sql);
            if($queryresult===TRUE){
                $message = "Product is gewijzigd<br><a href='index.php'>Ga terug naar de adminpagina</a>";
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
                    <td></td>
                    <td><img src=""></td>
                </tr>
                <tr>
                    <td><b>Categorie:</b></td>
                    <td><input type="text" placeholder="Kerstballen, Kerstlampen of Kerstbomen" name="categorieID"></td>
                </tr>
                <tr>
                    <td><b>Artikelnaam:</b></td>
                    <td><input type="text" placeholder="Enter artikelnaam" name="artikelNaam"></td>
                </tr>
                <tr>
                    <td><b>Prijs:</b></td>
                    <td><input type="text" placeholder="Enter prijs" name="prijs"></td>
                </tr>
                <tr>
                    <td><b>Foto:</b></td>
                    <td><input type="text" placeholder="Enter foto" name="foto"></td>
                </tr>
                <tr>
                    <td><b>Beschrijving:</b></td>
                    <td><textarea placeholder="Enter beschrijving" name="beschrijving"></textarea></td>
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