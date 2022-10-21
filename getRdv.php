<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medway - Prise de rendez-vous</title>
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
                    Prendre rendez-vous
                </h3>
                <div id="inputsContainer">
                    <div>
                        <label for="hourInput" id="hourLabel" class="labelInput">
                            <span class="allLabels">Heure*</span>
                            <input type="text" id="hourInput" class="allInputs" placeholder="hh/mm">
                        </label>
                    </div>
                    <div>
                        <label for="doctorInput" id="doctorLabel" class="labelInput">
                            <span class="allLabels">Médecin*</span>
                            <select type="text" id="doctorInput" class="allInputs" style="width:360px">
                                <option value="">Sélectionnez votre médecin</option>
                            </select>
                        </label>
                    </div>
                    <div>
                        <label for="dateInput" id="dateLabel" class="labelInput">
                            <span class="allLabels">Date*</span>
                            <input type="date" id="dateInput" class="allInputs" placeholder="Votre identifiant">
                            <span id="errorDateDoctor">Le rendez-vous n'est pas disponible, essayez une autre date/heure.</span>
                        </label>
                    </div>
                    <div>
                        <label for="hourInput" id="hourLabel" class="labelInput">
                            <span class="allLabels">Raison*</span>
                            <textarea name="" id="reasonInput" class="allInputs" placeholder="Votre raison du rendez-vous" cols="30" rows="6"></textarea>
                        </label>
                    </div>
                    <div id="consentCGV">
                        <label for="checkboxCGV">
                            <input type="checkbox" id="checkboxCGV">
                            <span id="descCGV">Je consent mon engagement</span>
                        </label>
                    </div>
                    <input type="button" value="Je prend rendez-vous" id="loginSubmit">
                </div>
                
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>