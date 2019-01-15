<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete user by Id</title>
    <?php session_start(); include "login/connectToBDD/conn.php"; ?>
</head>
<body>
    <?php
        if( isset($_SESSION['UserId']) && $_SESSION['UserId'] != "")
        {
            //BDD :
            $req=$bdd->prepare("SELECT * FROM users WHERE id=:UserId");
            $req->execute(array(
                'UserId'=>$_SESSION['UserId']
            ));

            if($req->rowCount()!=0)
            {
                while ($data = $req->fetch())
                {
                    $req2=$bdd->prepare("SELECT * FROM users_resumes WHERE user_id=:UserId");
                    $req2->execute(array(
                        'UserId'=>$_SESSION['UserId']
                    ));

                    $resumeIds = array();
                    while ($data2 = $req2->fetch())
                    {
                        //On supprime les CVs de l'utilisateur dans l'architecture du site
                        $resume_location = $data2["resume_location"];
                        unlink($resume_location);
                        $resumeIds[] = $data2["id"];
                    }

                    //suppression du dossier CV de l'utilisateur.
                    rmdir("templates/CV/".$_SESSION['UserId']);
                }

                foreach ($resumeIds as $resumeId)
                {
                    //On supprime les CVs en base :
                    $req=$bdd->prepare("DELETE FROM users_resumes WHERE user_id=:UserId AND id=:ResumeId");
                    $req->execute(array(
                        'UserId'=>$_SESSION['UserId'],
                        'ResumeId'=>$resumeId
                    ));
                }

                //suppression de l'utilisateur
                $req=$bdd->prepare("DELETE FROM users WHERE id=:UserId");
                $req->execute(array(
                    'UserId'=>$_SESSION['UserId']
                ));

                session_destroy();
            }


        }
    ?>
</body>
</html>