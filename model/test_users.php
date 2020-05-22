<?php

class test_user extends database {

    public $phone = 0;
    public $id_test_departments = 0;
    public $firstname = '';
    public $lastname = '';
    public $password = '';
    public $pseudo = '';
    public $mail = '';
    public $infos = '';

    // on crée une methode magique __construct()
    public function __construct() {
// On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    public function add_user() {

        $result = array();
        // Insertion des données de l'utilisateur à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        //id_test_role est mit automatiquement sur 2 (memebres) en DB
        $query = 'INSERT INTO `test_user` (`firstname`, `lastname`, `password`, `pseudo`, `mail`, `phone`, `infos`, `id_test_departments`)
                VALUES (:firstname, :lastname, :password, :pseudo, :mail, :phone, :infos, :id_test_departments)';
        $add_user = $this->database->prepare($query);
        $add_user->bindvalue(':firstname', $this->firstname, PDO::PARAM_STR);
        $add_user->bindvalue(':lastname', $this->lastname, PDO::PARAM_STR);
        $add_user->bindvalue(':password', $this->password, PDO::PARAM_STR);
        $add_user->bindvalue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $add_user->bindvalue(':mail', $this->mail, PDO::PARAM_STR);
        $add_user->bindvalue(':phone', $this->phone, PDO::PARAM_INT);
        $add_user->bindvalue(':infos', $this->infos, PDO::PARAM_STR);
        $add_user->bindvalue(':id_test_departments', $this->id_test_departments, PDO::PARAM_INT);
        return $add_user->execute();
    }

    /**
     * création d'une méthode qui va verfifier si le pseudo entré dans le formulaire d'inscription
     * ne correspond pas deja à celui d'un compte existant   
     * @return type
     */
    public function checkFreePseudo() {

        $query = 'SELECT COUNT(`pseudo`) AS `takenPseudo` FROM `test_user` WHERE `pseudo` = :pseudo';
        $freePseudo = $this->database->prepare($query);
        $freePseudo->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        if ($freePseudo->execute()) {
            $resultObject = $freePseudo->fetch(PDO::FETCH_OBJ);
            $result = $resultObject->takenPseudo;
        }
        return $result;
    }

    /**
     * création d'une méthode qui va verfifier si l'email entré dans le formulaire d'inscription
     * ne corrspond pas deja à un compte existant  
     * @return type
     */
    public function checkFreeMail() {

        $query = 'SELECT COUNT(`mail`) AS `takenMail` FROM `test_user` WHERE `mail` = :mail ';
        $freeMail = $this->database->prepare($query);
        $freeMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($freeMail->execute()) {
            $resultObject = $freeMail->fetch(PDO::FETCH_OBJ);
            $result = $resultObject->takenMail;
        }
        return $result;
    }

    
    
    
}
