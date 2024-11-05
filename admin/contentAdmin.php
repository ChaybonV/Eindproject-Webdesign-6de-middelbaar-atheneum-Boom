<div id="container">
    <?php
    $sql = "SELECT * FROM artikelen";
    $queryresult = $connect->query($sql);

    if($queryresult->num_rows>0){
        echo "<table border='1'>
            <tr>
                <td>Artikelnummer</td>
                <td>Naam artikel</td>
                <td>Prijs</td>
                <td>Beschrijving</td>
                <td>Aanpassen</td>
                <td>Verwijderen</td>
            </tr>";
        while($endresult = $queryresult->fetch_assoc()){
    ?>
        <tr>
            <td><?php echo $endresult["artikelID"] ?></td>
            <td><?php echo $endresult["artikelNaam"] ?></td>
            <td><?php echo $endresult["prijs"] ?></td>
            <td><a href="admin_artikel_detail.php?artikelID=<?php echo $endresult["artikelID"] ?>">Details</a></td>
            <td><a href="admin_artikel_edit.php?artikelID=<?php echo $endresult["artikelID"] ?>">Aanpassen</a></td>
            <td><a href="admin_artikel_delete.php?artikelID=<?php echo $endresult["artikelID"] ?>">Verwijderen</a></td>
        </tr>
    <?php
        }
    }
    else{
        echo "0 resultaten";
    }
    $connect->close();
    ?>
    <tr>
        <td colspan="6"><a href="admin_artikel_create.php">Nieuw artikel toevoegen</a></td>
    </tr>
    </table>
    <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecteer een foto om te uploaden:<br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" value="Upload Foto" name="submit">
    </form>
</div>