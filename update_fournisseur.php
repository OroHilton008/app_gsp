<?php
// Informations de connexion
include 'db_connection.php';

if (isset($_POST['modifier_fournisseur'])) {
    
    // Récupération des données depuis le formulaire
    $Nom_Fournisseur = $_POST['Nom_Fournisseur'];
    $contact_fournisseur = $_POST['contactFournisseur'];
    $email = $_POST['email'];
    $bp_fournisseur = $_POST['bpFournisseur'];
    $localisation = $_POST['locaFournisseur'];
    $id_fournisseur = $_POST['id_fournisseur']; // ID du fournisseur à modifier

    // Requête SQL pour la mise à jour
    $sql = "UPDATE fournisseur SET 
                designation_fourni = ?, 
                contact_fourni = ?, 
                email_fourni = ?, 
                bp_fourni = ?, 
                adresse_fourni = ?
            WHERE code_fourni = ?";

    // Préparer la requête
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("sssssi", $Nom_Fournisseur, $contact_fournisseur, $email, $bp_fournisseur, $localisation, $id_fournisseur);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Vérifier si des lignes ont été affectées (mise à jour réussie)
            if ($stmt->affected_rows > 0) {
                // Redirection après succès
                header("Location: fournisseur.php?success=update");
                exit();
            } else {
                echo "Aucune modification effectuée ou fournisseur non trouvé.";
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
