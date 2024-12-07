<?php
// Informations de connexion
include 'db_connection.php';

if (isset($_POST['modifier_parc'])) {
    
    // Récupération des données depuis le formulaire
    $LocaliteParc = $_POST['LocaliteParc'];
    $LocalisationParc = $_POST['LocalisationParc'];
    $superficieP = $_POST['superficieP'];
    $code_parc = $_POST['code_parc']; // code du parc à modifier

    // Requête SQL pour la mise à jour
    $sql = "UPDATE parc SET 
                localite_parc = ?, 
                localisation_parc = ?, 
                superficie_parc = ?
            WHERE code_parc = ?";

    // Préparer la requête
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("ssdi", $LocaliteParc, $LocalisationParc, $superficieP, $code_parc);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Vérifier si des lignes ont été affectées (mise à jour réussie)
            if ($stmt->affected_rows > 0) {
                // Redirection après succès
                header("Location: parc.php?success=update");
                exit();
            } else {
                echo "Aucune modification effectuée ou parc non trouvé.";
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
