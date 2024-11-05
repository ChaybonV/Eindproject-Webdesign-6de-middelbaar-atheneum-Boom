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

$artikelID = $_GET['artikelID'];
$sql = "SELECT * FROM artikelen WHERE artikelID='$artikelID'";
$queryresult = $connect->query($sql);
if ($queryresult->num_rows>0) {
    $endresult = $queryresult->fetch_assoc();
} else {
    echo "Geen resultaten gevonden voor dit artikel.";
}
$message = "";

?>

<div id="container">
    <?php
    if(isset($_POST["submit"])){
        $artikelID = $_GET['artikelID'];
        $sql = "DELETE FROM artikelen WHERE artikelID='$artikelID'";
        $queryresult = $connect->query($sql);
        if($queryresult===TRUE){
            $message = "Product is verwijderd<br><a href='index.php'>Ga terug naar de adminpagina</a>";
        }
        else {
            $message = "Error: ".mysqli_error($connect); 
        }
    }
    ?>    

<form name="formulier" method="post">
        <fieldset>
            <table>
                <tr>
                    <td><img src="../images/<?php echo $endresult['foto'] ?>"></td>
                </tr>
                <tr>
                    <td><b><?php echo $endresult['artikelNaam']; ?></b></td>
                </tr>
                <tr>
                    <td>Prijs: &euro; <?php echo $endresult['prijs']; ?></td>
                </tr>
                <tr>
                    <td>Beschrijving: <?php echo $endresult['beschrijving']; ?></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Verwijderen" style="width:60%;"></td>
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