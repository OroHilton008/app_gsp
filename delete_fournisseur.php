<?php
// Inclure la connexion à la base de données
include 'db_connection.php';

// Vérifier si l'ID du fournisseur est fourni
if (isset($_POST['id_fournisseur'])) {
    $id_fournisseur = intval($_POST['id_fournisseur']);

    // Préparer la requête SQL pour supprimer le fournisseur
    $sql = "DELETE FROM fournisseur WHERE code_fourni = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_fournisseur);

    if ($stmt->execute()) {
        // Rediriger vers la page principale avec un message de succès
        header("Location: fournisseur.php?success=Fournisseur supprimé avec succès");
        exit();
    } else {
        // Gérer les erreurs
        header("Location: fournisseur.php?error=Erreur lors de la suppression du fournisseur");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Rediriger si aucune donnée n'est envoyée
    header("Location: fournisseur.php?error=Aucune donnée reçue");
    exit();
}
?>
