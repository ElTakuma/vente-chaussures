<?php
include "../../chaussure/config/connexion.php";
session_start();
/**
 * Getting $_POST data from login form
 */
$id = $_POST['id'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];



/**
 * Check if email already exist and redirect if true
 */
if (mysqli_num_rows(mysqli_query($connexion, "SELECT email FROM clients WHERE email='$email'")) > 0) {
    $_SESSION['signup_email_error'] = "Email déja utilisé";
    header("Location:" . $_SESSION['redirect_to_signup']);
    exit();
}

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "UPDATE clients SET email = '$email', password = '$password' WHERE id = '$id' ";

if (mysqli_query($connexion, $sql)) {
    $_SESSION['info_message'] = "Informations mis à jour avec succes";
    header("Location:/chaussure/index.php");
    exit();
} else {
    $_SESSION['error_message'] = "Une erreur est survenue lors de la mise a jour";
    header("Location:" . $_SESSION['redirect_to_signup']);
    exit();
}

