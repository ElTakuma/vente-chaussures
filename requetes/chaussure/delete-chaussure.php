<?php
include "../../../chaussure/config/connexion.php";
session_start();

if ($_SESSION['connected'] == null || $_SESSION['user_role'] !== "admin"){
    header("Locatin:/chaussure/index.php");
    exit();
}

$id = $_GET['id'];

$sql1 = "DELETE FROM stocks WHERE article_id='$id'";
$sql2 = "DELETE FROM articles WHERE id='$id'";

if (mysqli_query($connexion, $sql1)) {
    if (mysqli_query($connexion, $sql2)){
        $_SESSION['info_message'] = "L'article a été supprimer avec succès.";
        header("Location:/chaussure/index.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Une erreur est survenue lors de la suppression de l'article";
        header("Location:". $_SESSION['redirect_after_login']);
        exit();
    }
}