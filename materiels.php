<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Matériels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestion des Matériels</h1>
        <form>
            <div class="mb-3">
                <label for="nomMateriel" class="form-label">Nom du Matériel</label>
                <input type="text" class="form-control" id="nomMateriel" placeholder="Entrez le nom du matériel">
            </div>
            <div class="mb-3">
                <label for="quantiteMateriel" class="form-label">Quantité</label>
                <input type="number" class="form-control" id="quantiteMateriel" placeholder="Entrez la quantité disponible">
            </div>
            <div class="mb-3">
                <label for="categorieMateriel" class="form-label">Catégorie</label>
                <select class="form-select" id="categorieMateriel">
                    <option selected>Choisissez une catégorie</option>
                    <option value="1">Engins lourds</option>
                    <option value="2">Outillage</option>
                    <option value="3">Consommables</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>

        
        <div class="mt-4">
            <a href="depart.php" class="btn btn-secondary">Retour à l'accueil</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
