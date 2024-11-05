<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleWinkelwagen.css">
    <title>Winkelwagen GIP Chaybon Verlooy</title>
</head>
<body>

<?php
$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");

if(isset($_SESSION["login"])){
    include("Contentwinkelwagen.php");
}
else{
    echo "<script>alert('Gelieve in te loggen voor u winkelwagen te kunnen bekijken'); window.location='../login/index.php';</script>";
}

include($hoofdmap."design/footer.php");
?>
</body>
</html>