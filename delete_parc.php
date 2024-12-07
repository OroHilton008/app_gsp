<?php
// Inclure la connexion à la base de données
include 'db_connection.php';

// Vérifier si l'ID du fournisseur est fourni
if (isset($_POST['code_parc'])) {
    $code_parc = intval($_POST['code_parc']);

    // Préparer la requête SQL pour supprimer le fournisseur
    $sql = "DELETE FROM parc WHERE code_parc = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $code_parc);

    if ($stmt->execute()) {
        // Rediriger vers la page principale avec un message de succès
        header("Location: parc.php?success=parc supprimé avec succès");
        exit();
    } else {
        // Gérer les erreurs
        header("Location: parc.php?error=Erreur lors de la suppression du du parc");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Rediriger si aucune donnée n'est envoyée
    header("Location: parc.php?error=Aucune donnée reçue");
    exit();
}
?>
