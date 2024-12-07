<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Parcs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  </head>
<body>
       
<!-- Grid des données -->
<div class="row align-items-center">
  <div class="col-2"></div>
  <div class="col-sm-7">
    <h2 class="mt-5">Liste des parcs</h2>
  </div>
  <div class="col-sm-3 text-right">
    <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#modal-ajouter-parc">
      Ajouter un parc
    </button>
  </div>
</div>

<div class="modal fade" id="modal-ajouter-parc">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire d'Ajout de Parc</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
        <form action="save_parc.php" method="POST">
         <div class="row mb-3">
              <div class="col-5">
                <label for="LocaliteParc" class="form-label">Localite du parc</label>
              </div>    
              <div class="col-7">
                <input type="text" class="form-control" name= "LocaliteParc" id="LocaliteParc" placeholder="Entrez le Nom" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-5">
                <label for="LocalisationParc" class="form-label">Localisation</label>
              </div> 
              <div class="col-7">
                <input type="text" class="form-control" name= "LocalisationParc"id="LocalisationParc" placeholder="Entrez la localisation">
              </div>
             </div>
             <div class="row mt-3">
              <div class="col-5">
                <label for="superficieP" class="form-label">Superficie</label>
              </div>
              <div class="col-7">
                <input type="text" class="form-control" name= "superficieP" id="superficieP" placeholder="Entrez la superficie" required>
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
                    <th>code</th>
                    <th>Localite</th>
                    <th>Localisation</th>
                    <th>Superficie</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';
                 $sql = "SELECT * FROM parc";

                 // Exécuter la requête
                 $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['code_parc']; ?></td>
                            <td><?php echo htmlspecialchars ($row['localite_parc']); ?></td>
                            <td><?php echo $row['localisation_parc']; ?></td>
                            <td><?php echo $row['superficie_parc']; ?></td>
  <td><button title="modifier les infos de :  <?php echo htmlspecialchars($row['localite_parc']); ?>" class="btn btn-info btn-flat"
             data-toggle="modal" data-target="#modal-modifier-info-parc<?php echo $row['code_parc']; ?>">
       <i  class="fa fa-exclamation"></i>
        </button>
        <td><button title="supprimer les infos de :  <?php echo htmlspecialchars($row['localite_parc']); ?>" class="btn btn-danger btn-flat"
             data-toggle="modal" data-target="#modal-supprimer-info-centrale<?php echo $row['code_parc']; ?>">
             <i  class="fa fa-trash"></i>
        </button>

        <div class="modal fade" id="modal-modifier-info-parc<?php echo $row['code_parc']; ?>">
        <input type="hidden" name="code_parc" value="<?php echo $row['code_parc']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire de modification du parc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form action="update_parc.php" method="POST">
            <input type="hidden" name="code_parc" value="<?php echo $row['code_parc']; ?>">
            <div class="row mb-3">
              <div class="col-5">
                <label for="LocaliteParc" class="form-label">Localite du parc</label>
              </div> 
              <div class="col-7">
            <input type="text" class="form-control" value="<?php echo $row['localite_parc']; ?>" id="LocaliteParc" name="LocaliteParc" placeholder="Entrez le nom du fournisseur" required>
              </div>
      </div>
      <div class="row mb-3">
              <div class="col-5">
                <label for="LocalisationParc" class="form-label">Localisation</label>
              </div> 
              <div class="col-7">
                <input type="text" class="form-control" value="<?php echo $row['localisation_parc']; ?>" id="LocalisationParc" name="LocalisationParc" placeholder="Entrez le contact">
              </div>
             </div>
             <div class="row mt-3">
              <div class="col-5">
                <label for="superficieP" class="form-label">Superficie</label>
              </div>
              <div class="col-7">
                <input type="text" class="form-control" value="<?php echo $row['superficie_parc']; ?>" id="superficieP" name="superficieP" placeholder="Entrez votre email" required>
              </div>
            </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" name="modifier_parc" class="btn btn-primary">Modifier les infos</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   </form>
      
      </td>
                        </tr>;


        <div class="modal fade" id="modal-supprimer-info-parc<?php echo $row['code_parc']; ?>">
        <input type="hidden" name="code_parc" value="<?php echo $row['code_parc']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire de suppression du parc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer le parc <strong><?php echo htmlspecialchars($row['localite_parc']); ?></strong> ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form action="delete_parc.php" method="POST">
                    <input type="hidden" name="code_parc" value="<?php echo $row['code_parc']; ?>">
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
                   echo "<tr><td colspan='4' class='text-center'>Aucun fournisseur trouvé</td></tr>";
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

                
                 
               
        