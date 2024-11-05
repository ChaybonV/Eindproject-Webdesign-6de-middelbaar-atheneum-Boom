<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../design/css/styleOverOns.css">
    <title>Over ons - GIP Chaybon Verlooy</title>
</head>

<body> <?php
$hoofdmap = "../";
include($hoofdmap."connection.php");
include($hoofdmap."design/header.php");
include($hoofdmap."design/nav.php");
?> <div id="container">
        <div class="text">
            <h2>Verhaal van Boll & Ball</h2>
            <p>Welkom bij <span class="highlight">Boll & Ball</span>, waar de kerstmagie tot leven komt! Wij zijn uw toegewijde gids naar een feestelijke wereld vol glinsterende kerstballen, sfeervolle kaarsen en betoverende lampen. Onze passie voor feestdagen en onze liefde voor prachtige decoraties hebben ons gedreven om een plek te creëren waar de warmte van Kerstmis tastbaar is. Van traditionele charme tot eigentijdse flair, onze collectie is zorgvuldig samengesteld om uw huis te transformeren tot een waar winterparadijs. Met een hart voor feestelijke sfeer streven we ernaar om uw kerstervaring onvergetelijk te maken. Ontdek onze selectie en laat u inspireren om dit seizoen te vieren met een vleugje glitter en overvloedige warmte. Bij <span class="highlight">Boll & Ball</span> gaat het niet alleen om decoraties; het gaat erom magische momenten te creëren die de ware essentie van Kerstmis vastleggen. Kom binnen en laten we samen de magie van de feestdagen ontdekken!</p>
        </div>
        <div class="text">
            <h2>Eigenaar van de webshop</h2>
            <img src="../images/chaybon.jpg" alt="Chaybon Verlooy" id="me-img">
            <p>Mijn naam is Chaybon Verlooy en ik ben de oprichter van deze feestelijke online winkel. Op dit moment volg ik een opleiding in IT-beheer. Sinds mijn kindertijd ben ik altijd gefascineerd geweest door de magische sfeer van Kerstmis. De warme lichten, de gezelligheid van samenzijn en de vreugde die deze tijd van het jaar met zich meebrengt, hebben me altijd geïnspireerd. Daarom besloot ik mijn liefde voor Kerstmis om te zetten in iets tastbaars: een online winkel vol met de mooiste kerstartikelen. In onze online winkel vindt u alles wat u nodig heeft om uw Kerstmis net zo magisch te maken als de mijne. Mijn doel is om iedereen te helpen dezelfde warme, gezellige en vreugdevolle kerstsfeer thuis te brengen. Naast het aanbieden van hoogwaardige producten, streef ik er ook naar om uitstekende klantenservice te bieden. Of u nu vragen heeft over een product, hulp nodig heeft bij het plaatsen van uw bestelling of gewoon op zoek bent naar inspiratie voor uw kerstversiering, ik sta altijd voor u klaar om te helpen. Ik hoop dat u net zoveel plezier beleeft aan winkelen in mijn online winkel als ik heb gehad bij het maken ervan. Laten we samen deze Kerst onvergetelijk maken! <br><br> Met vriendelijke groet, <br> Chaybon Verlooy </p>
        </div>
        <!-- <div class="text">
            <h2>Ons team</h2>
            <div>
                <img src="../images/jeroen.jpg" alt="Jeroen Vermeulen" class="team-img">
                <h3>Jeroen Vermeulen - Front-end Developer</h3>
                <p>Jeroen is onze getalenteerde front-end ontwikkelaar. Met zijn gevoel voor design en detail zorgt hij ervoor dat onze online winkel niet alleen prachtig is, maar ook gebruiksvriendelijk. Jeroen heeft een passie voor alles wat met Kerstmis te maken heeft en hij integreert deze feestelijke sfeer in elk aspect van onze website. Zijn creativiteit en technische vaardigheden maken het winkelen bij ons een plezierige ervaring.</p>
            </div>
            <div>
                <img src="../images/gideon.jpg" alt="Gideon Mbeki" class="team-img">
                <h3>Gideon Mbeki - Back-end Developer</h3>
                <p>Gideon is het brein achter het technische aspect van onze online winkel. Als back-end ontwikkelaar zorgt hij ervoor dat alle systemen perfect werken en dat u een probleemloze winkelervaring heeft. Met zijn uitgebreide kennis van computers en zijn talent voor probleemoplossing zorgt Gideon ervoor dat onze online winkel altijd up-to-date en veilig is. Zijn bijdrage is essentieel om alles achter de schermen soepel te laten verlopen.</p>
            </div>
            <div>
                <img src="../images/bilal.jpg" alt="Bilal Elmani" class="team-img">
                <h3>Bilal Elmani - Financieel Manager</h3>
                <p>Kevin houdt nauwlettend toezicht op de financiën van onze kerstwinkel. Met zijn scherpe oog en precisie zorgt hij ervoor dat alle financiële aspecten perfect worden beheerd. Van boekhouding tot budgetbeheer, Kevin zorgt ervoor dat we financieel gezond blijven. Zijn passie voor cijfers en zijn liefde voor Kerstmis maken hem de perfecte aanvulling op ons team.</p>
            </div>
        </div> -->
        <!-- <div class="text">
            <h2>Rondleiding webshop</h2><br>
            <video width="750" controls poster="images/video-abstract.png">
                <source src="../images/webshop_rondleiding_filmpje.mp4" type="video/mp4">
            </video>
        </div> -->
</div><?php
include($hoofdmap."design/footer.php");
?>
</body>
</html>