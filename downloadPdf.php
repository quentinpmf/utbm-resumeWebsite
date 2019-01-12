<?php
session_start();

function forceDownload($nom, $situation)
{
    header('Content-Transfer-Encoding: binary');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($situation)) . ' GMT');
    header('Content-Type: application/pdf');
    header('Accept-Ranges: bytes');
    header('Content-Encoding: none');
    header('Content-Length: ' . filesize($situation));
    header('Content-disposition: attachment; filename='. $nom);
    header('Pragma: no-cache');
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    readfile($situation);
    exit();
}

if( (isset($_POST['html']) && $_POST['html'] != "")
    && (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "")
    && (isset($_SESSION['UserNom']) && $_SESSION['UserNom'] != "")
    && (isset($_POST['short_title']) && $_POST['short_title'] != "")
    && (isset($_POST['title']) && $_POST['title'] != "") ) {
    //chemin vers le dossier
    $pathToFolder = "templates/CV/" . $_SESSION['UserId'] . "-" . $_SESSION['UserNom'];
    $nameFile = $_POST['short_title'] . ".html";
    $fullPathToFile = $pathToFolder . '/' . $nameFile;
    //on regarde si le dossier existe déja sinon on le crée.
    if (!is_dir($pathToFolder)) {
        mkdir($pathToFolder, 0700);
    }

    //création du fichier et ouverture en mode écriture
    $myfile = fopen($fullPathToFile, "w") or die("Unable to open file!");

    //insertion du code html dans le fichier .html
    $txt = $_POST['html'];
    fwrite($myfile, $txt);

    //fermeture du fichier html
    fclose($myfile);

    shell_exec("\"D:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe\" -B 0 -L 0 -R 0 -T 0 -d 100 --viewport-size 827x1170 ./" . $fullPathToFile . " " . $_POST['short_title'] . ".pdf");

    //unlink('$_POST[\'short_title\'] . \'.pdf\'');
}