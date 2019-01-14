<?php
session_start();

if( (isset($_POST['html']) && $_POST['html'] != "")
    && (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "")
    && (isset($_SESSION['UserNom']) && $_SESSION['UserNom'] != "")
    && (isset($_POST['short_title']) && $_POST['short_title'] != "")
    && (isset($_POST['title']) && $_POST['title'] != "") ) {
    //chemin vers le dossier
    $pathToFolder = "templates/CV/" . $_SESSION['UserId'] . "-" . $_SESSION['UserNom'];
    $nameFile = $_POST['short_title'] . ".html";
    $fullPathToFile = $pathToFolder . '/' . $nameFile;

    //création du fichier et ouverture en mode écriture
    $myfile = fopen($fullPathToFile, "w") or die("Unable to open file!");

    //insertion du code html dans le fichier .html
    $txt = $_POST['html'];
    fwrite($myfile, $txt);

    //fermeture du fichier html
    fclose($myfile);

    shell_exec("\"D:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe\" -B 0 -L 0 -R 0 -T 0 -d 100 --viewport-size 827x1170 ./" . $fullPathToFile . " " . $_POST['short_title'] . ".pdf");
}