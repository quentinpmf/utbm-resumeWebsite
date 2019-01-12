<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <title>magicResume</title>

    <!-- Custom styles for this template -->
    <style>
        .login-page {
            width: 360px;
            margin: auto;
        }
        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            text-transform: uppercase;
            outline: 0;
            background: #9647DB;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
        }
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #9647DB;
            text-decoration: none;
        }
        .form .register-form {
            display: none;
        }

        .form .message2 {
            margin: 0px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #EF3B3A;
        }
        body {
            background: 	#E0E0E0; /* fallback for old browsers */
            background: -webkit-linear-gradient(right, #E0E0E0, #9647DB);
            background: -moz-linear-gradient(right, #E0E0E0, #9647DB);
            background: -o-linear-gradient(right, #E0E0E0, #9647DB);
            background: linear-gradient(to left, #E0E0E0, #9647DB);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .succes{
            color:green;
        }

        .erreur{
            color:red;
        }

        input[type=text] {
            box-sizing: border-box;
        }

        /*!
 * Start Bootstrap - Portfolio Item (https://startbootstrap.com/template-overviews/portfolio-item)
 * Copyright 2013-2017 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-portfolio-item/blob/master/LICENSE)
 */

        body {
            padding-top: 54px;
        }

        .formation_info
        {
            border-left: 5px solid white;
            background-color: lightgrey;
        }

        .formation_info a
        {
            color:black;
        }

        .formation_info a:hover
        {
            text-decoration: none;
        }

        .RbtnMargin{
            margin-left: 5px;
        }

        .sessions_list{
            margin-bottom: 25px;
        }

        .divExportPDF
        {
            margin-left: -20px;
        }

        .divCreateFormationButton
        {
            margin-bottom: 100px;
        }

        .white{
            color:white;
        }

        .btn-secondary_ :hover{
            text-decoration: none;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }
    </style>
</head>

<?php
//config
include "connectToBDD/conn.php";
?>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="login-page">
            <div class="form">

                <section class="section-gap-other-pages">
                    <div class="title text-center">

                        <h2>Inscription</h2>

                        <?php if(isset($_GET['error'])){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                switch($_GET['error'])
                                {
                                    case 'champs_manquant':
                                        echo 'Veuillez remplir tous les champs';
                                        break;
                                    case 'tel':
                                        echo 'Numéro de téléphone incorrect';
                                        break;
                                    case 'caractere_mdp':
                                        echo 'Le mot de passe doit faire au moins 4 caractères';
                                        break;
                                    case 'verification_mdp':
                                        echo 'Les deux mots de passe doivent etre identiques';
                                        break;
                                    case 'email_deja_present':
                                        echo 'Cet email est déja enregistré';
                                        break;
                                    case 'caractere_cp':
                                        echo 'Le code postal doit etre composé de 5 chiffres';
                                        break;
                                    case 'caractere_telephone':
                                        echo 'Le téléphone doit etre composé de 10 chiffres';
                                        break;
                                }
                                ?>
                            </div>
                        <?php }elseif(isset($_GET['inscription']) && $_GET['inscription'] == 'ok'){
                            ?>
                            <div class="alert alert-success" role="alert">
                                Inscription effectuée.
                            </div>
                            <?php
                        }elseif(isset($_GET['inscription']) && $_GET['inscription'] == 'nok'){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Veuillez vérifier tous les champs.
                            </div>
                            <?php
                        }?>

                        <form class="login-form" method="post" action="connectToBDD/doRegister.php" enctype="multipart/form-data">
                            <input style="border-bottom: 1px solid black;" type="text" id="nom" name="inscription_nom" placeholder="Nom" value="" maxlength="60" />
                            <input style="border-bottom: 1px solid black;" type="text" id="prenom" name="inscription_prenom" placeholder="Prénom" value="" maxlength="60" />
                            <input style="border-bottom: 1px solid black;" type="date" id="date_naissance" name="inscription_date_naissance" placeholder="Date de naissance" value="" maxlength="60" />
                            <input style="border-bottom: 1px solid black;" type="text" id="adresse" name="inscription_adresse" placeholder="Adresse" value="" maxlength="60" />
                            <input style="border-bottom: 1px solid black;" type="text" id="cp" name="inscription_cp" placeholder="Code Postal" value="" maxlength="5" />
                            <input style="border-bottom: 1px solid black;" type="text" id="ville" name="inscription_ville" placeholder="Ville" value="" maxlength="60" />
                            <input style="border-bottom: 1px solid black;" type="text" id="tel" name="inscription_tel" placeholder="Téléphone" value="" maxlength="10" />
                            <input style="border-bottom: 1px solid black;" type="email" id="email" name="inscription_email" placeholder="Email" value="" maxlength="60" />
                            <input style="border-bottom: 1px solid black;" type="password" id="mdp" name="inscription_mdp" placeholder="Mot de passe" value="" maxlength="60" />
                            <input style="border-bottom: 1px solid black;" type="password" id="mdp2" name="inscription_mdp2" placeholder="Confirmation mot de passe" value="" maxlength="60" />
                            <button>S'inscrire</button>
                            <p class="message">Déja inscrit? <a href="login.php">Se connecter</a></p>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>
</body>

<footer>
    <script>
        //vérification date de naissance
        var input_date_naissance = document.getElementById("formulaireSignup").elements["inscription_date_naissance"];
        input_date_naissance.onfocusout = function() {
            var d1 = new Date(this.value);
            var d2 = new Date();

            var annees = d2.getFullYear() - d1.getFullYear();
            if (d2.getMonth()+1 <= d1.getMonth()+1)
            {
                if (d1.getMonth()+1 == d2.getMonth()+1) {
                    if (d1.getDate() > d2.getDate())
                        annees = annees-1;
                }
                else {
                    annees = annees-1;
                }
            }

            if(annees < 18)
            {
                if(annees >= 16)
                {
                    input_date_naissance.style.backgroundColor = "orange";
                    document.getElementById("trAutorisationParentale").style.visibility = "visible";
                    document.getElementById("input_autorisation_parentale").required = true;
                }
                else
                {
                    input_date_naissance.style.backgroundColor = "red";
                    document.getElementById("trAutorisationParentale").style.visibility = "hidden";
                    document.getElementById("input_autorisation_parentale").required = false;
                }
            }
            else
            {
                input_date_naissance.style.backgroundColor = "white";
                document.getElementById("trAutorisationParentale").style.visibility = "hidden";
                document.getElementById("input_autorisation_parentale").required = false;
            }
        }
    </script>
</footer>

</html>