<?php
include 'db_connection.php'; 

if (isset($_POST['enregistrer'])) {
    
    $nomFournisseur = $_POST['NomFournisseur'];
    $contactFournisseur = $_POST['contactFournisseur'];
    $email = $_POST['email'];
    $bpFournisseur = $_POST['bpFournisseur'];
    $locaFournisseur = $_POST['locaFournisseur'];

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO fournisseur (code_fourni, designation_fourni, contact_fourni, email_fourni, bp_fourni, adresse_fourni) 
            VALUES ('','$nomFournisseur', '$contactFournisseur' ,'$email', '$bpFournisseur', '$locaFournisseur')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement réussi !";
        header("Location: fournisseur.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
