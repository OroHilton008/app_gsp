<?php
include 'db_connection.php'; 

if (isset($_POST['enregistrer'])) {
    
    $LocaliteCentrale = $_POST['LocaliteCentrale'];
    $LocalisationCentrale = $_POST['LocalisationCentrale'];
    $superficie = $_POST['superficie'];

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO centrale (code_centrale, localite_centrale, localisation_centrale, superficie_centrale) 
            VALUES ('','$LocaliteCentrale', '$LocalisationCentrale' ,'$superficie')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement réussi !";
        header("Location: centrale.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
