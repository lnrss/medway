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
                <div id="inputsContainer">
                    <div>
                        <label for="usernameInput" id="usernameLabel" class="labelInput">
                            <span class="allLabels">Nom d'utilisateur*</span>
                            <input type="text" id="usernameInput" class="allInputs" placeholder="Login">
                        </label>
                    </div>
                    <div>
                        <label for="passwordInput" id="passwordLabel" class="labelInput">
                            <span class="allLabels">Mot de passe*</span>
                            <input type="password" id="passwordInput" class="allInputs" placeholder="Votre mot de passe">
                            <span id="forgetPassword">Mot de passe oublié</span>
                        </label>
                    </div>
                    <input type="button" value="Se connecter" id="loginSubmit">
                </div>
                
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>