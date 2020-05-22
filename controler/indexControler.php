<?php

//creation d'un tableau d'erreur pour retranscrire les erreurs lors du remplissage du formaulaire $formError = array();
    $formError = array();

    $error = FALSE;
    $addSuccess = FALSE;

    $departments = new test_departments;
    $getDepartment = $departments->getDepartmentList();

    $idUsers = new test_user();

//création des regex pour créer les données du formulaire
    $regexPhoneNumber = '/^[0-9]{10,10}$/';
    $regexPseudo = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
    $regexBirthdate = '/[0-9]{4}-[0-9]{2}-[0-9]{2}/';

    if (isset($_POST['firstname'])) {
        $idUsers->firstname = htmlspecialchars($_POST['firstname']);
        if (!preg_match($regexPseudo, $idUsers->firstname)) {
            $formError['firstname'] = 'votre prénom ne doit contenir que des lettres ou des chiffres';
        }
        if (empty($idUsers->firstname)) {
            $formError['firstname'] = 'Le prénom est obligatoire';
        }
    }

    if (isset($_POST['lastname'])) {
        $idUsers->lastname = htmlspecialchars($_POST['lastname']);
        if (!preg_match($regexPseudo, $idUsers->lastname)) {
            $formError['lastname'] = 'votre nom ne doit contenir que des chiffres ou des lettes';
        }
        if (empty($idUsers->lastname)) {
            $formError['lastname'] = 'Le nom est obligatoire';
        }
    }

//On test la valeur pseudo dans l'array $_POST, si elle existe via un premier if
    if (isset($_POST['pseudo'])) {
        //variable qui verfifie ques les caracteres speciaux soient converties en entité HTML via htmlspecialchars = protection
        $idUsers->pseudo = htmlspecialchars($_POST['pseudo']);
        //on va tester que la variable n'est pas egale à la regex
        if (!preg_match($regexPseudo, $idUsers->pseudo)) {
            // on créé un message d'erreur dans le tableau $formError créé plus haut
            $formError['pseudo'] = 'Votre pseudo ne doit contenir que des lettres ou des chiffres';
        }
        //si le post pseudo n'est pas rempli (donc vide)
        if (empty($idUsers->pseudo)) {
            $formError['pseudo'] = 'Le pseudo est obligatoire';
        }
    }

//on verifie que les 2 entrées de mot de passe soient identiques, dans le cas contraire on integre l'erreur dans le tableau d'erreurs
    if (isset($_POST['password'])) {
        if ($_POST['password'] != $_POST['password2']) {
            $formError['password'] = 'Vos mots de passe ne sont pas identiques';
            $formError['password2'] = 'Vos mots de passe ne sont pas identiques';
        }
    }

    if (isset($_POST['password'])) {
        //fonction password_hash() -- créé une clé de hachage 
        $idUsers->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if (empty($_POST['password'])) {
            $formError['password'] = 'La création d\'un mot de passe est obligatoire';
        }
    }

    if (isset($_POST['password2'])) {
        //fonction password_hash() -- cree une cle de hachage
        $idUsers->password2 = password_hash($_POST['password2'], PASSWORD_DEFAULT);
        if (empty($_POST['password2'])) {
            $formError['password2'] = 'La vérification du mot de passe est obligatoire';
        }
    }

// on verifie que les 2 mails soitent identiques
    if (isset($_POST['mail'])) {
        if ($_POST['mail'] != $_POST['mail2']) {
            $formError['mail'] = 'Vos mails ne sont pas identiques';
        }
    }

    if (isset($_POST['mail'])) {
        //fonction filter_var() -- filtre une variable avec une regex specifique
        // on utilise ici avec le filtre validate_email
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $idUsers->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = 'Le mail n\'est pas valide';
        }
        if (empty($_POST['mail'])) {
            $formError['mail'] = 'Le mail est obligatoire';
        }
    }

    if (isset($_POST['mail2'])) {
        if (filter_var($_POST['mail2'], FILTER_VALIDATE_EMAIL)) {
            $idUsers->mail2 = htmlspecialchars($_POST['mail2']);
        } else {
            $formError['mail2'] = 'Le mail n\'est pas valide';
        }
        if (empty($_POST['mail2'])) {
            $formError['mail2'] = 'La vérification du mail est obligatoire';
        }
    }

    if (isset($_POST['phone'])) {
        $idUsers->phone = htmlspecialchars($_POST['phone']);
        if (!preg_match($regexPhoneNumber, $idUsers->phone)) {
            $formError['phone'] = 'Votre numéro de téléphone doit contenir 10 chiffres et doit être de type 0620300405';
        }
        if (empty($idUsers->phone)) {
            $formError['phone'] = 'Le numero de téléphone est obligatoire';
        }
    }

    if (isset($_POST['infos'])) {
        $idUsers->infos = htmlspecialchars($_POST['infos']);
    }


//On test la valeur idDepartments dans l'array $_POST, si elle existe via premier if
    if (isset($_POST['idDepartments'])) {
        //  vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
        $idUsers->id_test_departments = htmlspecialchars($_POST['idDepartments']);
        // Si le post est vide
        if (empty($idUsers->id_test_departments)) {
            // J'affiche le message d'erreur
            $formError['idDepartments'] = 'Le choix du département est obligatoire';
        }
    }

//on verifie que le Pseudo ne corresponde pas deja à inscrit de la base de donnéé
//grace a la methode checkFreePseudo
    if (!empty($_POST['pseudo'])) {
        $checkFreePseudo = $idUsers->checkFreePseudo();
        //la methode compte le nombre de pseudo corrspondant, s'il est egal a 1, un compte existe deja
        if ($checkFreePseudo >= 1) {
            //on envoie une erreur dans nle tableau 
            $formError['pseudo'] = 'Ce pseudo est deja prit, merci d\'en changer';
        }
    }

    if (!empty($_POST['mail'])) {
        // on verifier en appelant la methode chekFreeMail()
        $checkFreeMail = $idUsers->checkFreeMail();
        //la methode compte le nombre de mail corrspondant, s'il est egal a 1, un compte existe deja
        if ($checkFreeMail >= 1) {
            //on envoie une erreur dans le tableau 
            $formError['mail'] = 'Un compte existe deja avec ce mail';
        }
    }

    if ($formError) {
        $error = TRUE;
    }

    if (count($formError) == 0 && isset($_POST['sendForm'])) {
        $idUsers->id_test_roles == 3;
        if (!$idUsers->add_user()) {
            $error = TRUE;
        } else {
            $addSuccess = TRUE;
        }
    }


