<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="design/css/styleKosten.css">
    <title>Kostenberekening GIP Chaybon Verlooy</title>
</head>
<body>

<?php
$hoofdmap = "";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");
?>

<div id="container">
    <h3>Kostenberekening</h3>
    <?php
    $uurTarief = 21;
    $kosten = 0;

    if(isset($_POST['aantalUur'])) {
        $aantalUur = intval($_POST['aantalUur']);
        $kosten = $uurTarief * $aantalUur;
    }
    ?>
    <form method="post" action="">
        <label for="aantalUur">Aantal uur aan de website gewerkt:</label>
        <input type="number" id="aantalUur" name="aantalUur" value="<?php echo isset($_POST['aantalUur']) ? $_POST['aantalUur'] : ''; ?>">
        <input type="submit" value="Bereken kosten"></input>
    </form>
    <div id="kosten">
        <?php 
            if($kosten>0) {
                echo '<br>Totale kosten: € '.$kosten." voor het maken van de website";
            }
        ?>
    </div>
</div>

<?php
include($hoofdmap."design/footer.php");
?>

</body>
</html>
