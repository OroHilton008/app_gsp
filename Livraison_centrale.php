<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraison Fournisseurs → Centrale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Livraison des Fournisseurs vers la Centrale</h1>
        <form action="traitement_livraison.php" method="post">
            <!-- Commande associée -->
            <div class="mb-3">
                <label for="commandeFournisseur" class="form-label">Commande associée</label>
                <select class="form-select" id="commandeFournisseur" name="commande_id" required>
                    <option value="" selected>Choisissez une commande...</option>
                    <option value="1">Commande #1</option>
                    <option value="2">Commande #2</option>
                </select>
            </div>

            <!-- Quantité livrée -->
            <div class="mb-3">
                <label for="quantiteLivree" class="form-label">Quantité livrée</label>
                <input type="number" class="form-control" id="quantiteLivree" name="quantite_livree" placeholder="Quantité livrée" required>
            </div>

            <!-- Quantité restante -->
            <div class="mb-3">
                <label for="quantiteRestante" class="form-label">Quantité restante à livrer</label>
                <input type="number" class="form-control" id="quantiteRestante" name="quantite_restante" placeholder="Quantité restante" required>
            </div>

            <!-- Date de livraison -->
            <div class="mb-3">
                <label for="dateLivraison" class="form-label">Date de livraison</label>
                <input type="date" class="form-control" id="dateLivraison" name="date_livraison" required>
            </div>

            <!-- Statut de livraison -->
            <div class="mb-3">
                <label for="statutLivraison" class="form-label">Statut de la livraison</label>
                <select class="form-select" id="statutLivraison" name="statut_livraison" required>
                    <option value="" selected>Choisissez un statut...</option>
                    <option value="complete">Livraison complète</option>
                    <option value="partielle">Livraison partielle</option>
                </select>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Enregistrer la livraison</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
