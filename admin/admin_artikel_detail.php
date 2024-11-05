<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleAdminCreate.css">
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
    <img src="../images/<?php echo $endresult['foto'] ?>"><br>
    <b><?php echo $endresult['artikelNaam']; ?></b><br><br>
    <b>Prijs:</b> &euro; <?php echo $endresult['prijs']; ?><br><br>
    <b>Beschrijving:</b> <p style="width: 50%; margin: 0 auto;"><?php echo $endresult['beschrijving']; ?></p>
    <br><br>
    <a href="index.php">Terug naar adminoverzicht</a>
    <br>
</div>

<?php
include($hoofdmap."design/footer.php");
?>

</body>
</html>