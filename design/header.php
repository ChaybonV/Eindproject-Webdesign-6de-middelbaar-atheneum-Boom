<link rel="stylesheet" type="text/css" href="<?php echo $hoofdmap; ?>design/css/styleHeader.css">
<header>
    <div class="logo-container">
        <a href="<?php echo $hoofdmap; ?>index.php"><img src="<?php echo $hoofdmap; ?>images/logo.jpg" id="logo"></a>
        <?php if (!isset($_SESSION["login"])) { ?>
            <a href="<?php echo $hoofdmap; ?>login/index.php"><img src="<?php echo $hoofdmap; ?>images/account.jpg" class="account"></a>
        <?php } else { ?>
            <a href="<?php echo $hoofdmap; ?>login/logout.php" class="account">Welkom
        <?php
        $klantID = $_SESSION["klantID"];
        $sql = "SELECT klant_voornaam, klant_naam FROM klanten where klantID='$klantID'";
        $queryresult = $connect->query($sql);
        if ($queryresult->num_rows > 0) {
            while ($endresult = $queryresult->fetch_assoc()) {
                echo $endresult["klant_voornaam"] . " " . $endresult["klant_naam"];
            }
        }
        ?> | logout</a>
        <?php } ?> 
    </div>
</header>