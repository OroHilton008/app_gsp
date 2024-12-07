<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->



  </head>
<body>
       
<!-- Grid des données -->
<div class="row align-items-center">
  <div class="col-2"></div>
  <div class="col-sm-7">
    <h2 class="mt-5">Liste des Produits</h2>
  </div>
  <div class="col-sm-3 text-right">
    <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#modal-ajouter-produit">
      Ajouter un Produit
    </button>
  </div>
</div>

<div class="modal fade" id="modal-ajouter-produit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire d'Ajout de Produit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
        <form action="save_produit.php" method="POST">
         <div class="row mb-3">
              <div class="col-5">
                <label for="designation_produit" class="form-label">designation produit</label>
              </div>    
              <div class="col-7">
                <input type="text" class="form-control" name= "designation_produit" id="designation_produit" placeholder="Entrez la designation " required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-5">
                <label for="prix_unitaire" class="form-label">prix unitaire</label>
              </div> 
              <div class="col-7">
              <input type="number" id="prix" name="prix" min="0" step="0.01" required placeholder="Entrez le prix">
              </div>
             </div>
             <div class="row mt-3">
              <div class="col-5">
                <label for="marque" class="form-label">marque</label>
              </div>
              <div class="col-7">
                <input type="text" class="form-control" name= "marque" id="marque" placeholder="Entrez la marque" required>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="type" class="form-label">type</label>
              </div>
              <div class= "col-7">
                <input type="text" class="form-control" name= "type" id="type" placeholder="Entrez le type">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="Immatriculation" class="form-label">Immatriculation</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control" name= "Immatriculation" id="Immatriculation" placeholder="Entrez limmatriculation">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="serie" class="form-label">Serie</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control" name= "serie" id="serie" placeholder="Entrez la serie">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="etat" class="form-label">etat</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control" name= "etat" id="etat" placeholder="Entrez letat du produit">
              </div>
            </div>
             <!-- Informations générales -->
             <div class="row mb-4">
                        <div class="col-md-5">
                            <label for="Type_produit" class="form-label">Type produit</label>
                        </div>
                        <div class="col-7">
                            <select class="form-select" id="Type_produit" name="Type_produit" required>
                        <option value="" selected>Choisissez un Type produit</option>
                          <?php
                          include 'db_connection.php';
                        // Requête pour récupérer les types produits
                        
                        $stmt = $conn->prepare("SELECT * FROM type_produit");
                          $stmt->execute();
                          $result = $stmt->get_result();


                        // Vérifier s'il y a des résultats
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {                          
                            echo "<option value='" . htmlspecialchars($row['code_type_produit']) . "'>" . htmlspecialchars($row['nom_type_produit']) . "</option>";                           
                            }
                        } else {
                            echo "<option value=''>Aucun type produit disponible</option>";
                        }

                        // Fermer la connexion
                        $conn->close();
                        ?>
                    </select>
                        </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button name= "enregistrer" type="submit" class="text-center btn btn-primary col-4 ">Enregistrer</button>
  
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</form>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produits</th>
                    <th>prix unitaire</th>
                    <th>Marque</th>
                    <th>Type</th>
                    <th>Immatriculation</th>
                    <th>Serie</th>
                    <th>Etat</th>
                    <th class="d-none">code type produit</th>
                    <th>Type Produit</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';
                 $sql = "SELECT produit.*, type_produit.nom_type_produit
                            FROM produit
                            JOIN type_produit
                            ON produit.code_type_produit = type_produit.code_type_produit
                            ";

                 // Exécuter la requête
                 $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['code_produit']; ?></td>
                            <td><?php echo htmlspecialchars ($row['designation_produit']); ?></td>
                            <td><?php echo $row['prix_unitaire']; ?></td>
                            <td><?php echo $row['marque']; ?></td>
                            <td><?php echo $row['type_p']; ?></td>
                            <td><?php echo $row['Immatriculation']; ?></td>
                            <td><?php echo $row['serie']; ?></td>
                            <td><?php echo $row['etat']; ?></td>
                            <td class="d-none"><?php echo $row['code_type_produit']; ?></td>
                            <td><?php echo $row['nom_type_produit']; ?></td>
  <td><button title="modifier les infos de :  <?php echo htmlspecialchars($row['designation_produit']); ?>" class="btn btn-info btn-flat"
             data-toggle="modal" data-target="#modal-modifier-info-produit<?php echo $row['code_produit']; ?>">
       <i  class="fa fa-exclamation"></i>
        </button>
        <td><button title="supprimer les infos de :  <?php echo htmlspecialchars($row['designation_produit']); ?>" class="btn btn-danger btn-flat"
             data-toggle="modal" data-target="#modal-supprimer-info-produit<?php echo $row['code_produit']; ?>">
             <i  class="fa fa-trash"></i>
        </button>

        <div class="modal fade" id="modal-modifier-info-produit<?php echo $row['code_produit']; ?>">
        <input type="hidden" name="code_produit" value="<?php echo $row['code_produit']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire de modification du produit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">

            <form action="update_produit.php" method="POST">
            <input type="hidden" name="code_produit" value="<?php echo $row['code_produit']; ?>">
            <div class="row mb-3">
              <div class="col-5">
                <label for="designation_produit" class="form-label">designation produit</label>
              </div>    
              <div class="col-7">
                <input type="text" class="form-control" value="<?php echo $row['designation_produit']; ?>" name= "designation_produit" id="designation_produit" placeholder="Entrez la designation " required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-5">
                <label for="prix_unitaire" class="form-label">prix unitaire</label>
              </div> 
              <div class="col-7">
              <input type="number" class="form-control" value="<?php echo $row['prix_unitaire']; ?>" id="prix" name="prix" min="0" step="0.01" required placeholder="Entrez le prix">
              </div>
             </div>
             <div class="row mt-3">
              <div class="col-5">
                <label for="marque" class="form-label">marque</label>
              </div>
              <div class="col-7">
                <input type="text" class="form-control" value="<?php echo $row['marque']; ?>" name= "marque" id="marque" placeholder="Entrez la marque" required>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="type" class="form-label">type</label>
              </div>
              <div class= "col-7">
                <input type="text" class="form-control" value="<?php echo $row['type_p']; ?>" name= "type" id="type" placeholder="Entrez le type">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="Immatriculation" class="form-label">Immatriculation</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control" value="<?php echo $row['Immatriculation']; ?>" name= "Immatriculation" id="Immatriculation" placeholder="Entrez limmatriculation">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="serie" class="form-label">Serie</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control" value="<?php echo $row['serie']; ?>" name= "serie" id="serie" placeholder="Entrez la serie">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="etat" class="form-label">Etat</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control"value="<?php echo $row['etat']; ?>"  name= "etat" id="etat" placeholder="Entrez l'etat">
              </div>
            </div>
            <div class="row mb-4">
                        <div class="col-md-5">
                            <label for="Type_produit" class="form-label">Type produit</label>
                        </div>
                        <div class="col-7">
                            <?php
                        $selected_type = $row = ['code_type_produit'] ?? ""; ?>

                            <select class="form-select" id="Type_produit" name="Type_produit" required>
                        <option value="<?php echo $row['code_type_produit']; ?>" <?php echo ($row['code_type_produit'] == $selected_type) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['nom_type_produit']); ?></option>
                          <?php
                          include 'db_connection.php';
                        // Requête pour récupérer les types produits
                        
                        $stmt = $conn->prepare("SELECT * FROM type_produit");
                          $stmt->execute();
                          $result = $stmt->get_result();


                        // Vérifier s'il y a des résultats
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['code_type_produit'] . "'>" . $row['nom_type_produit'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Aucun tpe produit disponible</option>";
                        }

                        // Fermer la connexion
                        $conn->close();
                        ?>
                    </select>
                        </div>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" name="modifier_produit" class="btn btn-primary">Modifier les infos</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   </form>
      
      </td>
                        </tr>;


        <div class="modal fade" id="modal-supprimer-info-produit<?php echo $row['code_produit']; ?>">
        <input type="hidden" name="code_produit" value="<?php echo $row['code_produit']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire de suppression de Produit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer le produit <strong><?php echo htmlspecialchars($row['designation_produit']); ?></strong> ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form action="delete_produit.php" method="POST">
                    <input type="hidden" name="code_produit" value="<?php echo $row['code_produit']; ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

</td>
            </tr>;


                        <?php
                    }
                } else {
                   echo "<tr><td colspan='4' class='text-center'>Aucun produit trouvé</td></tr>";
                }
                ?>


    



            </tbody>
        </table>


        <div class="col-2">
                   <a href="depart.php" class="btn btn-secondary">Retour à l'accueil</a>
                 </div>
<?php
// Fermeture de la connexion
$conn->close();
?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

                
                 
               
        