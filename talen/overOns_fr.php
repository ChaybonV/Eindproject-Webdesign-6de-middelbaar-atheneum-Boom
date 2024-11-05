<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../design/css/styleOverOns.css">
    <title>A propos de nous GIP Chaybon Verlooy</title>
</head>

<body> <?php
$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");
?> <div id="container">
        <div class="text">
            <h2>Histoire Boll & Ball</h2>
            <p>Bienvenue chez <span class="highlight">Boll & Ball</span>, où la magie de Noël prend vie ! Nous sommes votre guide dévoué vers un monde festif rempli de boules de Noël scintillantes, de bougies atmosphériques et de lampes envoûtantes. Notre passion pour les fêtes et notre amour pour de magnifiques décorations nous ont poussés à créer un endroit où la chaleur de Noël est palpable. Du charme traditionnel à la touche contemporaine, notre collection est soigneusement sélectionnée pour transformer votre maison en un véritable paradis hivernal. Avec un cœur battant pour l'ambiance festive, nous nous efforçons de rendre votre expérience de Noël inoubliable. Découvrez notre sélection et laissez-vous inspirer pour célébrer cette saison avec une touche d'éclat et une abondance de chaleur. Chez <span class="highlight">Boll & Ball</span>, il ne s'agit pas seulement de décorations ; il s'agit de créer des moments magiques qui capturent la véritable essence de Noël. Entrez et découvrons ensemble la magie des fêtes !</p>
        </div>
        <div class="text">
            <h2>Propriétaire de boutique en ligne</h2>
            <img src="../images/chaybon.jpg" alt="Chaybon Verlooy" id="me-img">
            <p>Je m'appelle Chaybon Verlooy et je suis le fondateur de cette boutique en ligne festive. En ce moment, je suis en train de suivre une formation en gestion informatique. Depuis mon enfance, j'ai toujours été fasciné par l'atmosphère magique de Noël. Les lumières chaleureuses, la convivialité d'être ensemble et la joie que cette période de l'année apporte m'ont toujours inspiré. C'est pourquoi j'ai décidé de transformer mon amour pour Noël en quelque chose de tangible : une boutique en ligne remplie des plus beaux articles de Noël. Dans notre boutique en ligne, vous trouverez tout ce dont vous avez besoin pour rendre votre Noël aussi magique que le mien. Mon objectif est d'aider tout le monde à apporter cette même atmosphère chaleureuse, conviviale et joyeuse de Noël chez eux. En plus d'offrir des produits de haute qualité, je m'efforce également de fournir un excellent service client. Que vous ayez des questions sur un produit, besoin d'aide pour passer votre commande ou simplement à la recherche d'inspiration pour vos décorations de Noël, je suis toujours là pour vous aider. J'espère que vous prendrez autant de plaisir à faire vos achats dans ma boutique en ligne que j'en ai eu à la créer. Faisons de ce Noël un moment inoubliable ensemble ! <br><br> Cordialement, <br> Chaybon Verlooy </p>
        </div>
        <div class="text">
            <h2>Notre équipe</h2>
            <div>
                <img src="../images/jeroen.jpg" alt="Jeroen Vermeulen" class="team-img">
                <h3>Jeroen Vermeulen - Développeur Front-End</h3>
                <p>Jeroen est notre talentueux développeur front-end. Avec son sens du design et du détail, il veille à ce que notre boutique en ligne soit non seulement magnifique, mais aussi conviviale. Jeroen a une passion pour tout ce qui concerne Noël et il intègre cette atmosphère festive dans chaque aspect de notre site web. Sa créativité et ses compétences techniques rendent le shopping chez nous une expérience agréable. </p>
            </div>
            <div>
                <img src="../images/gideon.jpg" alt="Gideon Mbeki" class="team-img">
                <h3>Gideon Mbeki - Développeur Back-End</h3>
                <p>Gideon est le cerveau derrière l'aspect technique de notre boutique en ligne. En tant que développeur back-end, il veille à ce que tous les systèmes fonctionnent parfaitement et que vous ayez une expérience d'achat sans problème. Avec sa vaste connaissance en informatique et son talent pour la résolution de problèmes, Gideon assure que notre boutique en ligne est toujours à jour et sécurisée. Sa contribution est essentielle pour faire fonctionner correctement tout ce qui se passe en coulisses.</p>
            </div>
            <div>
                <img src="../images/bilal.jpg" alt="Bilal Elmani" class="team-img">
                <h3>Bilal Elmani - Gestionnaire Financier</h3>
                <p>Kevin surveille de près les finances de notre boutique de Noël. Avec son regard aiguisé et sa précision, il veille à ce que tous les aspects financiers soient parfaitement gérés. De la tenue de la comptabilité à la gestion des budgets, Kevin veille à ce que nous restions financièrement sains. Sa passion pour les chiffres et son amour pour Noël font de lui le complément parfait à notre équipe.</p>
            </div>
        </div>
        <div class="text">
            <h2>Visite guidée de la boutique en ligne français</h2><br>
            <video width="750" controls poster="images/video-abstract.png">
                <source src="../images/webshop_rondleiding_filmpje.mp4" type="video/mp4">
            </video>
        </div>
    </div> <?php
include($hoofdmap."design/footer.php");
?>
</body>
</html>