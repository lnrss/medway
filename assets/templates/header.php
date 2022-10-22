<?php
$_SESSION["role"] = isset($_SESSION["role"]) ? $_SESSION["role"] : null;
?>
<header>
    <a href="/medway" id="titlePage">Medway</a>
    <nav id="navContainer">
        <?= $_SESSION["role"] == 1 && isset($_SESSION["role"]) ? '<a href="getRdv.php" class="navItems">Prendre rendez-vous' : null; ?></a>
        <?= $_SESSION["role"] == 2 && isset($_SESSION["role"]) ? '<a href="patientList.php" class="navItems">Recevoir un patient' : null; ?></a>
        <?= !isset($_SESSION["role"]) ? '<a href="login.php" class="navItems">Se Connecter' : null; ?></a>
        <?= !isset($_SESSION["role"]) ? '<a href="register.php" class="navItems">S\'inscrire' : '<a href="logout.php" class="navItems">Se déconnecter'; ?></a>
    </nav>
</header>