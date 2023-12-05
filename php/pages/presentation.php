<?php
require_once './php/connexion.php';
?>

<h2> Présentation </h2>
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
            <th>entretien prevu</th>
        </thead>
        <tbody>
            <?php
                require 'php/connexion.php';
                $selectString = "SELECT * FROM vehicule ";
                $queryArrayVehicule =  $connexion -> query($selectString);
                $arrayVehicule = $queryArrayVehicule -> fetchAll();
                foreach($arrayVehicule as $vehicule){
                    echo '<tr>';
                    echo '<td>' . $vehicule["IMMATRICULATION"] . '</td>';
                    echo '<td>' . $vehicule["MODELE"] . '</td>';
                    echo '<td>' . $vehicule["COULEUR"] . '</td>';
                    echo '<td>' . $vehicule["MARQUE"] . '</td>';
                    echo '<td>' . $vehicule["TYPE_CARBURANT"] . '</td>';
                    echo '<td>' . $vehicule["KILOMETRAGE_TOTAL"] . '</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '</td>';
                echo '</tr>';
                }
            ?>

        </tbody>
    </table>

</div>