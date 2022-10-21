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
                <div id="inputsContainer">
                    <div>
                        <label for="lastnameInput" id="lastnameLabel" class="labelInput">
                            <span class="allLabels">Nom*</span>
                            <input type="text" id="lastnameInput" class="allInputs" placeholder="Votre nom de famille">
                        </label>
                    </div>
                    <div>
                        <label for="firstnameInput" id="firstnameLabel" class="labelInput">
                            <span class="allLabels">Prénom*</span>
                            <input type="text" id="firstnameInput" class="allInputs" placeholder="Votre prénom">
                        </label>
                    </div>
                    <div>
                        <label for="usernameInput" id="usernameLabel" class="labelInput">
                            <span class="allLabels">Login*</span>
                            <input type="text" id="usernameInput" class="allInputs" placeholder="Votre identifiant">
                        </label>
                    </div>
                    <div>
                        <label for="passwordInput" id="passwordLabel" class="labelInput">
                            <span class="allLabels">Mot de passe*</span>
                            <input type="password" id="passwordInput" class="allInputs" placeholder="Votre mot de passe">
                        </label>
                    </div>
                    <div>
                        <label for="passwordConfirmationInput" id="passwordConfirmationLabel" class="labelInput">
                            <span class="allLabels">Confirmation du mot de passe*</span>
                            <input type="password" id="passwordConfirmationInput" class="allInputs" placeholder="Confirmez votre mot de passe">
                        </label>
                    </div>
                    <div>
                        <label for="patientInput" id="patientLabel" class="labelInput">
                            <span class="allLabels">Je suis...</span>
                            <select type="text" id="patientInput" class="allInputs" style="width:360px">
                                <option value="">Patient</option>
                                <option value="">Docteur</option>
                            </select>
                        </label>
                    </div>
                    <div id="consentCGV">
                        <label for="checkboxCGV">
                            <input type="checkbox" id="checkboxCGV">
                            <span id="descCGV">J'accepte les <span class="bold">mentions légales</span> et <span class="bold">CGV</span> </span>
                        </label>
                    </div>
                    <input type="button" value="C'est parti !" id="loginSubmit">
                </div>
                
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>