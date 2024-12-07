<?php
// Inclure la connexion à la base de données
include 'db_connection.php';

// Vérifier si l'ID du fournisseur est fourni
if (isset($_POST['code_centrale'])) {
    $code_centrale = intval($_POST['code_centrale']);

    // Préparer la requête SQL pour supprimer le fournisseur
    $sql = "DELETE FROM centrale WHERE code_centrale = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $code_centrale);

    if ($stmt->execute()) {
        // Rediriger vers la page principale avec un message de succès
        header("Location: centrale.php?success=centrale supprimé avec succès");
        exit();
    } else {
        // Gérer les erreurs
        header("Location: centrale.php?error=Erreur lors de la suppression du dela centrale");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Rediriger si aucune donnée n'est envoyée
    header("Location: centrale.php?error=Aucune donnée reçue");
    exit();
}
?>
