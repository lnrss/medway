<img src="https://zupimages.net/up/22/39/wybl.png" alt="Image de présentation" />

### ✦ Medway - La route de votre médecin 👨‍⚕️

Application médicale qui permet la gestion & prise de rendez-vous.

> **Note**:
L'application a été réalisée dans le cadre d'une épreuve au World Skills 2022 (finale régionale à Bordeaux 🇫🇷)

### ✦ Options supplémentaires implémentés

- Saisie automatique des informations du patient (poids, taille..) lors de la gestion pour le médecin si le patient a déjà eu l'occasion de se faire traiter par le practicien en question.

### ✦ Idée d'amélioration

- Vérification des champs de formulaires (date, caractères renseignés pour le mdp, min 3 caractères..).
- Faire fonctionner les checkboxs pour l'engagement du patient sur la prise de rdv & lors de l'inscription.
- Ajouter des filtres sur la liste de rdv du docteur.
- Faire fonctionner le compteur de page & le bouton ajout manuel d'un patient sur la page liste des patients.

### ✦ Technologies utilisées

ɢʀᴀᴘʜɪsᴍᴇ ﹠ ᴍᴏᴛɪᴏɴ ᴅᴇsɪɢɴ ↓<br/>
`Illustrator / Figma`<br/>
`After Effects`<br/>

ᴅᴇ́ᴠᴇʟᴏᴘᴘᴇᴍᴇɴᴛ ғʀᴏɴᴛ﹣ᴇɴᴅ ﹠ ʙᴀᴄᴋ﹣ᴇɴᴅ ↓<br/>
`HTML5 / CSS3 / JavaScript`<br/>
`PHP`<br/>
`MySQL`<br/>

### ✦ Documentation

Afin de pouvoir mettre en place le site "Medway" sur sa machine il est necessaire de réaliser plusieurs étapes cités ci-dessous.

1. Télécharger le logiciel Mamp afin de pouvoir utiliser son ordinateur commee serveur local.
Une fois le logiciel installé, l'application puis cliquer sur "Start".

2. Accedez au répertoire >* application/MAMP/htdocs/ * puis coller le répertoire contenant l'intégralité du code disponible en téléchargement sur ce repository.

3. Coller le script .sql disponible à partir du repertoire "sql" de ce repository dans votre Phpmyadmin >* (http://localhost:8888/phpMyAdmin5/) * à l'aide de l'option "Nouvelle base de donnéees" -> "Importer".

4. Accéder au site à l'aide de l'URL >* (http://localhost:8888/medway/) *.

> **Warning**:
> Vérifiez bien que la version PHP est en 8.0.8

### ✦ Schéma de la base de donnée MySQL

|    Schéma de la base de donnée     |
| ------|
| user(#idUser INT, firstname VARCHAR(255), lastname VARCHAR(255), login VARCHAR(255), password VARCHAR(255), birthday DATE, size INT, weight INT, gender VARCHAR(50), role INT)  |
| meet(#idMeet INT, date DATE, hour TIME, <ins>idUser INT</ins>, reason VARCHAR(255), checkByDoctor TINYINT) |
| diagnotic(#idDiagnostic INT, <ins>idUser INT</ins>, description VARCHAR(255), prescription VARCHAR(255)) |

> **Note**:
La base de donnée est en Inno DB

https://user-images.githubusercontent.com/60849907/197188581-21663556-937a-4fff-9a2f-d0c79c47e70a.mp4
