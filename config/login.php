<?php
include "../../chaussure/config/connexion.php";
session_start();
/**
 * Getting $_POST data from login form
 */
$email = $_POST['email'];
$password = $_POST['password'];

/**
 * Querying to get if email exist and get hashed password
 */
$sql = "SELECT * FROM clients WHERE email='$email'"; ;
$result_find_login = mysqli_query($connexion, $sql);

$user = mysqli_fetch_assoc($result_find_login);


/**
 * Testing if password match or not
 */

if (password_verify($password, $user['password'])){
    $_SESSION['connected'] = true;
    $_SESSION['user_role'] = $user['role'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_pseudo'] = $user['pseudo'];

    $_SESSION['welcome_message'] = "Bienvenue ". $user['pseudo'];

    header("Location:" . $_SESSION['redirect_after_login']);
} else {
    $_SESSION['login_error'] = "Email / Mot de passe incorrect";

    header("Location:" . $_SESSION['redirect_to_onError']);
    echo $_SESSION['redirect_to_onError'];
}

//echo password_hash($_POST["password"], PASSWORD_DEFAULT)

?>
