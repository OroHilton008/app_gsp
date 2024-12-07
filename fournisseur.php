<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fournisseurs</title>
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
    <h2 class="mt-5">Liste des Fournisseurs</h2>
  </div>
  <div class="col-sm-3 text-right">
    <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#modal-ajouter-fournisseur">
      Ajouter un fournisseur
    </button>
  </div>
</div>

<div class="modal fade" id="modal-ajouter-fournisseur">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire d'Ajout de Fournisseur</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
        <form action="save_fournisseurs.php" method="POST">
         <div class="row mb-3">
              <div class="col-5">
                <label for="NomFournisseur" class="form-label">Nom du Fournisseur</label>
              </div>    
              <div class="col-7">
                <input type="text" class="form-control" name= "NomFournisseur" id="NomFournisseur" placeholder="Entrez le Nom" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-5">
                <label for="contactFournisseur" class="form-label">Contact</label>
              </div> 
              <div class="col-7">
                <input type="text" class="form-control" name= "contactFournisseur"id="contactFournisseur" placeholder="Entrez le contact">
              </div>
             </div>
             <div class="row mt-3">
              <div class="col-5">
                <label for="email" class="form-label">Adresse Email</label>
              </div>
              <div class="col-7">
                <input type="email" class="form-control" name= "email" id="email" placeholder="Entrez votre email" required>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="bpFournisseur" class="form-label">Boite Postale</label>
              </div>
              <div class= "col-7">
                <input type="text" class="form-control" name= "bpFournisseur" id="bpFournisseur" placeholder="Entrez la Boite Postale">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="localisationFournisseur" class="form-label">Adresse</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control" name= "locaFournisseur" id="locaFournisseur" placeholder="Entrez la Localisation">
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
                    <th>Fournisseurs</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Boite Postale</th>
                    <th>Localisation</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';
                 $sql = "SELECT * FROM fournisseur";

                 // Exécuter la requête
                 $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['code_fourni']; ?></td>
                            <td><?php echo htmlspecialchars ($row['designation_fourni']); ?></td>
                            <td><?php echo $row['contact_fourni']; ?></td>
                            <td><?php echo $row['email_fourni']; ?></td>
                            <td><?php echo $row['bp_fourni']; ?></td>
                            <td><?php echo $row['adresse_fourni']; ?></td>
  <td><button title="modifier les infos de :  <?php echo htmlspecialchars($row['designation_fourni']); ?>" class="btn btn-info btn-flat"
             data-toggle="modal" data-target="#modal-modifier-info-fournisseur<?php echo $row['code_fourni']; ?>">
       <i  class="fa fa-exclamation"></i>
        </button>
        <td><button title="supprimer les infos de :  <?php echo htmlspecialchars($row['designation_fourni']); ?>" class="btn btn-danger btn-flat"
             data-toggle="modal" data-target="#modal-supprimer-info-fournisseur<?php echo $row['code_fourni']; ?>">
             <i  class="fa fa-trash"></i>
        </button>

        <div class="modal fade" id="modal-modifier-info-fournisseur<?php echo $row['code_fourni']; ?>">
        <input type="hidden" name="id_fournisseur" value="<?php echo $row['code_fourni']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire de modification de Fournisseur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form action="update_fournisseur.php" method="POST">
            <input type="hidden" name="id_fournisseur" value="<?php echo $row['code_fourni']; ?>">
        <div class="row mb-3">
              <div class="col-5">
                <label for="NomFournisseur" class="form-label">Nom du Fournisseur</label>
              </div>  
              <div class="col-7">
            <input type="text" class="form-control" value="<?php echo $row['designation_fourni']; ?>" id="NomFournisseur" name="Nom_Fournisseur" placeholder="Entrez le nom du fournisseur" required>
              </div>
      </div>
      <div class="row mb-3">
              <div class="col-5">
                <label for="contactFournisseur" class="form-label">Contact</label>
              </div> 
              <div class="col-7">
                <input type="text" class="form-control" value="<?php echo $row['contact_fourni']; ?>" id="contactFournisseur" name="contactFournisseur" placeholder="Entrez le contact">
              </div>
             </div>
             <div class="row mt-3">
              <div class="col-5">
                <label for="email" class="form-label">Adresse Email</label>
              </div>
              <div class="col-7">
                <input type="email" class="form-control" value="<?php echo $row['email_fourni']; ?>" id="email" name="email" placeholder="Entrez votre email" required>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="bpFournisseur" class="form-label">Boite Postale</label>
              </div>
              <div class= "col-7">
                <input type="text" class="form-control" value="<?php echo $row['bp_fourni']; ?>" id="bpFournisseur" name="bpFournisseur" placeholder="Entrez la Boite Postale">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5">
                <label for="localisationFournisseur" class="form-label">Localisation</label>
              </div>
              <div class="mb-3 col-7">
                <input type="text" class="form-control" value="<?php echo $row['adresse_fourni']; ?>" id="locaFournisseur" name="locaFournisseur" placeholder="Entrez la Localisation">
              </div>
            </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" name="modifier_fournisseur" class="btn btn-primary">Modifier les infos</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   </form>
      
      </td>
                        </tr>;


        <div class="modal fade" id="modal-supprimer-info-fournisseur<?php echo $row['code_fourni']; ?>">
        <input type="hidden" name="id_fournisseur" value="<?php echo $row['code_fourni']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formulaire de suppression de Fournisseur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer le fournisseur <strong><?php echo htmlspecialchars($row['designation_fourni']); ?></strong> ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form action="delete_fournisseur.php" method="POST">
                    <input type="hidden" name="id_fournisseur" value="<?php echo $row['code_fourni']; ?>">
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

                
                 
               
        