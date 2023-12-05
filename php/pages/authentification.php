<?php
$uri = $_SERVER['REQUEST_URI'];
// est-ce que la requête contient des valeurs dans $_POST ?
// autrement dit : est-ce que cette requête priovient du formulaire ?

if (!empty($_POST)) {

    // est-ce qu'il manque une des informations attendues ?
    if (empty($_POST['email']) || empty($_POST['password'])) {

        echo '<p>Il manque le mot de passe ou l\'email...</p>';

    } else { // ok, on a tout ce qu'il faut...
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        checkBdd($email, $password);

    }
} // fin du : if (!empty($_POST))

function checkBdd($email, $password)
{

    // bloc try..catch obligatoire pour traiter les erreurs provenant de Mysql
    try {
        require_once './php/connexion.php'; // copnnexion a la base de données
        $sql_connect = "SELECT * FROM utilisateur WHERE email = :email AND mdp = :mot_de_passe ;";
        $login = $connexion->prepare($sql_connect);
        $login->execute([
            'email' => $email,
            'mot_de_passe' => $password, // Utiliser 'mot_de_passe' au lieu de 'password'
        ]);
        if ($login->rowCount() > 0) { // Vérifier si la requête a renvoyé une ligne
            session_start();
            $_SESSION['isConnect'] = $login->rowCount() > 0; //compter lignes
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            // $_SESSION['connection'] = $connexion;
            header("Location: /presentation");

        } else {
            echo "<h1>Login incorrect</h1>"; // Ajouter la fermeture de la balise h1
        }
    } catch (PDOException $e) { // gestion des exceptions

        echo 'Erreur PDO : ' . $e->getCode() . '<br>';
        echo 'Erreur PDO : ' . $e->getMessage() . '<br>';
        // en s'appyant sur $e->getCode(), on peut personnaliser le message d'erreur

    } // fin du catch

} // fin du : if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']))

?>

<fieldset class="authentification">
    <form action='/login' method="POST">
        <h2>Connexion</h2>

        <input type="email" placeholder="email..." name="email" required>
        <input type="password" placeholder="Mot de passe..." name="password" required>
        <input type="submit" value="Se connecter" name="connect">
    </form>
</fieldset>