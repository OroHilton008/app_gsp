<?php 
session_start();
  include '../includes/connexion_db.php';
  if ($_SESSION['code_admin']) {

    $info_admin = $pdo->query("SELECT * FROM administrateur 
  WHERE code_admin = '".$_SESSION['code_admin']."'  ");
  $info_admin_ok = $info_admin->fetch();

  $code_admin = $info_admin_ok['code_admin'];
  $nom_utilisateur_admin = $info_admin_ok['nom_utilisateur_admin'];
  $email_admin = $info_admin_ok['email_admin'];
  $nom_prenom_admin = $info_admin_ok['nom_prenom_admin'];
  $contact_admin = $info_admin_ok['contact_admin'];
  $code_type_admin = $info_admin_ok['code_type_admin'];
  $localite_admin = $info_admin_ok['localite_admin'];
  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 

switch ($code_admin) {
case 1:
 $nom_espace = "Espace Admin Gle";
 break;
case 2:
 $nom_espace = "Espace Admin de Centrale";
 break;
case 3:
 $nom_espace = "Espace Admin de Parc";
 break;
default:
 echo "Ce n'est pas un administrateur valide.";
 break;
}
?><?php echo $nom_espace; ?> | AdminGSM-DGIR | <?php echo $niveau_page; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
     <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Application de Gestion de Stock de Matériel</a>
      </li>

    </ul>
 <!-- Right navbar links -->
 <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i style="color:red;" class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="n_stock.php" class="dropdown-item">
            <i class="fas fa-bell mr-2"></i> Stocks
          </a>
          <div class="dropdown-divider"></div>
          <a href="n_commandes.php" class="dropdown-item">
            <i class="fas fa-bell mr-2"></i> Commandes
          </a>
          <div class="dropdown-divider"></div>
          <a href="n_livraisons.php" class="dropdown-item">
            <i class="fas fa-bell mr-2"></i> Livraisons
          </a>
          <div class="dropdown-divider"></div>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">

        <?php 

if ($code_admin == 1 ) {
  echo "AdminGLE";
}

if ($code_admin == 2 ) {
  echo "AdminCENT";}

if ($code_admin == 3 ) {
  echo "AdminPARC";
}
         ?>
          -GSM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nom_utilisateur_admin; ?></a>
        </div>
      </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tableau de bord
              </p>
            </a>
          </li>


          <?php 

if ($code_admin == 1 ) {
  ?>
       <li class="nav-item">
            <a href="centrales.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Centrales
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="parcs.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Parcs
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="fournisseurs.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Fournisseurs
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="types_materiels.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Type matériel
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="test.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                test
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="materiels.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Matériels
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="administrateurs.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Administrateurs
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="commandes.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Commandes
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="livraisons.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Livraisons
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="sorties_travaux.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sorties travaux
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="retours_travaux.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Retours travaux
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

  <?php
}

if ($code_admin == 2 ) {
  ?>

          <li class="nav-item">
            <a href="parcs.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Parcs
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="materiels.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Matériels
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="fournisseurs.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Fournisseurs
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

<li class="nav-item">
            <a href="commandes.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Commandes
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="livraisons.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Livraisons
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sorties_travaux.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sorties travaux
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="retours_travaux.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Retours travaux
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

  <?php
}

if ($code_admin == 3 ) {
  ?>
          <li class="nav-item">
            <a href="materiels.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Matériels
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
<li class="nav-item">
            <a href="commandes.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Commandes
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="livraisons.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Livraisons
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="sorties_travaux.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sorties travaux
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="retours_travaux.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Retours travaux
                <span class="right badge badge-info">1</span>
              </p>
            </a>
          </li>

  <?php
}
         ?>

<li class="nav-item">
            <a href="../includes/deconnexion.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Déconnexion</p>
            </a>
          </li>

          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">

            <?php 

if ($code_admin == 1 ) {
  echo "GESTION GENERALE";
}

if ($code_admin == 2 ) {
  echo "GESTION DE LA CENTRALE DE : ".strtoupper($localite_admin);}

if ($code_admin == 3 ) {
  echo "GESTION DU PARC DE : ".strtoupper($localite_admin);
}

            //echo $niveau_page;
             ?>

</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo $niveau_page; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    
        <!-- /.content-header -->
    
        <!-- Main content -->
     
        
        <div class="col-lg-12 col-12">

<div class=" float-sm-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-ajouter-fallone">
Ajouter fallone
</button>
</div>
<hr>  

    <div class="container mt-5">
        <h1 class="text-center mb-5">Passer une commande à un fournisseur</h1>
        <!-- Formulaire Commande -->
        <form action="traitement_commande.php" method="POST">
            <!-- Informations de la commande -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fournisseur" class="form-label">Fournisseur</label>
                    <select class="form-select" id="fournisseur" name="fournisseur" required>
                        <option value="" selected>Choisissez un fournisseur</option>
                        <option value="fournisseur1">Fournisseur 1</option>
                        <option value="fournisseur2">Fournisseur 2</option>
                        <option value="fournisseur3">Fournisseur 3</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="date_commande" class="form-label">Date de la commande</label>
                    <input type="date" class="form-control" id="date_commande" name="date_commande" required>
                </div>
            </div>

            <!-- Détails des produits -->
            <h3 class="mt-4">Détails de la commande</h3>
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

            <!-- Bouton de soumission -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Envoyer la commande</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script pour gérer l'ajout/suppression des détails
        document.getElementById('add-detail').addEventListener('click', function() {
            const container = document.getElementById('details-container');
            const index = container.children.length + 1;

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

            container.appendChild(detail);

            // Ajouter l'événement pour supprimer
            detail.querySelector('.remove-detail').addEventListener('click', function() {
                detail.remove();
            });
        });

        // Supprimer un détail existant
        document.querySelectorAll('.remove-detail').forEach(button => {
            button.addEventListener('click', function() {
                button.closest('.detail-item').remove();
            });
        });
    </script>
</body>
</html>

<?php

}else{

header("Location: ../");
}

?>