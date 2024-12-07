
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Stocks - Menu Principal</title>

    <!-- Intégration de Bootstrap pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Wrapper principal -->
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-white navbar-light border-bottom">
            <ul class="navbar-nav">
                <!-- Bouton menu -->
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

                <!-- Titre -->
                <li class="nav-item d-none d-sm-inline-block">
                    <h1 class="text-center mb-0">Application de Gestion des Stocks</h1>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Logo de l'application -->
            <a href="#" class="brand-link text-center py-3">
                <img src="../dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Gestion Stocks</span>
            </a>
        </aside>

        <!-- Contenu principal -->
        <div class="content-wrapper p-4">

            <!-- En-tête du contenu -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-sm-12 text-center">
                            <h1 class="m-0 text-dark">Passer une commande à un fournisseur</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Formulaire -->
            <div class="container">
                <form action="traitement_commande.php" method="POST" class="shadow p-4 rounded bg-light">
                    <!-- Informations générales -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="fournisseur" class="form-label">Fournisseur</label>
                            <select class="form-select" id="fournisseur" name="fournisseur" required>
                        <option value="" selected>Choisissez un fournisseur</option>
                          <?php
                          include 'db_connection.php';
                        // Requête pour récupérer les fournisseurs
                        
                        $stmt = $conn->prepare("SELECT * FROM fournisseur");
                          $stmt->execute();
                          $result = $stmt->get_result();


                        // Vérifier s'il y a des résultats
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['code_fourni'] . "'>" . $row['designation_fourni'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Aucun fournisseur disponible</option>";
                        }

                        // Fermer la connexion
                        $conn->close();
                        ?>
                    </select>
                        </div>
                        <div class="col-md-6">
                            <label for="date_commande" class="form-label">Date de la commande</label>
                            <input type="date" class="form-control" id="date_commande" name="date_commande" required>
                        </div>
                    </div>

                    <!-- Détails de la commande -->
                    <h3 class="mb-3">Détails de la commande</h3>
                    <div id="details-container">
                        <div class="row mb-3 detail-item">
                            <div class="col-md-6">
                                <label for="produit1" class="form-label">Produit</label>
                                <input type="text" class="form-control" id="produit1" name="produit[]" placeholder="Nom du produit" required>
                            </div>
                            <div class="col-md-4">
                                <label for="quantite1" class="form-label">Quantité</label>
                                <input type="number" class="form-control" id="quantite1" name="quantite[]" placeholder="Quantité" required>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm remove-detail">Supprimer</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-detail" class="btn btn-secondary mb-3">Ajouter un produit</button>

                    <!-- Bouton d'envoi -->
                    <div class="text-center">

                   <a href="gestion_commandes.php" class="btn btn-secondary">Retour</a>
                        <button type="submit" class="btn btn-primary">Envoyer la commande</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ajouter dynamiquement des produits
        document.getElementById('add-detail').addEventListener('click', function () {
            const container = document.getElementById('details-container');
            const index = container.children.length + 1;

            // Nouveau bloc pour un produit
            const detail = document.createElement('div');
            detail.className = 'row mb-3 detail-item';
            detail.innerHTML = `
                <div class="col-md-6">
                    <label for="produit${index}" class="form-label">Produit</label>
                    <input type="text" class="form-control" id="produit${index}" name="produit[]" placeholder="Nom du produit" required>
                </div>
                <div class="col-md-4">
                    <label for="quantite${index}" class="form-label">Quantité</label>
                    <input type="number" class="form-control" id="quantite${index}" name="quantite[]" placeholder="Quantité" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm remove-detail">Supprimer</button>
                </div>
            `;

            // Ajouter le nouveau détail dans le conteneur
            container.appendChild(detail);

            // Ajouter un événement pour supprimer ce détail
            detail.querySelector('.remove-detail').addEventListener('click', function () {
                detail.remove();
            });
        });

        // Supprimer un détail existant
        document.querySelectorAll('.remove-detail').forEach(button => {
            button.addEventListener('click', function () {
                button.closest('.detail-item').remove();
            });
        });
    </script>
</body>

</html>
