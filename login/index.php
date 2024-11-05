<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleLogin.css">
    <title>Loginpagina GIP Chaybon Verlooy</title>
</head>
<body>
    
<?php
$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");
include("contentLogin.php");
include($hoofdmap."design/footer.php");
?>

</body>
</html>