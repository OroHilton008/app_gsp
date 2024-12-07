<?php
include 'db_connection.php'; 

if (isset($_POST['enregistrer'])) {
    
    $designation_produit = $_POST['designation_produit'];
    $prix = $_POST['prix'];
    $marque = $_POST['marque'];
    $type = $_POST['type'];
    $Immatriculation = $_POST['Immatriculation'];
    $serie = $_POST['serie'];
    $etat = $_POST['etat'];
    $Type_produit = $_POST['Type_produit'];
    // Requête SQL pour insérer les données
    $sql = "INSERT INTO produit (code_produit, designation_produit, prix_unitaire, marque, type_p, Immatriculation, serie, etat, code_type_produit) 
            VALUES ('','$designation_produit', '$prix' ,'$marque', '$type', '$Immatriculation','$serie', '$etat', '$Type_produit')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement réussi !";
        header("Location: produit.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
