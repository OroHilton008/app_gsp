<?php
// Informations de connexion
include 'db_connection.php';

if (isset($_POST['modifier_centrale'])) {
    
    // Récupération des données depuis le formulaire
    $LocaliteCentrale = $_POST['LocaliteCentrale'];
    $LocalisationCentrale = $_POST['LocalisationCentrale'];
    $superficie = $_POST['superficie'];
    $code_centrale = $_POST['code_centrale']; // code de la centrale à modifier

    // Requête SQL pour la mise à jour
    $sql = "UPDATE centrale SET 
                localite_centrale = ?, 
                localisation_centrale = ?, 
                superficie_centrale = ?
            WHERE code_centrale = ?";

    // Préparer la requête
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("ssdi", $LocaliteCentrale, $LocalisationCentrale, $superficie, $code_centrale);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Vérifier si des lignes ont été affectées (mise à jour réussie)
            if ($stmt->affected_rows > 0) {
                // Redirection après succès
                header("Location: centrale.php?success=update");
                exit();
            } else {
                echo "Aucune modification effectuée ou centrale non trouvée.";
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
