<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleAdmin.css">
    <title>Adminpagina GIP Chaybon Verlooy</title>
</head>
<body>

<?php
$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");
?>

<div id="container">
    <div id="bt">
        <button type="submit" class="knopfunctie" id="button-kerstballen"><a href="index.php?view=artikelen">Artikelen</a></button> |
        <button type="submit" class="knopfunctie" id="button-kerstballen"><a href="index.php?view=klanten">Klanten</a></button>
    </div>

    <?php
    if (isset($_GET['view'])) {
        $view = $_GET['view'];
    } else {
        $view = 'artikelen';
    }

    if ($view == 'artikelen') {
        include("contentAdmin.php");
    } elseif ($view == 'klanten') {
        include("contentAdmin2.php");
    }
    ?>
</div>

<?php
include($hoofdmap."design/footer.php");
?>

</body>
</html>
