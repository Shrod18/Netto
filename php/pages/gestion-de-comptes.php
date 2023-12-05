<h2> Gestion de comptes </h2>
<div class="tableau-container">
    <?php
    require_once './php/connexion.php';

    $sql_all = "SELECT * FROM utilisateur";
    $recup_users = $connexion->prepare($sql_all);
    $recup_users->execute();
    ?>
    <form action="" method="POST">
        <div>
            <label for="delete_user">supprimer un utilisateur a partir de son ID</label>
            <input type="text" name="delete_user" >
            <input type="submit" value="valider"></div>
    </form>

    <?php
    if(isset($_POST['delete_user'])){
        $int_value = ctype_digit($_POST['delete_user']) ? intval($_POST['delete_user']) : null;
        if ($int_value === null){
            echo "veuillez renseigner un nombre";
        }else {
            $select_user = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = :ID_UTILISATEUR";
            $rep_select_user = $connexion -> prepare($select_user);
            $rep_select_user -> execute(['ID_UTILISATEUR' => $int_value]);

            if($rep_select_user->fetch()){
                $delete_user = "DELETE from utilisateur WHERE ID_UTILISATEUR = ? ";
                $rep_delete_user = $connexion -> prepare($delete_user);
                $rep_delete_user -> execute([$int_value]);
            }else{
                echo "ID non affilié à un compte";
            }
        }
    }


    // Affichage des résultats
    echo "<table>";
    echo "<tr><th>ID_Utilisateur</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Mot de passe</th></tr>";
    while ($row = $recup_users->fetch()) {
        echo "
        <tr>
            
            <td>"  
                .$row['ID_UTILISATEUR']
            ."</td>
            <td>"
                .$row['NOM']
            ."</td>
            <td>" 
                .$row['PRENOM']
            ."</td>
            <td>" 
                .$row['EMAIL']  
            ."</td>
            <td>" 
                . $row['MDP'] . "
            </td>
        </tr>";
    }
    echo "</table>";
    ?>
</div>