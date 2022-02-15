<?php
include "../../chaussure/config/connexion.php";
session_start();

if ($_SESSION['connected'] == null || $_SESSION['user_role'] !== "admin"){
    header("Locatin:/chaussure/index.php");
    exit();
}

$id = $_GET['id'];

$sql1 = "DELETE FROM clients WHERE id='$id'";

if (mysqli_query($connexion, $sql1)) {
    $_SESSION['info_message'] = "La client a été supprimer avec succès.";
    header("Location:" . $_SESSION['redirect_to_after_request']);
} else {
    $_SESSION['error_message'] = "Une erreur est survenue lors de la suppression du client";
    header("Location:". $_SESSION['redirect_to_after_request']);
    exit();
}