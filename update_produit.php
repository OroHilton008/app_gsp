<?php
// Informations de connexion
include 'db_connection.php';

if (isset($_POST['modifier_produit'])) {
    
    // Récupération des données depuis le formulaire
    $designation_produit = $_POST['designation_produit'];
    $prix = $_POST['prix'];
    $marque = $_POST['marque'];
    $type = $_POST['type'];
    $Immatriculation = $_POST['Immatriculation'];
    $serie = $_POST['serie'];
    $etat = $_POST['etat'];
    $Type_produit = $_POST['Type_produit'];
    $code_produit = $_POST['code_produit']; // ID du produit à modifier

    // Requête SQL pour la mise à jour
    $sql = "UPDATE produit SET 
                designation_produit = ?, 
                prix_unitaire = ?, 
                marque = ?, 
                type_p = ?, 
                Immatriculation = ?,
                serie = ?, 
                type_p = ?, 
                etat = ?,
                code_type_produit = ?
            WHERE code_fourni = ?";

    // Préparer la requête
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("sdssssssi", $designation_produit, $prix, $marque, $type, $Immatriculation, $serie, $etat, $Type_produit, $code_produit);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Vérifier si des lignes ont été affectées (mise à jour réussie)
            if ($stmt->affected_rows > 0) {
                // Redirection après succès
                header("Location: produit.php?success=update");
                exit();
            } else {
                echo "Aucune modification effectuée ou produit non trouvé.";
            }
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermer la requête préparée
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>
