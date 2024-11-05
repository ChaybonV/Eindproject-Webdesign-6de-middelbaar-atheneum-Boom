<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/css/styleAdminCreate.css">
    <title>Klant verwijderen pagina</title>
</head>
<body>    
<?php

$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");

$klantID = $_GET['klantID'];
$sql = "SELECT * FROM klanten WHERE klantID='$klantID'";
$queryresult = $connect->query($sql);
if ($queryresult->num_rows > 0) {
    $endresult = $queryresult->fetch_assoc();
} else {
    echo "Geen resultaten gevonden voor deze klant.";
    exit;
}
$message = "";

?>

<div id="container">
    <?php
    if(isset($_POST['submit'])) {
        $sql = "DELETE FROM klanten WHERE klantID='$klantID'";
        $queryresult = $connect->query($sql);
        if($queryresult === TRUE) {
            $message = "Klant verwijderd<br><a href='index.php'>Ga terug naar de adminpagina</a>";
        } else {
            $message = "Error: " . mysqli_error($connect);
        }
    }
    ?>
    <form name="formulier" method="post">
        <fieldset>
            <legend>Weet je zeker dat je deze klant wilt verwijderen?</legend>
            <table>
                <tr>
                    <td><b>Klantnummer:</b></td>
                    <td><?php echo $endresult['klantID']; ?></td>
                </tr>
                <tr>
                    <td><b>Voornaam:</b></td>
                    <td><?php echo $endresult['klant_voornaam']; ?></td>
                </tr>
                <tr>
                    <td><b>Naam:</b></td>
                    <td><?php echo $endresult['klant_naam']; ?></td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td><?php echo $endresult['klant_email']; ?></td>
                </tr>
                <tr>
                    <td><b>Login:</b></td>
                    <td><?php echo $endresult['klant_login']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Verwijderen">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

    <?php
    if($message != "") {
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