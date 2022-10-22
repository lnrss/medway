<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medway - La route de votre médecin</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="assets/scripts/jquery-3.6.0.js"></script>
    </head>
    <body>
        <?php
        require_once('assets/templates/header.php')
        ?>
        <main id="homePageContainer">
            <section id="leftPartContainer">
                <div id="presentationTitle">
                    <span id="subTitle">
                        Optimise tes rendez-vous !
                    </span>
                    <h1 id="title">
                        Des rendez-vous en<br/>quelques clicks avec <span id="titleBrandName">Medway</span> <svg id="svgBrandName" width="31" height="28" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30.9932 21.4307L0.446393 27.3648L26.1721 12.6374L30.9932 21.4307Z" fill="#ECBA53"/><path d="M14.1086 3.89205L0.93776 20.4575L8.26759 0.0464992L14.1086 3.89205Z" fill="#ECBA53"/></svg>
                    </h1>
                    <p id="descTitle">
                        Plus de perte de temps grâce à nos services.
                    </p>
                </div>
                <div id="fastSearchContainer">
                    <label id="searchInputLabel" for="searchInput">
                        <input type="text" id="searchInput" placeholder="JJ/MM/AAAA">
                        <input type="button" id="buttonSearchPlanning" value="Chercher un médecin">
                    </label>
                    <a href="getRdv" id="preferSearchDoc">Je choisis mon médecin</a>
                </div>
            </section>
            <section id="rightContainer">
                <img src="assets/img/firstAvatar.png" alt="" id="firstImage" class="floating">
                <img src="assets/img/secondAvatar.png" alt="" id="secondImage" class="floating2">
                <img src="assets/img/lastAvatar.png" alt="" id="lastImage" class="floating3">
            </section>
        </main>
        <script src="assets/scripts/gsap.min.js"></script>
        <script src="assets/scripts/script.js"></script>
        <script>
            gsap.from('#titlePage', { opacity: 0, duration: 2, delay: .5, x: 60 })
            gsap.from('#navContainer', { opacity: 0, duration: 2, delay: .8, x: 25 })
            gsap.from('#subTitle', { opacity: 0, duration: 2, delay: 1, y: 25, ease: 'expo.out', stagger: .2 })

            gsap.from('#title', { opacity: 0, duration: 2, delay: 1.5, y: 25, ease: 'expo.out', stagger: .2 })
            gsap.from('#descTitle', { opacity: 0, duration: 2, delay: 1.8, ease: 'expo.out', stagger: .2 })
            gsap.from('#fastSearchContainer', { opacity: 0, duration: 2, delay: 2.3, y: 25, ease: 'expo.out', stagger: .2 })
            gsap.from('#firstImage', { opacity: 0, duration: 2, delay: 2.5, y: 15, ease: 'expo.out', stagger: .2 })
            gsap.from('#secondImage', { opacity: 0, duration: 2, delay: 2.7, y: 15, ease: 'expo.out', stagger: .2 })
            gsap.from('#lastImage', { opacity: 0, duration: 2, delay: 2.9, y: 15, ease: 'expo.out', stagger: .2 })
        </script>
    </body>
</html>