<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraison vers Parc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Livraison vers un Parc</h1>
        <form action="traitement_livraison_parc.php" method="POST">
            <!-- Informations de Livraison -->
            <div class="mb-3">
                <label for="parc" class="form-label">Choisissez le parc</label>
                <select class="form-select" id="parc" name="parc" required>
                    <option value="">Sélectionnez un parc</option>
                    <option value="parc1">Parc 1</option>
                    <option value="parc2">Parc 2</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="commande" class="form-label">Commande associée</label>
                <select class="form-select" id="commande" name="commande" required>
                    <option value="">Sélectionnez une commande</option>
                    <option value="commande1">Commande 1</option>
                    <option value="commande2">Commande 2</option>
                </select>
            </div>

            <!-- Détails de la Livraison -->
            <h3 class="mt-4">Détails de la Livraison</h3>
            <div id="details-livraison">
                <div class="row mb-3 detail-item">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="produit[]" placeholder="Produit" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="quantite_restante[]" placeholder="Quantité restante" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="quantite_livree[]" placeholder="Quantité livrée" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-detail">Supprimer</button>
                    </div>
                </div>
            </div>
            <button type="button" id="add-detail" class="btn btn-secondary mb-3">Ajouter un produit</button>

            <button type="submit" class="btn btn-primary">Valider la livraison</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Gestion des lignes dynamiques pour les détails de livraison
        document.getElementById('add-detail').addEventListener('click', function () {
            const container = document.getElementById('details-livraison');
            const detail = container.firstElementChild.cloneNode(true);
            container.appendChild(detail);

            // Réinitialiser les champs
            const inputs = detail.querySelectorAll('input');
            inputs.forEach(input => input.value = '');

            // Ajouter un gestionnaire pour le bouton supprimer
            detail.querySelector('.remove-detail').addEventListener('click', function () {
                detail.remove();
            });
        });

        // Gestion de la suppression d'une ligne
        document.querySelectorAll('.remove-detail').forEach(button => {
            button.addEventListener('click', function () {
                button.closest('.detail-item').remove();
            });
        });
    </script>
</body>
</html>
