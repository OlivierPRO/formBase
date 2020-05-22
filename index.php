<?php
include ('configuration.php');
include ('model/database.php');
include ('model/test_users.php');
include ('model/test_roles.php');
include ('model/test_departments.php');
include ('controler/indexControler.php');
?>

<!DOCTYPE>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/CSS/CSS.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Indie+Flower&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/JS/script.js" type="text/javascript"></script>
        <script src="assets/JS/JS.js" type="text/javascript"></script>
        <title>form-test</title>
    </head>
    <body>

        <!-- ------------------------------------------------ NAVABAR ------------------------------------------------------>

        <?php
        include 'view/header.php';
        ?>

        <!----------------------------------------------------------------------------------------------------------------->

        <?php if ($addSuccess) { ?>
            <div class="alert alert-success" role='alert'>Le formulaire a bien Ã©tÃ© enregistrÃ©</div>
        <?php } ?>

        <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert" >L'envoi du formulaire a Ã©chouÃ©</div>
        <?php } ?>

        <form role="form" action="#" method="POST">
            <div class="container">
                <div class="col-md-8 offset-md-2">                 

                    <div class="input-group mt-3">
                        <div class="input-group-prepend"><span class="input-group-text cut" id="firstname" >Prénom</span></div>
                        <input type="text" name="firstname" class="form-control" placeholder="Votre prénom" aria-abel="prenom" aria-describedby="prenom"><br />
                    </div>
                    <p class="redAlert"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend"><span class="input-group-text cut" id="lastname">Nom</span></div>
                        <input type="text" name="lastname" class="form-control" placeholder="Votre nom" aria-abel="nom" aria-describedby="nom">
                    </div>
                    <p class="redAlert"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend"><span class="input-group-text cut" id="pseudo">Pseudo</span></div>
                        <input type="text" name="pseudo" class="form-control" placeholder="Votre pseudo" aria-abel="pseudo" aria-describedby="pseudo">
                    </div>
                    <p class="redAlert"><?= isset($formError['pseudo']) ? $formError['pseudo'] : '' ?></p>

                    <div class="form-group mt-3 ">
                        <label class="input-group-text" for="idDepartments">
                            <select class="custom-select"   id="idDepartments" name="idDepartments" >
                                <option value="" selected hidden>Selectionnez votre département</option>
                                <?php foreach ($getDepartment AS $department) { ?>
                                    <option value="<?= $department->id ?>"><?= $department->depNumbers . '-' . $department->depName ?></option>
                                <?php } ?>    
                            </select>
                        </label>
                        <p class="redAlert"><?= isset($formError['idDepartments']) ? $formError['idDepartments'] : '' ?></p>
                    </div>

                    <div class = "input-group mt-3">
                        <input type = "mail" name="mail" id = "mail" class = "form-control" placeholder = "Votre mail" aria-label = "adresse mail" aria-describedby = "adresse mail">
                        <div class = "input-group-append"><span class = "input-group-text cut2" >prenom.nom@exemple.fr</span></div>
                        <div class="mailMessage"></div>
                    </div>
                    <p class="redAlert"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>

                    <div class = "input-group mt-3">
                        <input type = "mail" name="mail2" class = "form-control" placeholder = "saisissez à nouveau votre mail" aria-label = "adresse mail" aria-describedby = "adresse mail">
                        <div class = "input-group-append"><span class = "input-group-text cut2" id = "mail2">prenom.nom@exemple.fr</span></div>
                    </div>
                    <p class="redAlert"><?= isset($formError['mail2']) ? $formError['mail2'] : '' ?></p>

                    <div class = "input-group mt-3">
                        <div class = "input-group-prepend"><span class = "input-group-text cut" id = "phone">Votre téléphone</span></div>
                        <input type = "text" name="phone" class = "form-control" placeholder = "Votre numero de téléphone" aria-abel = "votre téléphone" aria-describedby = "votre téléphone">
                    </div>
                    <p class="redAlert"><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p>

                    <div class = "input-group mt-3">
                        <div class = "input-group-prepend"><span class = "input-group-text cut" id = "infos">Informations<br>complémentaires</span></div>
                        <textarea class = "form-control" name="infos" aria-label = "informations complÃ©mentaires"></textarea>
                    </div>

                    <div class = "input-group mt-3">
                        <div class = "input-group-prepend"><span class = "input-group-text cut" id = "password">Mot de passe</span></div>
                        <input type = "password" name="password" class = "form-control" placeholder = "Votre mot de passe" aria-abel = "mot de passe" aria-describedby = "mot de passe">
                    </div>
                    <p class="redAlert"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>

                    <div class = "input-group mt-3">
                        <div class = "input-group-prepend"><span class = "input-group-text cut" id = "password2">Mot de passe</span></div>
                        <input type = "password" name="password2" class = "form-control" placeholder = "Saisissez à  nouveau votre mot de passe" aria-abel = "mot de passe" aria-describedby = "mot de passe">
                    </div>
                    <p class="redAlert"><?= isset($formError['password2']) ? $formError['password2'] : '' ?></p>

                    <div class="mouseSendForm text-center mt-5">
                        <input type="submit" class="btn btn-dark" name="sendForm" value="Valider" />
                        <p class="mt-1 error pb-5"><?= isset($formError['add']) ? $formError['add'] : '' ?></p>
                    </div>

                </div>
            </div>
        </form>

        <!-- ----------------------------------------------------------------------------------------------------------------->
        <?php
        include 'view/footer.php';
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>