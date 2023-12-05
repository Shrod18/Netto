<?php
    require "php/connexion.php";
    if(
        !empty($_POST["nom"]) &
        !empty($_POST["prenom"]) &
        !empty($_POST["email"]) & 
        !empty($_POST["password"]) &
        !empty($_POST["confirm-password"])
    ){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if(($_POST["password"] == $_POST["confirm-password"])){

            //verifier si il existe deja un utilisateur avec ces identifiants
            $sql_connect = "SELECT * FROM utilisateur WHERE email = :email";
            $login = $connexion->prepare($sql_connect);
            $login->execute([
                'email' => $email,
            ]);
            if ($login->rowCount() > 0) { // Vérifier si la requête a renvoyé une ligne
                echo "<span>un utilisateur avec cet email est déjà renseigné</span>";
                
            } else {
                $insertSql = "INSERT INTO utilisateur (NOM, PRENOM, EMAIL, MDP) VALUES (?, ?, ?, ?)";
                $insertUser = $connexion -> prepare($insertSql);
                $insertUser -> execute([$nom, $prenom, $email, $password]);
                
                echo "utilisateur ajouté";
            }
        
        
        
        }
    }else{
        echo "il manque un élément ou alors les mots de passes ne sont pas les mêmes";
    }
?>
<h1>creation des comptes</h1>
<fieldset class="creation-compte form">
    <form action="" method="POST">
        <!-- //formulaire creation de compte -->
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="name" name="nom">
        </div>
        <div>
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="confirm-password">Mot de passe</label>
            <input type="password" id="password" name="confirm-password" />
        </div>
        <div>
        <input type="submit" value="creer un compte" name="creer-compte">
        </div>
    </form>
</fieldset>