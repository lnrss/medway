<?php
session_start();
include('../constantes.php');

$idMeet = $_POST["idMeet"];

$qw= $connection->prepare("DELETE FROM meet WHERE idMeet=?");
if($qw->execute(array($idMeet))){
    echo true;
}