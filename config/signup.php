<?php
include "../../chaussure/config/connexion.php";
session_start();
/**
 * Getting $_POST data from login form
 */
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];

/**
 * Check if pseudo already exist and redirect if true
 */
if (mysqli_num_rows(mysqli_query($connexion, "SELECT pseudo FROM clients WHERE pseudo='$pseudo'")) > 0) {
    $_SESSION['signup_pseudo_error'] = "Pseudo deja utilisé";
    $_SESSION['login_success'] = null;
    $_SESSION['login_error'] = null;
    $_SESSION['signup_email_error'] = null;
    $_SESSION['login_info'] = null;
    header("Location:" . $_SESSION['redirect_to_signup']);
    exit();
}

/**
 * Check if email already exist and redirect if true
 */
if (mysqli_num_rows(mysqli_query($connexion, "SELECT email FROM clients WHERE email='$email'")) > 0) {
    $_SESSION['signup_email_error'] = "Email déja utilisé";
    header("Location:" . $_SESSION['redirect_to_signup']);
    exit();
}

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO clients (pseudo, email, role, password) VALUES ('$pseudo', '$email', 'user', '$password')";

 if (mysqli_query($connexion, $sql)) {
     $_SESSION['login_info'] = "Compte crée avec succes";
     header("Location:" . $_SESSION['redirect_to_onError']);
 } else {
      $_SESSION['signup_error'] = "Une erreur est survenue lors de la creation du compte";
     header("Location:" . $_SESSION['redirect_to_signup']);
 }

