<?php
// Informations de connexion
$servername = "localhost";
$username = "root"; 
$password = "";    
$dbname = "gsm_dgir_db";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
