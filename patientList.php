<?php
session_start();
include('assets/constantes.php');
$listClients = $connection->query("SELECT m.*, u.* FROM meet m INNER JOIN user u ON m.idUser = u.idUser WHERE loginDoctor = '".$_SESSION["login"]."' AND checkByDoctor = false ORDER BY m.date AND m.hour LIMIT 9");
$clients = $listClients->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medway - Liste des patients</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="assets/scripts/jquery-3.6.0.js"></script>

    </head>
    <body>
        <?php
        require_once('assets/templates/header.php')
        ?>
        <main id="patientListPageContainer">
            <section id="registerContainer">
                <div id="topPatientListContainer">
                    <h3 id="titlePagePatientList">
                        Prendre en charge un patient
                    </h3>
                    <div class="rightSidePatientListContainer">
                        <div id="countPageNumberContainer">
                            <span id="countPageNumber">0 - 9</span> sur 427
                        </div>
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 20px"><path d="M6.73232 0.264139C6.90372 0.433317 7 0.662742 7 0.901961C7 1.14118 6.90372 1.37061 6.73232 1.53978L2.2068 6.00545L6.73232 10.4711C6.89886 10.6413 6.99101 10.8691 6.98893 11.1057C6.98684 11.3422 6.89069 11.5685 6.72118 11.7358C6.55168 11.903 6.32237 11.9979 6.08266 12C5.84295 12.002 5.612 11.9111 5.43958 11.7468L0.267679 6.64327C0.0962845 6.47409 1.02371e-07 6.24467 1.02371e-07 6.00545C1.02371e-07 5.76623 0.0962845 5.5368 0.267679 5.36762L5.43958 0.264139C5.61102 0.0950107 5.84352 0 6.08595 0C6.32837 0 6.56087 0.0950107 6.73232 0.264139V0.264139Z" fill="white"/></svg>
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 20px"><path d="M0.267679 0.264138C0.0962844 0.433317 0 0.662742 0 0.901961C0 1.14118 0.0962844 1.37061 0.267679 1.53978L4.7932 6.00545L0.267679 10.4711C0.101142 10.6413 0.00899045 10.8691 0.0110735 11.1057C0.0131565 11.3422 0.109307 11.5685 0.278816 11.7358C0.448325 11.903 0.677629 11.9979 0.917342 12C1.15705 12.002 1.388 11.9111 1.56042 11.7468L6.73232 6.64327C6.90372 6.47409 7 6.24467 7 6.00545C7 5.76623 6.90372 5.5368 6.73232 5.36762L1.56042 0.264138C1.38898 0.0950107 1.15648 0 0.914052 0C0.671626 0 0.439126 0.0950107 0.267679 0.264138Z" fill="white"/></svg>
                        <input type="button" value="Ajouter un patient" id="addPatientButton">
                    </div>
                </div>
                <div id="arrayTitleContainer">
                    <span id="titlePatient">Patient</span>
                    <span id="dateCreation">Date</span>
                    <span id="hourCreation">Heure</span>
                </div>
                <?php foreach($clients as $val){
                        if(isset($val)): ?>
                        <div class="lineContainer">
                            <span class="patientName">
                                <?= $val['lastname'].' '. $val['firstname']?>
                            </span>
                            <span class="patientDate">
                                <?= $val['date'] ?>
                            </span>
                            <span class="patientHour">
                                <?= $val['hour'] ?>
                            </span>
                            <a href="patient.php?id=<?= $val['idUser'] ?>&idm=<?= $val['idMeet'] ?>" class="patientButton">Prendre en charge</a>
                        </div>
                    <?php 
                    endif;
                } ?>     
                <div id="countPageNumberBottomContainer">
                <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 12px;cursor:pointer"><path d="M6.73232 0.264139C6.90372 0.433317 7 0.662742 7 0.901961C7 1.14118 6.90372 1.37061 6.73232 1.53978L2.2068 6.00545L6.73232 10.4711C6.89886 10.6413 6.99101 10.8691 6.98893 11.1057C6.98684 11.3422 6.89069 11.5685 6.72118 11.7358C6.55168 11.903 6.32237 11.9979 6.08266 12C5.84295 12.002 5.612 11.9111 5.43958 11.7468L0.267679 6.64327C0.0962845 6.47409 1.02371e-07 6.24467 1.02371e-07 6.00545C1.02371e-07 5.76623 0.0962845 5.5368 0.267679 5.36762L5.43958 0.264139C5.61102 0.0950107 5.84352 0 6.08595 0C6.32837 0 6.56087 0.0950107 6.73232 0.264139V0.264139Z" fill="white"/></svg>
                <span class="countPageNumberBottom activePage">1</span>
                <span class="countPageNumberBottom">2</span>
                <span class="countPageNumberBottom">3</span>
                <span class="countPageNumberBottom">4</span>
                <span class="countPageNumberBottom">5</span>
                <span class="countPageNumberBottom">6</span>
                <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 6px;cursor:pointer"><path d="M0.267679 0.264138C0.0962844 0.433317 0 0.662742 0 0.901961C0 1.14118 0.0962844 1.37061 0.267679 1.53978L4.7932 6.00545L0.267679 10.4711C0.101142 10.6413 0.00899045 10.8691 0.0110735 11.1057C0.0131565 11.3422 0.109307 11.5685 0.278816 11.7358C0.448325 11.903 0.677629 11.9979 0.917342 12C1.15705 12.002 1.388 11.9111 1.56042 11.7468L6.73232 6.64327C6.90372 6.47409 7 6.24467 7 6.00545C7 5.76623 6.90372 5.5368 6.73232 5.36762L1.56042 0.264138C1.38898 0.0950107 1.15648 0 0.914052 0C0.671626 0 0.439126 0.0950107 0.267679 0.264138Z" fill="white"/></svg>
                </div>
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
    </body>
</html>