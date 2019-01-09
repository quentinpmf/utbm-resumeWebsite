<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Users Resumes from MySQL</title>

    <?php
        //config
        include "login/connectToBDD/conn.php";
        session_start();
    ?>

</head>
<body>
    <?php

        if( (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "") )
        {
            $req=$bdd->prepare("SELECT * FROM users_resumes WHERE user_id=:UserId");
            $req->execute(array(
                'UserId'=>$_SESSION['UserId']
            ));
            if($req->rowCount()!==0) {
                while ($data = $req->fetch())
                {
                    $tab[] = array('id' => $data["id"], 'title' => $data["title"], 'resume_location' => $data["resume_location"]);
                }
            }
        }

        return $tab;
    ?>


    <script>
        alert('in getUsersResumes.php');
    </script>
</body>
</html>