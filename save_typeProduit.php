<?php
include 'db_connection.php'; 

if (isset($_POST['enregistrer'])) {
    
    $typeProduit = $_POST['NomtypeProduit'];

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO type_produit (code_type_produit , nom_type_produit) 
            VALUES ('','$typeProduit')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement réussi !";
        header("Location: type_produit.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
