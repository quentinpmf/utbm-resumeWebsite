<?php

class user{
    private $UserId, $UserEmail, $UserPassword, $UserNom, $UserPrenom, $UserDateNaissance, $UserAdress, $UserCP, $UserVille, $UserTel;

	/*Création de fonction pour allez chercher les informations */
	
	//Id
    public function getUserId(){
        return $this->UserId;
    }
    public function setUserID($UserId){
        $this->UserId=$UserId;
    }

    //Email
    public function getUserEmail(){
        return $this->UserEmail;
    }
    public function setUserEmail($UserEmail){
        $this->UserEmail=$UserEmail;
    }

    //Password
    public function getUserPassword(){
        return $this->UserPassword;
    }
    public function setUserPassword($UserPassword){
        $this->UserPassword=$UserPassword;
    }

    //Date de naissance
    public function getUserDateNaissance(){
        return $this->UserDateNaissance;
    }
    public function setUserDateNaissance($UserDateNaissance){
        $this->UserDateNaissance=$UserDateNaissance;
    }

    //Nom
    public function getUserNom(){
        return $this->UserNom;
    }
    public function setUserNom($UserNom){
        $this->UserNom=$UserNom;
    }

    //Prenom
    public function getUserPrenom(){
        return $this->UserPrenom;
    }
    public function setUserPrenom($UserPrenom){
        $this->UserPrenom=$UserPrenom;
    }

    //ADRESSE
    public function getUserAdress(){
        return $this->UserAdress;
    }
    public function setUserAdress($UserAdress){
        $this->UserAdress=$UserAdress;
    }

    //CODE POSTAL
    public function getUserCP(){
        return $this->UserCP;
    }
    public function setUserCP($UserCP){
        $this->UserCP=$UserCP;
    }

    //VILLE
    public function getUserVille(){
        return $this->UserVille;
    }
    public function setUserVille($UserVille){
        $this->UserVille=$UserVille;
    }

    //TEL
    public function getUserTel(){
        return $this->UserTel;
    }
    public function setUserTel($UserTel){
        $this->UserTel=$UserTel;
    }
    
	/*Compar les donnés saisi par l'utilisateur avec ceux sur la BDD*/
    public function Userlogin(){
        include "conn.php";
        $req=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=:UserEmail AND password=:UserPassword");
        $req->execute(array(
            'UserEmail'=>$this->getUserEmail(),
            'UserPassword'=>$this->getUserPassword()
            ));
        if($req->rowCount()==0){
            header("Location: ../login.php?error=1"); /*Erreur de connexion*/
            return false;
        }
        else{
            while($data=$req->fetch()){
                $this->setUserId($data['id']);
                $this->setUserEmail($data['email']);
                $this->setUserPassword($data['password']);
                $this->setUserNom($data['nom']);
                $this->setUserPrenom($data['prenom']);
                $this->setUserDateNaissance($data['date_naissance']);
                $this->setUserAdress($data['adresse']);
                $this->setUserCP($data['cp']);
                $this->setUserVille($data['ville']);
                $this->setUserTel($data['telephone']);
            }
            header("Location: ../../index.php?connect=ok");      /*Bien identifié la session est créée*/
            return true;
        }
        
    }

	public function InsertUser(){
        include "conn.php";
        $req=$bdd->prepare("INSERT INTO utilisateurs(email,password,nom,prenom,date_naissance,adresse,cp,ville,telephone) VALUES (:UserEmail,:UserPassword,:UserNom,:UserPrenom,:UserDateNaissance,:UserAdress,:UserCP,:UserVille,:UserTel)");
        $req->execute(array(
			'UserEmail'=>$this->getUserEmail(),
			'UserPassword'=>$this->getUserPassword(),
			'UserNom'=>$this->getUserNom(),
			'UserPrenom'=>$this->getUserPrenom(),
			'UserDateNaissance'=>$this->getUserDateNaissance(),
			'UserAdress'=>$this->getUserAdress(),
			'UserCP'=>$this->getUserCP(),
			'UserVille'=>$this->getUserVille(),
			'UserTel'=>$this->getUserTel()
        ));

        $req2=$bdd->prepare("SELECT id FROM utilisateurs WHERE email=:UserEmail");
        $req2->execute(array(
            'UserEmail'=>$this->getUserEmail()
        ));
        if($req2->rowCount()==0){
            header("Location: ../login.php?error=InsertUser"); /*Erreur de connexion*/
            return false;
        }
        else{
            while($data=$req2->fetch()){
                $this->setUserId($data['id']);
            }
        }
    }
}
    



?>