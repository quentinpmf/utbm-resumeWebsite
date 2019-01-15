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
            $title = suppr_accents(strtolower($_POST['title']));
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

    <?php
        /**
         * Supprimer les accents
         *
         * @param string $str chaîne de caractères avec caractères accentués
         * @param string $encoding encodage du texte (exemple : utf-8, ISO-8859-1 ...)
         */
        function suppr_accents($str, $encoding='utf-8')
        {
            // transformer les caractères accentués en entités HTML
            $str = htmlentities($str, ENT_NOQUOTES, $encoding);

            // remplacer les entités HTML pour avoir juste le premier caractères non accentués
            // Exemple : "&ecute;" => "e", "&Ecute;" => "E", "à" => "a" ...
            $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);

            // Remplacer les ligatures tel que : , Æ ...
            // Exemple "œ" => "oe"
            $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
            // Supprimer tout le reste
            $str = preg_replace('#&[^;]+;#', '', $str);

            return $str;
        }
    ?>
</body>
</html>