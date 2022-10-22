<?php
session_start();
include('assets/constantes.php');
global $emptyError1;

if(isset($_POST["loginSubmit"])) {
    $hour = htmlspecialchars($_POST["hourInput"]);
    $doctor = htmlspecialchars($_POST["doctorInput"]);
    $date = htmlspecialchars($_POST["dateInput"]);
    $reason = htmlspecialchars($_POST["reasonInput"]);
    $qw=$connection->prepare("SELECT u.*, m.* FROM user u INNER JOIN meet m ON u.idUser = m.idUser WHERE u.login=?");
    $qw->execute(array($doctor));
    $res=$qw->fetch();
    // if(strtotime($res['date']) == strtotime($date) && !strtotime($res['hour']) >= strtotime($hour) + 1800){
    //     $emptyError1 = '<div class="errorInput">
    //                         Le rendez-vous n\'est pas disponible, essayez une autre heure.
    //                     </div>';
    // } else{
        $qw = $connection->prepare("INSERT into meet(date, hour, idUser, loginDoctor, reason) values(?,?,?,?,?)");
        $qw->execute(array($date, $hour, $_SESSION["id"], $doctor, $reason));
    // }
    }

$docOption = $connection->query("SELECT * FROM user WHERE role = 2");
$doc = $docOption->fetchAll(PDO::FETCH_ASSOC);
?>
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
                <form method="POST" action="" id="inputsContainer">
                    <div>
                        <label for="hourInput" id="hourLabel" class="labelInput">
                            <span class="allLabels">Heure*</span>
                            <input type="time" id="hourInput" name="hourInput" class="allInputs" placeholder="hh/mm">
                            <?= $emptyError1 ?>
                        </label>
                    </div>
                    <div>
                        <label for="doctorInput" id="doctorLabel" class="labelInput">
                            <span class="allLabels">Médecin*</span>
                            <select type="text" id="doctorInput" name="doctorInput" class="allInputs" style="width:360px">
                                <?php foreach($doc as $val){
                                    if(isset($val)): ?>
                                        <option selected value="<?= $val['login'] ?>"> <?= $val['lastname'].' '.$val['firstname'] ?> </option>
                                    <?php 
                                    endif;
                                } ?>
                            </select>
                        </label>
                    </div>
                    <div>
                        <label for="dateInput" id="dateLabel" class="labelInput">
                            <span class="allLabels">Date*</span>
                            <input type="date" id="dateInput" name="dateInput" class="allInputs" placeholder="Votre identifiant">
                        </label>
                    </div>
                    <div>
                        <label for="hourInput" id="hourLabel" class="labelInput">
                            <span class="allLabels">Raison*</span>
                            <textarea id="reasonInput" name="reasonInput" class="allInputs" placeholder="Votre raison du rendez-vous" cols="30" rows="6"></textarea>
                        </label>
                    </div>
                    <div id="consentCGV">
                        <label for="checkboxCGV">
                            <input type="checkbox" id="checkboxCGV" name="checkboxCGV">
                            <span id="descCGV">Je consent mon engagement</span>
                        </label>
                    </div>
                    <input type="submit" value="Je prend rendez-vous" id="loginSubmit" name="loginSubmit">
                </form>
                
                <img src="assets/img/avatarLogin.png" alt="Image de l'égerie de Medway" id="avatarLogin">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>