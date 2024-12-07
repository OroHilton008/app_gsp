<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Stocks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion des Stocks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Stocks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <div class="container mt-5">
        <h1 class="text-center">Bienvenue dans l'application de gestion des stocks</h1>
        <div class="row mt-4">
            <!-- Passer une commande à un fournisseur -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Commande Fournisseur</h5>
                        <p class="card-text">Gérez les commandes de la centrale vers les fournisseurs.</p>
                        <a href="commande_fournisseur.php" class="btn btn-primary">Gérer les commandes</a>
                    </div>
                </div>
            </div>
            <!-- Passer une commande à la centrale -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Commande Parc</h5>
                        <p class="card-text">Gérez les commandes des parcs vers la centrale.</p>
                        <a href="commande_centrale.php" class="btn btn-primary">Gérer les commandes</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Détails des Commandes -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center">Détails des Commandes</h2>
                <table class="table table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Type de Commande</th>
                            <th>Origine</th>
                            <th>Destination</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemple de commande -->
                        <tr>
                            <td>1</td>
                            <td>Fournisseur</td>
                            <td>Centrale</td>
                            <td>Fournisseur A</td>
                            <td>2024-11-15</td>
                            <td>
                                <a href="details_commande.php?id=1" class="btn btn-info btn-sm">Voir Détails</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Parc</td>
                            <td>Parc B</td>
                            <td>Centrale</td>
                            <td>2024-11-14</td>
                            <td>
                                <a href="details_commande.php?id=2" class="btn btn-info btn-sm">Voir Détails</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
