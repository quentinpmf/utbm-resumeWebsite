<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change user informations</title>
    <?php session_start(); include "login/connectToBDD/conn.php"; ?>
</head>
<body>
    <?php
        if( (isset($_SESSION['UserId']) && $_SESSION['UserId'] != "")
            && (isset($_POST['newUserNom']) && $_POST['newUserNom'] != "" && !empty($_POST['newUserNom']))
            && (isset($_POST['newUserPrenom']) && $_POST['newUserPrenom'] != "" && !empty($_POST['newUserPrenom']))
            && (isset($_POST['newUserDate']) && $_POST['newUserDate'] != "" && !empty($_POST['newUserDate']))
            && (isset($_POST['newUserAdresse']) && $_POST['newUserAdresse'] != "" && !empty($_POST['newUserAdresse']))
            && (isset($_POST['newUserCP']) && $_POST['newUserCP'] != "" && !empty($_POST['newUserCP']))
            && (isset($_POST['newUserVille']) && $_POST['newUserVille'] != "" && !empty($_POST['newUserVille']))
            && (isset($_POST['newUserTel']) && $_POST['newUserTel'] != "" && !empty($_POST['newUserTel']))
            && (isset($_POST['newUserEmail']) && $_POST['newUserEmail'] != "" && !empty($_POST['newUserEmail']))
            && (isset($_POST['newUserPassword']) && $_POST['newUserPassword'] != "" && !empty($_POST['newUserPassword'])) )
        {
            if(is_numeric($_POST['newUserCP']) && strlen($_POST['newUserCP']) == 5 && is_numeric($_POST['newUserTel']) && strlen($_POST['newUserTel']) == 10)
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
                        //si le user est bien présent, on fait l'update de ses infos :
                        $req2=$bdd->prepare("UPDATE users SET email=:newUserEmail,password=:newUserPassword,nom=:newUserNom,prenom=:newUserPrenom,date_naissance=:newUserDate,adresse=:newUserAdresse,cp=:newUserCP,ville=:newUserVille,telephone=:newUserTel WHERE id=:UserId");
                        $req2->execute(array(
                            'newUserEmail'=>suppr_accents($_POST['newUserEmail']),
                            'newUserPassword'=>sha1($_POST['newUserPassword']),
                            'newUserNom'=>suppr_accents($_POST['newUserNom']),
                            'newUserPrenom'=>suppr_accents($_POST['newUserPrenom']),
                            'newUserDate'=>$_POST['newUserDate'],
                            'newUserAdresse'=>suppr_accents($_POST['newUserAdresse']),
                            'newUserCP'=>$_POST['newUserCP'],
                            'newUserVille'=>suppr_accents($_POST['newUserVille']),
                            'newUserTel'=>$_POST['newUserTel'],
                            'UserId'=>$_SESSION['UserId']
                        ));

                        $_SESSION['UserEmail'] = suppr_accents($_POST['newUserEmail']);
                        $_SESSION['UserPassword'] = sha1($_POST['newUserPassword']);
                        $_SESSION['UserNom'] = suppr_accents($_POST['newUserNom']);
                        $_SESSION['UserPrenom'] = suppr_accents($_POST['newUserPrenom']);
                        $_SESSION['UserDate'] = $_POST['newUserDate'];
                        $_SESSION['UserAdresse'] = suppr_accents($_POST['newUserAdresse']);
                        $_SESSION['UserCP'] = $_POST['newUserCP'];
                        $_SESSION['UserVille'] = suppr_accents($_POST['newUserVille']);
                        $_SESSION['UserTel'] = $_POST['newUserTel'];
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