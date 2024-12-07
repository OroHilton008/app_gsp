<?php
// Informations de connexion
include 'db_connection.php';

if (isset($_POST['modifier_type_produit'])) {
    
    // Récupération des données depuis le formulaire
    $code_type_produit = $_POST['code_type_produit'];
    $nom_type_produit = $_POST['nom_type_produit']; // code du type produit à modifier

    // Requête SQL pour la mise à jour
    $sql = "UPDATE type_produit SET 
                  nom_type_produit = ?, 
            WHERE code_type_produit  = ?";

    // Préparer la requête
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("si", $nom_type_produit, $code_type_produit);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Vérifier si des lignes ont été affectées (mise à jour réussie)
            if ($stmt->affected_rows > 0) {
                // Redirection après succès
                header("Location: type_produit.php?success=update");
                exit();
            } else {
                echo "Aucune modification effectuée ou type produit non trouvé.";
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
