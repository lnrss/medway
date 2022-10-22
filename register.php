<?php
session_start();
include('assets/constantes.php');
global $success_msg, $login_exist, $emptyError1, $emptyError2, $emptyError3, $emptyError4, $emptyError5, $emptyError6, $emptyError7, $emptyError8;

if(isset($_POST["submit"])) {
    $lastname = htmlspecialchars($_POST["lastnameInput"]);
    $firstname = htmlspecialchars($_POST["firstnameInput"]);
    $login = htmlspecialchars($_POST["usernameInput"]);
    $password = htmlspecialchars($_POST["passwordInput"]);
    $password_comfirm = htmlspecialchars($_POST["passwordConfirmationInput"]);
    $role = htmlspecialchars($_POST["patientInput"]);
    // $checkCgv = $_POST["checkboxCGV"];

    $loginCheck = $connection->query("SELECT * FROM user WHERE login = '{$login}'");
    $rowCount = $loginCheck->fetchColumn();

    if(!empty($lastname) && !empty($firstname) && !empty($login) && !empty($password) && !empty($role)){
        if($rowCount > 0) {
            $emptyError7 = '<div class="errorInput">
                                Le login est indisponible
                            </div>';
        } else if($password != $password_comfirm){
            $emptyError8 = '<div class="errorInput">
                                Le mot de passe n\'est pas identique
                            </div>';
        }else {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $roleCount = $role == "doctor" ? 2 : ($role == "patient" ? 1 : 0);
            // $connection = $connection->query("INSERT INTO doctor(firstname, lastname, login, password) 
            // VALUES ('{$firstname}', '{$lastname}', '{$login}', '{$password_hash}')");
            $qw = $connection->prepare("INSERT into user(firstname, lastname, login, password, role) values(?,?,?,?,?)");
            $qw->execute(array($firstname, $lastname, $login, $password_hash, $roleCount));
            if(!$connection){
                die("MySQL query failed!");
            } else {
                $qw = $connection->query("SELECT LAST_INSERT_ID()");
                $id = $qw->fetchColumn();
                $_SESSION["id"] = $id;
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;
                $_SESSION["login"] = $login;
                $_SESSION["role"] = $roleCount;
                header("Location: http://localhost:8888/medway");
            }
        }
    } else {
        if(empty($firstname)){
            $emptyError1 = '<div class="errorInput">
                                Le prénom est obligatoire
                            </div>';
        }
        if(empty($lastname)){
            $emptyError2 = '<div class="errorInput">
                                Le nom est obligatoire
                            </div>';
        }
        if(empty($login)){
            $emptyError3 = '<div class="errorInput">
                                Le login est obligatoire pour vous identifier
                            </div>';
        }
        if(empty($role)){
            $emptyError4 = '<div class="errorInput">
                                Votre rôle est obligatoire
                            </div>';
        }
        if(empty($password)){
            $emptyError5 = '<div class="errorInput">
                                Le mot de passe est obligatoire
                            </div>';
        }
        if(empty($password_comfirm)){
            $emptyError6 = '<div class="errorInput">
                                Renseignez à nouveau le mot de passe
                            </div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medway - Inscription</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="assets/scripts/jquery-3.6.0.js"></script>

    </head>
    <body>
        <?php
        require_once('assets/templates/header.php')
        ?>
        <main id="loginPageContainer">
            <section id="registerContainer">
                <h3 id="titlePageLogin">
                    S'inscrire
                </h3>
                <form action="" method="POST" id="inputsContainer">
                    <div>
                        <label for="lastnameInput" id="lastnameLabel" class="labelInput">
                            <span class="allLabels">Nom*</span>
                            <input type="text" id="lastnameInput" name="lastnameInput" class="allInputs" placeholder="Votre nom de famille">
                            <?=$emptyError2?>
                        </label>
                    </div>
                    <div>
                        <label for="firstnameInput" id="firstnameLabel" class="labelInput">
                            <span class="allLabels">Prénom*</span>
                            <input type="text" id="firstnameInput" name="firstnameInput" class="allInputs" placeholder="Votre prénom">
                            <?=$emptyError1?>
                        </label>
                    </div>
                    <div>
                        <label for="usernameInput" id="usernameLabel" class="labelInput">
                            <span class="allLabels">Login*</span>
                            <input type="text" id="usernameInput" name="usernameInput" class="allInputs" placeholder="Votre identifiant">
                            <?=$emptyError3?>
                            <?=$emptyError7; ?>
                        </label>
                    </div>
                    <div>
                        <label for="passwordInput" id="passwordLabel" class="labelInput">
                            <span class="allLabels">Mot de passe*</span>
                            <input type="password" id="passwordInput" name="passwordInput" class="allInputs" placeholder="Votre mot de passe">
                            <?=$emptyError5?>
                        </label>
                    </div>
                    <div>
                        <label for="passwordConfirmationInput" id="passwordConfirmationLabel" class="labelInput">
                            <span class="allLabels">Confirmation du mot de passe*</span>
                            <input type="password" id="passwordConfirmationInput" name="passwordConfirmationInput" class="allInputs" placeholder="Confirmez votre mot de passe">
                            <?=$emptyError8?>
                        </label>
                    </div>
                    <div>
                        <label for="patientInput" id="patientLabel" class="labelInput">
                            <span class="allLabels">Je suis...</span>
                            <select type="text" id="patientInput" name="patientInput" class="allInputs" style="width:360px">
                                <option value="patient">Patient</option>
                                <option value="doctor">Docteur</option>
                            </select>
                        </label>
                    </div>
                    <div id="consentCGV">
                        <label for="checkboxCGV">
                            <input type="checkbox" id="checkboxCGV" name="checkboxCGV">
                            <span id="descCGV">J'accepte les <span class="bold">mentions légales</span> et <span class="bold">CGV</span> </span>
                        </label>
                    </div>
                    <input type="submit" name="submit" value="C'est parti !" id="loginSubmit">
                </form>
                
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>