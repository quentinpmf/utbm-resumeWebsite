<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change resume name</title>
    <?php session_start(); include "login/connectToBDD/conn.php"; ?>
</head>
<body>
    <?php
        if( (isset($_POST['id']) && $_POST['id'] != "")
            && (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "")
            && (isset($_POST['title']) && $_POST['title'] != "") )
        {
            //titre minimum de 3 caractères
            $title = strtolower($_POST['title']);
            if(strlen($title) >= 3)
            {
                //on forme le short title avec le title sans les espaces
                $short_title = str_replace(" ", "", $title);

                //BDD :
                $req=$bdd->prepare("SELECT * FROM users_resumes WHERE user_id=:UserId AND id=:ResumeId");
                $req->execute(array(
                    'UserId'=>$_SESSION['UserId'],
                    'ResumeId'=>$_POST['id']
                ));
                if($req->rowCount()!=0)
                {
                    while ($data = $req->fetch())
                    {
                        //ancienne location
                        $resume_location = $data["resume_location"];

                        //renommer le fichier sur le serveur
                        $newLocation = "templates/CV/".$_SESSION['UserId']."-".$_SESSION['UserNom']."/".$short_title.".html";
                        rename($resume_location, $newLocation);

                        //si le CV est bien présent, on fait l'update de son nom :
                        $req2=$bdd->prepare("UPDATE users_resumes SET short_title=:ShortTitle,title=:NewTitle,resume_location=:ResumeLocation WHERE id=:ResumeId AND user_id=:UserId");
                        $req2->execute(array(
                            'ShortTitle'=>$short_title,
                            'NewTitle'=>$_POST['title'],
                            'ResumeId'=>$_POST['id'],
                            'UserId'=>$_SESSION['UserId'],
                            'ResumeLocation'=>$newLocation
                        ));

                        //on remet la CV renommé dans la session
                        if($newLocation != $_SESSION['UserLastResumeLocation'])
                        {
                            $_SESSION['UserLastResumeLocation'] = $newLocation;
                        }
                    }
                }
            }
        }
    ?>
</body>
</html>