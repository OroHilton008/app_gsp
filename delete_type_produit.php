<?php
// Inclure la connexion à la base de données
include 'db_connection.php';

// Vérifier si l'ID du fournisseur est fourni
if (isset($_POST['code_type_produit'])) {
    $code_type_produit = intval($_POST['code_type_produit']);

    // Préparer la requête SQL pour supprimer le fournisseur
    $sql = "DELETE FROM type_produit WHERE code_type_produit  = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $code_type_produit);

    if ($stmt->execute()) {
        // Rediriger vers la page principale avec un message de succès
        header("Location: type_produit.php?success=type produit supprimé avec succès");
        exit();
    } else {
        // Gérer les erreurs
        header("Location: type_produit.php?error=Erreur lors de la suppression du dtype produit");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Rediriger si aucune donnée n'est envoyée
    header("Location: type_produit.php?error=Aucune donnée reçue");
    exit();
}
?>
