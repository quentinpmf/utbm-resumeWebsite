<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save resume in HTML File</title>
    <?php session_start(); include "login/connectToBDD/conn.php"; ?>
</head>
<body>
    <?php
        if( (isset($_POST['html']) && $_POST['html'] != "")
            && (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "")
            && (isset($_SESSION['UserNom']) && $_SESSION['UserNom'] != "")
            && (isset($_POST['short_title']) && $_POST['short_title'] != "")
            && (isset($_POST['title']) && $_POST['title'] != "") )
        {
            //chemin vers le dossier
            $pathToFolder = "templates/CV/".$_SESSION['UserId']."-".$_SESSION['UserNom'];
            $nameFile = $_POST['short_title'].".html";
            $fullPathToFile = $pathToFolder.'/'.$nameFile;
            //on regarde si le dossier existe déja sinon on le crée.
            if(!is_dir($pathToFolder))
            {
                mkdir($pathToFolder, 0700);
            }

            //création du fichier et ouverture en mode écriture
            $myfile = fopen($fullPathToFile, "w") or die("Unable to open file!");

            //insertion du code html dans le fichier .html
            $txt = $_POST['html'];
            fwrite($myfile, $txt);

            //fermeture du fichier html
            fclose($myfile);

            //BDD :
            $req=$bdd->prepare("SELECT * FROM users_resumes WHERE user_id=:UserId AND short_title=:ShortTitle");
            $req->execute(array(
                'UserId'=>$_SESSION['UserId'],
                'ShortTitle'=>$_POST['short_title']
            ));
            if($req->rowCount()==0){
                //premier enregistrement :
                $req2=$bdd->prepare("INSERT INTO users_resumes(user_id,short_title,title,resume_location) VALUES (:UserId,:ShortTitle,:Title,:ResumeLocation)");
                $req2->execute(array(
                    'UserId'=>$_SESSION['UserId'],
                    'ShortTitle'=>$_POST['short_title'],
                    'Title'=>$_POST['title'],
                    'ResumeLocation'=>$fullPathToFile
                ));
            }
            else{
                //on n'enregistre pas de nouveau
            }

            //on remet la dernier CV dans la session
            if($fullPathToFile != $_SESSION['UserLastResumeLocation'])
            {
                $_SESSION['UserLastResumeLocation'] = $fullPathToFile;
            }
        }
    ?>
</body>
</html>