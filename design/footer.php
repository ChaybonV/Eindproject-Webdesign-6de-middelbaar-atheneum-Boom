<link rel="stylesheet" type="text/css" href="<?php echo $hoofdmap ?>design/css/styleFooter.css">
<footer>
    <div class="overall">
        <div class="footer-text">
            <div class="footer-contact">
                <h2 class="h2">Geniet van de kerstsfeer!</h2>
                <div class="footer-buttons">
                    <a class="link1" href="<?php echo $hoofdmap ?>login/index.php">
                        <div class="buttontext">Login</div>
                    </a>
                    <a class="link1" href="<?php echo $hoofdmap ?>artikel/index.php">
                        <div class="buttontext">Artikelen</div>
                    </a>
					<a class="link1" href="<?php echo $hoofdmap ?>kostenberekening.php">
                        <div class="buttontext">Prijs website</div>
                    </a>
                </div>
            </div>
            <img src="<?php echo $hoofdmap ?>images/logo.jpg" width="281" class="footer-logo" />
        </div>
        <div class="footer-content">
            <div class="footer-info">
                <div>
                    <div class="footer-link-2">Laten we chatten!</div>
                    <a href="mailto:chaybon2006@gmail.com" class="footer-link-2">chaybon2006@gmail.com</a>
                    <div class="social-wrap">
                        <a href="#"><img src="https://assets-global.website-files.com/5ec440af4659932990a1020c/60f17a27f09c3f7722f7ef58_icon%20(2).svg" alt="Facebook-logo" /></a>
                        <a href="#"><img src="https://assets-global.website-files.com/5ec440af4659932990a1020c/60f17a27f09c3f768ef7ef57_icon%20(3).svg" alt="Instagram-logo" /></a>
                        <a href="#"><img src="https://assets-global.website-files.com/5ec440af4659932990a1020c/60f17a27f09c3f1f0df7ef59_icon%20(1).svg" alt="LinkedIn-logo"/></a>
                        <a href="#"><img src="https://assets-global.website-files.com/5ec440af4659932990a1020c/60f17a27f09c3fa670f7ef56_icon%20(4).svg" alt="Twitter-logo" /></a>
                    </div>
                </div>
            </div>
           <select id="footer-select">
				<option value="empty">Taal kiezen</option>
				<option value="overOns_nl.php">Nederlands</option>
				<option value="overOns_fr.php">Frans</option>
				<option value="overOns_en.php">Engels</option>
			</select>
        </div>
    </div>
</footer>
<script>
    var hoofdmap = "<?php echo $hoofdmap; ?>";
</script>
<script src="<?php echo $hoofdmap ?>design/js/script3.js"></script>