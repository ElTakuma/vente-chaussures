<?php
include "../../../chaussure/config/connexion.php";

session_start();
if ($_SESSION['connected'] == null || $_SESSION['user_role'] !== "admin"){
    header("Locatin:/chaussure/index.php");
    exit();
}

$id = $_POST['id'];
$nom = $_POST['nom'];
$marque = $_POST['marque'];
$categorie = $_POST['categorie'];
$couleur = $_POST['couleur'];
$pointure = $_POST['pointure'];
$prix = $_POST['prix'];
$abstract = $_POST['abstract'];
$dispo = $_POST['dispo'];
$quantite = $_POST['quantite'];

$destinaton = "../../photos/"; // Destination of uploaded files

echo $_SESSION['redirect_if_update_error'];

/**
 * upload image 1
 */
if ($_FILES['img1']['name'] !== ''){
    $emplacement_file = $destinaton . basename($_FILES["img1"]["name"]);
//    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($emplacement_file, PATHINFO_EXTENSION));

    /**
     * check if it is an image
     */

    $check = getimagesize($_FILES["img1"]["tmp_name"]);
    if ($check) {
        echo "file is an image -" . $check['mime'] . ".";
//        $uploadOk = 1;
    } else {
        $_SESSION['file_upload_error_1'] = "File in not an image";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }

    /**
     * check file size
     */
    if ($_FILES["img1"]["size"] > 500000) {
        $_SESSION['file_upload_error_1'] = "Sorry, your file is too large";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }

    /**
     * Allow certain file formats
     */
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['file_upload_error_1'] = "Sorry, your file is not an image";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }

    if (move_uploaded_file($_FILES["img1"]["tmp_name"], $emplacement_file)){
        $img1 = basename($_FILES["img1"]["name"]);
       // echo "the file" . htmlspecialchars(basename($_FILES["img1"]["name"])). "has been uploaded.";
    } else {
        $_SESSION['file_upload_error_1'] = "Sorry, there was an error uploading your file.";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }
} else {
    $img1 = $_POST['oldImg1'];
}



/**
 * upload image 2
 */
if ($_FILES['img2']['name'] !== ''){
    $emplacement_file = $destinaton . basename($_FILES["img2"]["name"]);
//    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($emplacement_file, PATHINFO_EXTENSION));

    /**
     * check if it is an image
     */

    $check = getimagesize($_FILES["img2"]["tmp_name"]);
    if ($check) {
        echo "file is an image -" . $check['mime'] . ".";
    } else {
        $_SESSION['file_upload_error_1'] = "File in not an image";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }

    /**
     * check file size
     */
    if ($_FILES["img2"]["size"] > 500000) {
        $_SESSION['file_upload_error_1'] = "Sorry, your file is too large";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }

    /**
     * allow certain file formats
     */
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['file_upload_error_1'] = "Sorry, your file is not an image";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }

    if (move_uploaded_file($_FILES["img2"]["tmp_name"], $emplacement_file)){
        $img2 = basename($_FILES["img2"]["name"]);
//        echo "the file" . htmlspecialchars(basename($_FILES["img2"]["name"])). "has been uploaded.";
    } else {
        $_SESSION['file_upload_error_1'] = "Sorry, there was an error uploading your file.";
        header("Location:" . $_SESSION['redirect_if_update_error']);
        exit();
    }
} else {
    $img2 = $_POST['oldImg2'];
}

$sql = "INSERT INTO articles (categorie, marque, nom, abstract, img1, img2, pointure, couleur, prix, dispo) 
        VALUES ('$categorie', '$marque', '$nom', '$abstract', '$img1', '$img2', '$pointure', '$couleur', '$prix', '$dispo')";

if (mysqli_query($connexion, $sql)){

    $last_id = mysqli_insert_id($connexion);
    // Create stock
    mysqli_query($connexion, "INSERT INTO stocks (article_id, quantite) 
                                     VALUE ('$last_id', '$quantite')");

    $_SESSION['update_success_message'] = "Creation de l'article éffectuer avec succès";
    header("Location:/chaussure/pages/chaussure-detail.php?id=". $last_id);
    exit();
} else {
    $_SESSION['update_error_message'] = "Une érreur est survenu lors de la creation de l'article";
    header("Location:". $_SESSION['redirect_if_update_error']);
    exit();
}

