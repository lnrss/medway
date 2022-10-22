<?php
session_start();
include('assets/constantes.php');
global $emptyError1;

if(isset($_POST["loginSubmit"])) {
    $login = htmlspecialchars($_POST["usernameInput"]);
    $password = htmlspecialchars($_POST["passwordInput"]);
    $qw=$connection->prepare("SELECT * FROM user WHERE login=? limit 1");
    $qw->execute(array($login));
    $res=$qw->fetch();
    if(isset($res['password'])){
        if(password_verify($password, $res['password'])){
            $_SESSION["id"] = $res["idUser"];
            $_SESSION["firstname"] = $res["firstname"];
            $_SESSION["lastname"] = $res["lastname"];
            $_SESSION["login"] = $res["login"];
            $_SESSION["role"] = $res["role"];
            header("Location: http://localhost:8888/medway");
        }}
    else
        $emptyError1 = '<div class="errorInput">
                            Login ou mot de passe incorrect
                        </div>';
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medway - Connexion</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="assets/scripts/jquery-3.6.0.js"></script>

    </head>
    <body>
        <?php
        require_once('assets/templates/header.php')
        ?>
        <main id="loginPageContainer">
            <section id="loginContainer">
                <h3 id="titlePageLogin">
                    Se connecter
                </h3>
                <form method="POST" action="" id="inputsContainer">
                    <div>
                        <label for="usernameInput" id="usernameLabel" class="labelInput">
                            <span class="allLabels">Nom d'utilisateur*</span>
                            <input type="text" id="usernameInput" name="usernameInput" class="allInputs" placeholder="Login">
                        </label>
                    </div>
                    <div>
                        <label for="passwordInput" id="passwordLabel" class="labelInput">
                            <span class="allLabels">Mot de passe*</span>
                            <input type="password" id="passwordInput" name="passwordInput" class="allInputs" placeholder="Votre mot de passe">
                            <span id="forgetPassword">Mot de passe oublié</span>
                            <?= $emptyError1 ?>
                        </label>
                    </div>
                    <input type="submit" value="Se connecter" id="loginSubmit" name="loginSubmit">
                </form>
                
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>