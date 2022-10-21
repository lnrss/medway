<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medway - Gestion d'un patient</title>
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
                    Prendre en charge le patient <span id="namePatient">John Doe</span>
                </h3>
                <section id="coordonneesContainer">
                    <div id="leftSidePatient">
                        <div id="inputsContainer">
                            <div>
                                <label for="patientNameInput" id="patientNameLabel" class="labelInput">
                                    <span class="allLabels">Nom du patient</span>
                                    <input type="text" id="patientNameInput" class="allInputs" value="John Doe">
                                </label>
                            </div>
                            <div>
                                <label for="dateBirthdayInput" id="dateBirthdayLabel" class="labelInput">
                                    <span class="allLabels">Date de naissance</span>
                                    <input type="date" id="dateBirthdayInput" class="allInputs" placeholder="jj/mm/aaaa">
                                </label>
                            </div>
                            <div>
                                <label for="sizeInput" id="sizeLabel" class="labelInput">
                                    <span class="allLabels">Taille</span>
                                    <input type="text" id="sizeInput" class="allInputs" placeholder="Taille du client">
                                </label>
                            </div>
                            <div>
                                <label for="weightInput" id="weightLabel" class="labelInput">
                                    <span class="allLabels">Poids</span>
                                    <input type="text" id="weightInput" class="allInputs" placeholder="Poids du client">
                                </label>
                            </div>
                            <div>
                                <label for="sexeInput" id="sexeLabel" class="labelInput">
                                    <span class="allLabels">Sexe*</span>
                                    <select type="text" id="sexeInput" class="allInputs" style="width:360px">
                                        <option value="">Homme</option>
                                        <option value="">Femme</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="rightSidePatient">
                        <div>
                            <label for="diagInput" id="diagLabel" class="labelInput">
                                <span class="allLabels">Diagnostic</span>
                                <textarea name="" id="diagInput" class="allInputs" placeholder="Votre diagnostic" cols="30" rows="6" style="height:125px"></textarea>
                            </label>
                        </div>
                        <div>
                            <label for="prescriptionInput" id="prescriptionLabel" class="labelInput">
                                <span class="allLabels">Prescription</span>
                                <textarea name="" id="prescriptionInput" class="allInputs" placeholder="Votre prescription" cols="30" rows="6" style="height:125px"></textarea>
                            </label>
                        </div>
                    </div>
                </section>
                <div id="buttonContainer">
                    <input type="button" value="Annuler" class="cancelButton">
                    <input type="button" value="Enregistrer" class="submitButton">
                </div>
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>