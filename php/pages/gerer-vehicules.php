<h2>gerer vehicule</h2>
<?php
    if(
        isset($_POST['immatriculation']) &
        isset($_POST['modele']) &
        isset($_POST['couleur']) &
        isset($_POST['marque']) &
        isset($_POST['type_carburant']) &
        isset($_POST['kilometrage_total'])
    ){
        require 'php/connexion.php';
        echo "tout est bon";
        $immatriculation = $_POST['immatriculation'];
        $modele = $_POST['modele'];
        $couleur = $_POST['couleur'];
        $marque = $_POST['marque'];
        $type_carburant = $_POST['type_carburant'];
        $kilometrage_total = $_POST['kilometrage_total'];
        $kilometrage_depuis_entretien = $_POST['kilometrage_depuis_entretien'];

        $insertVehiculeSql = "INSERT INTO vehicule (MODELE, MARQUE, COULEUR, IMMATRICULATION, TYPE_CARBURANT, KILOMETRAGE_TOTAL) VALUES ( ?, ?, ?, ?, ?, ?)";
        $insertVehicule = $connexion -> prepare($insertVehiculeSql);
        $insertVehicule -> execute([$modele, $marque, $couleur, $immatriculation, $type_carburant, intval($kilometrage_total)]);


    }else {
        echo "il manque un champ";
    }
    var_dump($_POST);
?>
<div class="tableau-container">
    <table>
        <thead>
            <th>Immatriculation</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Marque</th>
            <th>Type de carburant</th>
            <th>Kilométrage total</th>
            <th>Kilométrage depuis dernier entretien</th>
            <th>Suppression</th>
        </thead>
        <tbody>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td><input type="checkbox" name="" id=""></td>
            </tr>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td><input type="checkbox" name="" id=""></td>
            </tr>

        </tbody>
    </table>
</div>
    <fieldset class="gerer-vehicule form">
    <form action="" method="POST">
        <!-- //gerer vehicule -->
        <div><label for="immatriculation">immatriculation</label><input name="immatriculation" type="text"></div>
        <div><label for="modele">Modèle</label><input name="modele" type="text"></div>
        <div><label for="couleur">Couleur</label>d<input name="couleur" type="text"></div>
        <div><label for="marque">Marque</label><input name="marque" type="text"></div>
        <div><label for="type_carburant">Type de carburant</label><input name="type_carburant" type="text"></div>
        <div><label for="kilometrage_total">Kilométrage total</label><input name="kilometrage_total" type="number"></div>
        <div><label for="kilometrage_depuis_entretien">Kilométrage depuis dernier entretien</label><input name="kilometrage_depuis_entretien" type="number"></div>
        <div><input type="submit" value="ajouter" name="creer_vehicule"></div>
    </form>
</fieldset>