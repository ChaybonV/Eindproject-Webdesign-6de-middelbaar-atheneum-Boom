<link rel="stylesheet" type="text/css" href="<?php echo $hoofdmap ?>design/css/styleNav.css">
<nav>
    <ul type="none" id="lijst">
        <li><a href="<?php echo $hoofdmap ?>index.php">Home</a></li>
        <li><a href="<?php echo $hoofdmap ?>artikel/index.php">Producten</a></li>
        <?php 
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION["login"]) || !$_SESSION["login"]) { ?>
            <li><a href="<?php echo $hoofdmap ?>registratie/index.php">Registreren</a></li>
        <?php } ?>
        <li><a href="<?php echo $hoofdmap ?>talen/overOns_nl.php">Over ons</a></li>
        <li><a href="<?php echo $hoofdmap ?>admin/index.php">Admin</a></li>
        <li><a href="<?php echo $hoofdmap ?>winkelwagen/index.php"><img src="<?php echo $hoofdmap ?>images/winkelkar.jpg"></a></li>  
    </ul>
</nav>