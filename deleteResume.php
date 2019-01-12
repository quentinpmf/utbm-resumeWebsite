<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete resume by Id</title>
    <?php session_start(); include "login/connectToBDD/conn.php"; ?>
</head>
<body>
    <?php
        if( (isset($_POST['id']) && $_POST['id'] != "")
            && (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "") )
        {

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
                    //On supprime le CV.html sur le serveur
                    $resume_location = $data["resume_location"];
                    unlink($resume_location);
                }

                //On supprime le CV en base :
                $req=$bdd->prepare("DELETE FROM users_resumes WHERE user_id=:UserId AND id=:ResumeId");
                $req->execute(array(
                    'UserId'=>$_SESSION['UserId'],
                    'ResumeId'=>$_POST['id']
                ));

                //on remet le CV par défaut au jumbotron
                $_SESSION['UserLastResumeLocation'] = "templates/narrow-jumbotron/index.html";
            }


        }
    ?>
</body>
</html>