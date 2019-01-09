<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save resume in HTML File</title>
    <?php session_start(); ?>
</head>
<body>
    <?php
        if( (isset($_POST['html']) && $_POST['html'] != "") && (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "") && (isset($_SESSION['UserNom']) && $_SESSION['UserNom'] != "") )
        {
            //chemin vers le dossier
            $pathToFolder = "templates/CV/".$_SESSION['UserId']."-".$_SESSION['UserNom'];
            $nameFile = $_SESSION['UserNom'].date("YmdHis").".html";

            //on regarde si le dossier existe déja sinon on le crée.
            if(!is_dir($pathToFolder))
            {
                mkdir($pathToFolder, 0700);
            }

            //création du fichier et ouverture en mode écriture
            $myfile = fopen($pathToFolder."/".$nameFile, "w") or die("Unable to open file!");

            //insertion du code html dans le fichier .html
            $txt = $_POST['html'];
            fwrite($myfile, $txt);

            //fermeture du fichier html
            fclose($myfile);
        }
    ?>
</body>
</html>