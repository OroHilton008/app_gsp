<?php
session_start();
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminGSM-DGIR | Se connecter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>GSM-DGIR</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Connectez-vous</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="texte" class="form-control" name="nom_utilisateur_admin" placeholder="Login" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="mdp_admin" class="form-control" placeholder="Mot de passe" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

      

      <div class="social-auth-links text-center mb-3">
        <button name="se_connecter" type="submit" class="btn btn-block btn-success">
          Se connecter
        </button>
      </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="mdp_oublie.php">j'ai oublié mon mot de passe</a>
      </p>
    </div>

    <hr>      
    <div class="social-auth-links text-center mb-3">
    </div>

    <?php

if (isset($_POST['se_connecter'])) {
    $nom_utilisateur = $_POST['nom_utilisateur_admin'];
    $mot_de_passe = $_POST['mdp_admin'];

    // Requête préparée pour sécuriser les données
    $stmt = $conn->prepare("SELECT * FROM administrateur WHERE nom_utilisateur_admin = ? AND mdp_admin = ?");
    $stmt->bind_param("ss", $nom_utilisateur, $mot_de_passe);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Si utilisateur trouvé, on récupère ses informations
        $utilisateur = $result->fetch_assoc();

        // Stocker les informations dans la session
        $_SESSION['user_id'] = $utilisateur['id'];
        $_SESSION['code_type_admin'] = $utilisateur['code_type_admin'];
        $_SESSION['nom_prenom_admin'] = $utilisateur['nom_prenom_admin'];

         

        // Redirection vers `depart.php` (tableau de bord principal)
        header("Location: depart.php");
        exit();
    } else {
        // Si identifiants incorrects
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
</div>


    <hr>

    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
 <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
