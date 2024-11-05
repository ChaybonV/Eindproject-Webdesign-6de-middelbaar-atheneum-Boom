<div id="container">
    <?php
    $sql = "SELECT * FROM klanten";
    $queryresult = $connect->query($sql);

    if($queryresult->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <td>Klantnummer</td>
                <td>Voornaam</td>
                <td>Naam</td>
                <td>Email</td>
                <td>Login</td>
                <td>Wachtwoord</td>
                <td>Aanpassen</td>
                <td>Verwijderen</td>
            </tr>";
        while($endresult = $queryresult->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $endresult["klantID"] ?></td>
            <td><?php echo $endresult["klant_voornaam"] ?></td>
            <td><?php echo $endresult["klant_naam"] ?></td>
            <td><?php echo $endresult["klant_email"] ?></td>
            <td><?php echo $endresult["klant_login"] ?></td>
            <td><?php echo $endresult["klant_ww"] ?></td>
            <td><a href="admin2_klant_edit.php?klantID=<?php echo $endresult["klantID"] ?>">Aanpassen</a></td>
            <td><a href="admin2_klant_delete.php?klantID=<?php echo $endresult["klantID"] ?>">Verwijderen</a></td>
        </tr>
    <?php
        }
        echo "<tr>
                <td colspan='8'><a href='admin2_klant_create.php'>Nieuwe klant toevoegen</a></td>
              </tr>";
        echo "</table>";
    } else {
        echo "0 resultaten";
    }
    $connect->close();
    ?>
</div>
