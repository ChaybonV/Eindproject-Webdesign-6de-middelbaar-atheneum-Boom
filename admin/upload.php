<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $target_dir = "C:/USBWebserver v8.6/root/eindwerk/images/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOK = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false){
            echo "Het bestand is een afbeelding -".$check["mime"]."<br>";
            echo "De naam en locatie van het tijdelijke bestand is ".$_FILES["fileToUpload"]["tmp_name"]."<br>";
            $uploadOK = 1;
        }
        else{
            echo "Het bestand is geen afbeelding!<br>";
            $uploadOK = 0;
        }
    }

    if(file_exists($target_file)){
        echo "Het bestand bestaat al!<br>";
        $uploadOK = 0;
    }

    if($_FILES["fileToUpload"]["size"]>500000){
        echo "Het bestand is: ".$_FILES["fileToUpload"]["size"]." bites groot, 500000 is de limiet.<br>U bestand is te groot!<br>";
        $uploadOK = 0;
    }

    if($imageFileType!="jpg"&&$imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif"){
        echo "Opgelet, enkel JPG, PNG, JPEG & GIF bestanden zijn toegelaten<br>";
        $uploadOK = 0;
    }

    if($uploadOK==0){
        echo "Sorry, u bestand werd niet opgeladen!<br>";
    }
    else{
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
            echo "Het bestand ".basename($_FILES["fileToUpload"]["name"])." werd opgeladen in volgende map: ".$target_dir."<br>";
            echo '<img src="'.$target_file.'" id="uploadedImage">';
        }
        else{
            echo "Er was een probleem bij het opladen van het bestand!<br>";
        }
    }
    ?>
</body>
</html>