<?php
include 'db_connection.php'; 

if (isset($_POST['enregistrer'])) {
    
    $LocaliteParc = $_POST['LocaliteParc'];
    $LocalisationParc = $_POST['LocalisationParc'];
    $superficieP = $_POST['superficieP'];

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO parc (code_parc, localite_parc, localisation_parc, superficie_parc) 
            VALUES ('','$LocaliteParc', '$LocalisationParc' ,'$superficieP')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement réussi !";
        header("Location: parc.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
