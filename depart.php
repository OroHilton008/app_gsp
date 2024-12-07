<?php
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['code_type_admin'])) {
    // Redirige vers la page de connexion si non connecté
    header("Location: connexion.php");
    exit();
}

// Récupération du rôle de l'utilisateur
$code_type_admin = $_SESSION['code_type_admin'];
$nom_utilisateur = isset($_SESSION['nom_prenom_admin']) ? $_SESSION['nom_prenom_admin'] : 'Utilisateur inconnu';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Stocks - Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center bg-light p-3">
    <div>
    <strong>
        <?php 
        if ($code_type_admin == 1) {
            echo 'Admin General : ' . $nom_utilisateur;
        } elseif ($code_type_admin == 2) {
            echo 'Admin Centrale : ' . $nom_utilisateur;   
        } elseif ($code_type_admin == 3) {
            echo 'Admin Parc : ' . $nom_utilisateur;   
        } else {
            echo 'Admin Parc : ' . $nom_utilisateur;   
        } 
        ?>
    </strong>
</div>

        
        <div>
            <a href="deconnexion.php" class="btn btn-danger btn-sm">
                Déconnexion
            </a>
        </div>
    </div>

        <h1 class="text-center mb-4">Application de Gestion des Stocks</h1>
        <p class="text-center">Choisissez une catégorie pour commencer :</p>
        <div class="row mt-3">
            <!-- Gestion des Commandes -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-5">
    <!-- Gestion des Commandes -->
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Gestion des Commandes</h5>
                <p class="card-text">Passez et suivez les commandes entre la centrale et les parcs.</p>
                <a href="gestion_commandes.php" class="btn btn-primary">Gérer les Commandes</a>
            </div>
        </div>
    </div>

    <!-- Gestion des Livraisons -->
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Gestion des Livraisons</h5>
                <p class="card-text">Gérez les livraisons des commandes vers les parcs ou entre parcs.</p>
                <a href="gestion_livraisons.php" class="btn btn-secondary">Gérer les Livraisons</a>
            </div>
        </div>
    </div>

    <!-- Fournisseurs (visible pour admin général et admin centrale) -->
    <?php if ($code_type_admin == 1 || $code_type_admin == 2): ?>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Fournisseurs</h5>
                <p class="card-text">Gérez les informations des fournisseurs.</p>
                <a href="fournisseur.php" class="btn btn-success">Gérer les Fournisseurs</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Matériels -->
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Produit</h5>
                <p class="card-text">Ajoutez ou mettez à jour les Produits disponibles.</p>
                <a href="produit.php" class="btn btn-warning">Gérer les Produits</a>
            </div>
        </div>
    </div>

    <!-- Type Produit -->
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Type Produit</h5>
                <p class="card-text">Ajoutez ou mettez le type des produits</p>
                <a href="type_produit.php" class="btn btn-info">Gérer le type des produits</a>
            </div>
        </div>
    </div>

    <!-- Parcs (visible uniquement pour admin général) -->
    <?php if ($code_type_admin == 1): ?>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Parcs</h5>
                <p class="card-text">Gérez les informations des parcs.</p>
                <a href="parcs.php" class="btn btn-dark">Gérer les Parcs</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Centrale (visible uniquement pour admin général) -->
    <?php if ($code_type_admin == 1): ?>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Centrale</h5>
                <p class="card-text">Mettez à jour les informations de la centrale.</p>
                <a href="centrale.php" class="btn btn-danger">Gérer la Centrale</a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
