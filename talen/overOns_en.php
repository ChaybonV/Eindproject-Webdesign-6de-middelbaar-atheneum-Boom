<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../design/css/styleOverOns.css">
    <title>About Us - GIP Chaybon Verlooy</title>
</head>

<body> <?php
$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");
?> <div id="container">
        <div class="text">
            <h2>Story of Boll & Ball</h2>
            <p>Welcome to <span class="highlight">Boll & Ball</span>, where the magic of Christmas comes to life! We are your devoted guide to a festive world filled with shimmering Christmas baubles, atmospheric candles, and enchanting lamps. Our passion for holidays and our love for beautiful decorations have driven us to create a place where the warmth of Christmas is palpable. From traditional charm to contemporary flair, our collection is carefully curated to transform your home into a true winter wonderland. With a heart for festive ambiance, we strive to make your Christmas experience unforgettable. Explore our selection and let yourself be inspired to celebrate this season with a touch of sparkle and an abundance of warmth. At <span class="highlight">Boll & Ball</span>, it's not just about decorations; it's about creating magical moments that capture the true essence of Christmas. Come in and let's discover the magic of the holidays together!</p>
        </div>
        <div class="text">
            <h2>Owner of the webshop</h2>
            <img src="../images/chaybon.jpg" alt="Chaybon Verlooy" id="me-img">
            <p>My name is Chaybon Verlooy, and I am the founder of this festive online store. Currently, I am undergoing training in IT management. Since my childhood, I have always been fascinated by the magical atmosphere of Christmas. The warm lights, the coziness of being together, and the joy that this time of year brings have always inspired me. That's why I decided to turn my love for Christmas into something tangible: an online store filled with the most beautiful Christmas items. In our online store, you will find everything you need to make your Christmas as magical as mine. My goal is to help everyone bring the same warm, cozy, and joyful Christmas atmosphere home. In addition to offering high-quality products, I also strive to provide excellent customer service. Whether you have questions about a product, need help placing your order, or just looking for inspiration for your Christmas decorations, I am always here to help. I hope you enjoy shopping in my online store as much as I enjoyed creating it. Let's make this Christmas an unforgettable moment together! <br><br> Best regards, <br> Chaybon Verlooy </p>
        </div>
        <!-- <div class="text">
            <h2>Our Team</h2>
            <div>
                <img src="../images/jeroen.jpg" alt="Jeroen Vermeulen" class="team-img">
                <h3>Jeroen Vermeulen - Front-End Developer</h3>
                <p>Jeroen is our talented front-end developer. With his sense of design and detail, he ensures that our online store is not only beautiful but also user-friendly. Jeroen has a passion for everything Christmas-related, and he infuses this festive atmosphere into every aspect of our website. His creativity and technical skills make shopping with us a pleasant experience.</p>
            </div>
            <div>
                <img src="../images/gideon.jpg" alt="Gideon Mbeki" class="team-img">
                <h3>Gideon Mbeki - Back-End Developer</h3>
                <p>Gideon is the brain behind the technical aspect of our online store. As a back-end developer, he ensures that all systems work flawlessly and that you have a seamless shopping experience. With his extensive knowledge of computers and his talent for problem-solving, Gideon ensures that our online store is always up-to-date and secure. His contribution is essential to keeping everything running smoothly behind the scenes.</p>
            </div>
            <div>
                <img src="../images/bilal.jpg" alt="Bilal Elmani" class="team-img">
                <h3>Bilal Elmani - Financial Manager</h3>
                <p>Kevin closely monitors the finances of our Christmas store. With his keen eye and precision, he ensures that all financial aspects are perfectly managed. From accounting to budget management, Kevin ensures that we remain financially healthy. His passion for numbers and his love for Christmas make him the perfect addition to our team.</p>
            </div>
        </div> -->
        <!-- <div class="text">
            <h2>Guided Tour of the webshop</h2><br>
            <video width="750" controls poster="images/video-abstract.png">
                <source src="../images/webshop_rondleiding_filmpje.mp4" type="video/mp4">
            </video>
        </div> -->
    </div> <?php
include($hoofdmap."design/footer.php");
?>
</body>
</html>