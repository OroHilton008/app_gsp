<?php
// Inclure la connexion à la base de données
include 'db_connection.php';

// Vérifier si l'ID du fournisseur est fourni
if (isset($_POST['code_produit'])) {
    $code_produit = intval($_POST['code_produit']);

    // Préparer la requête SQL pour supprimer le fournisseur
    $sql = "DELETE FROM produit WHERE code_produit = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $code_produit);

    if ($stmt->execute()) {
        // Rediriger vers la page principale avec un message de succès
        header("Location: produit.php?success=produit supprimé avec succès");
        exit();
    } else {
        // Gérer les erreurs
        header("Location: produit.php?error=Erreur lors de la suppression du produit");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Rediriger si aucune donnée n'est envoyée
    header("Location: produit.php?error=Aucune donnée reçue");
    exit();
}
?>
