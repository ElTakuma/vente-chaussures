<?php
include "../../chaussure/config/connexion.php";
session_start();

$article_id = $_GET['id'];

$sql = "SELECT quantite FROM stocks WHERE article_id='$article_id'";

$stock = mysqli_fetch_assoc(mysqli_query($connexion, $sql));
print_r($stock['quantite']);
$reste_stock = 0;

if ($stock['quantite'] > 0) {
    $reste_stock = $stock['quantite'] - 1;

    $sql = "UPDATE stocks SET quantite='$reste_stock' WHERE article_id='$article_id'";
    if (mysqli_query($connexion, $sql)){
        $_SESSION['info_message'] = "Votre commande a été éffectué.";
        header("Location:" . $_SESSION['redirect_to_after_request']);
    } else {
        $_SESSION['error_message'] = "Une erreur est survenue lors passassion de votre commande";
        header("Location:". $_SESSION['redirect_to_after_request']);
        exit();
    }
}
