<?php
session_start();
include('assets/constantes.php');
global $emptyError1, $emptyError2, $emptyError3, $emptyError4, $emptyError5;

$qw = $connection->prepare("SELECT u.*, m.* FROM user u INNER JOIN meet m ON u.idUser = m.idUser WHERE u.idUser=? AND m.idMeet=?");
$qw -> execute(array($_GET['id'], $_GET['idm']));
$res = $qw->fetch();
if(isset($_POST["submitPatient"])) {
    $birthday = htmlspecialchars($_POST["dateBirthdayInput"]);
    $size = htmlspecialchars($_POST["sizeInput"]);
    $weight = htmlspecialchars($_POST["weightInput"]);
    $gender = htmlspecialchars($_POST["sexeInput"]);
    $diagnostic = htmlspecialchars($_POST["diagInput"]);
    $prescription = htmlspecialchars($_POST["prescriptionInput"]);
    if(!isset($birthday) || $birthday == ""){
        $emptyError1 = '<div class="errorInput">
            La date n\'est pas valide
        </div>';
    }
    if(!isset($size) || $size == ""){
        $emptyError2 = '<div class="errorInput">
            Aucune taille renseignée
        </div>';
    }
    if(!isset($weight) || $weight == ""){
        $emptyError3 = '<div class="errorInput">
            Aucun poids renseigné
        </div>';
    }
    if(!isset($diagnostic) || $diagnostic == ""){
        $emptyError4 = '<div class="errorInput">
            Aucun diagnostic renseigné
        </div>';
    }
    if(!isset($prescription) || $prescription == ""){
        $emptyError5 = '<div class="errorInput">
            Aucune prescription renseignée
        </div>';
    }
    if((isset($birthday) && $birthday != "") && (isset($size) && $size != "") && (isset($weight) && $weight != "") && (isset($diagnostic) && $diagnostic != "") && (isset($prescription) && $prescription != "")){
        $qw = $connection->prepare("INSERT into diagnostic(idUser, description, prescription) values(?,?,?)");
        $qw->execute(array($_GET["id"], $diagnostic, $prescription));
        $qw= $connection->prepare("UPDATE user SET birthday=?, size=?, weight=?, gender=? WHERE idUser=?");
        $qw->execute(array($birthday, $size, $weight, $gender, $_GET["id"]));
        $qw= $connection->prepare("UPDATE meet SET checkByDoctor=? WHERE idUser=? AND idMeet=?");
        $qw->execute(array(true, $_GET["id"], $_GET["idm"]));
        header("Location: http://localhost:8888/medway/patientList.php");
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medway - Gestion du patient <?= $res['firstname'].' '.$res['lastname'] ?></title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="assets/scripts/jquery-3.6.0.js"></script>

    </head>
    <body>
        <?php
        require_once('assets/templates/header.php')
        ?>
        <main id="loginPageContainer">
            <form action="" method="POST" id="registerContainer">
                <h3 id="titlePageLogin">
                    Prendre en charge le patient <span id="namePatient"><?= $res['firstname'].' '.$res['lastname'] ?></span>
                </h3>
                <section id="coordonneesContainer">
                    <div id="leftSidePatient">
                        <div id="inputsContainer">
                            <div>
                                <label for="patientNameInput" id="patientNameLabel" class="labelInput">
                                    <span class="allLabels">Nom du patient</span>
                                    <input type="text" id="patientNameInput" name="patientNameInput" class="allInputs" value="<?= $res['firstname'].' '.$res['lastname'] ?>">
                                </label>
                            </div>
                            <div>
                                <label for="dateBirthdayInput" id="dateBirthdayLabel" class="labelInput">
                                    <span class="allLabels">Date de naissance</span>
                                    <input type="date" id="dateBirthdayInput" name="dateBirthdayInput" class="allInputs" placeholder="jj/mm/aaaa" value="<?= $res['birthday'] ?>">
                                    <?=$emptyError1?>
                                </label>
                            </div>
                            <div>
                                <label for="sizeInput" id="sizeLabel" class="labelInput">
                                    <span class="allLabels">Taille (cm)</span>
                                    <input type="text" id="sizeInput" name="sizeInput" class="allInputs" placeholder="Taille du client" value="<?= $res['size'] ?>">
                                    <?=$emptyError2?>
                                </label>
                            </div>
                            <div>
                                <label for="weightInput" id="weightLabel" class="labelInput">
                                    <span class="allLabels">Poids (kg)</span>
                                    <input type="text" id="weightInput" name="weightInput" class="allInputs" placeholder="Poids du client" value="<?= $res['weight'] ?>">
                                    <?=$emptyError3?>
                                </label>
                            </div>
                            <div>
                                <label for="sexeInput" id="sexeLabel" class="labelInput">
                                    <span class="allLabels">Sexe</span>
                                    <select type="text" id="sexeInput" name="sexeInput" class="allInputs" style="width:360px" value="<?= $res['gender'] ?>">
                                        <option value="men">Homme</option>
                                        <option value="woomen">Femme</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="rightSidePatient">
                        <div>
                            <label for="diagInput" id="diagLabel" class="labelInput">
                                <span class="allLabels">Diagnostic</span>
                                <textarea id="diagInput" name="diagInput" class="allInputs" placeholder="Votre diagnostic" cols="30" ress="6" style="height:125px;resize:vertical"></textarea>
                                <?=$emptyError4?>
                            </label>
                        </div>
                        <div>
                            <label for="prescriptionInput" id="prescriptionLabel" class="labelInput">
                                <span class="allLabels">Prescription</span>
                                <textarea id="prescriptionInput" name="prescriptionInput" class="allInputs" placeholder="Votre prescription" cols="30" ress="6" style="height:125px;resize:vertical"></textarea>
                                <?=$emptyError5?>
                            </label>
                        </div>
                    </div>
                </section>
                <div id="buttonContainer">
                    <input type="button" onclick="cancelMeet(<?= $_GET['idm'] ?>)" value="Annuler le rendez-vous" id="cancelSubmitPatient" name="cancelSubmitPatient" class="cancelButton">
                    <input type="submit" value="Enregistrer" name="submitPatient" id="submitPatient" class="submitButton">
                </div>
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </form>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>