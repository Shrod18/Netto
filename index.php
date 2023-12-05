<?php
session_start();
$uri = $_SERVER['REQUEST_URI'];

if ($uri != "/" & !isset($_SESSION['isConnect'])) {
    header("Location: /");
} else if (($uri == "/" || $uri == "/login") & isset($_SESSION['isConnect'])) {
    header("Location: /presentation");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">

    <?=
        // montrer l'aside seulement si on est sur la page d'authentification
        $uri == '/' || $uri == '/login'
        ? '<link rel="stylesheet" href="css/main-without-aside.css">'
        : '<link rel="stylesheet" href="css/main-with-aside.css">
        <link rel="stylesheet" href="css/aside.css">';
    ?>
    <?=
        // url acceptant le style des tableaux
        $uri == '/presentation' ||
        $uri == '/gerer-vehicules' ||
        $uri == '/entretien-vehicules' ||
        $uri == "/historique-des-entretiens" ||
        $uri == "/gestion-de-comptes"
        ? '<link rel="stylesheet" href="css/tableau.css">'
        : "";

    ?>

</head>

<body>
    <header>
        <?php require 'php\header.php'; ?>
    </header>
    <!-- aside seulement si on est pas sur authentification -->
    <?php
    $uri != '/' && require 'php\aside.php'; // ne pas afficher aside sur racine
    ?>
    <main>
        <div class="content">
            <?php
            // rooter
            switch (substr($uri, 1)) { //substr sert a enlever le '/' de la chaine de caractere
                case '':
                    require 'php\pages\authentification.php';
                    break;
                case 'logout':
                    require 'php\logout.php';
                    break;
                case 'login':
                    require 'php\pages\authentification.php';
                    break;
                case 'gerer-vehicules':
                    require 'php\pages\gerer-vehicules.php';
                    break;
                case 'entretien-vehicules':
                    require 'php\pages\entretien-vehicules.php';
                    break;
                case 'historique-des-entretiens':
                    require 'php\pages\historique-des-entretiens.php';
                    break;
                case 'creation-de-comptes':
                    require 'php\pages\creation-de-comptes.php';
                    break;
                case 'gestion-de-comptes':
                    require 'php\pages\gestion-de-comptes.php';
                    break;
                case 'presentation':
                    require 'php\pages\presentation.php';
                    break;
                default:
                    echo "<h1>Pages non trouvées :/ </h1>";
                    break;
            }
            ?>
        </div>
    </main>

</body>

</html>