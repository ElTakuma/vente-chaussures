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
$stock_id = $_POST['stock_id'];
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

$sql = "UPDATE articles 
        SET nom='$nom', 
            marque='$marque', 
            categorie='$categorie',
            couleur='$couleur',
            pointure='$pointure',
            prix='$prix',
            abstract='$abstract',
            img1='$img1',
            img2='$img2',
            dispo='$dispo'
        WHERE id = '$id';";

if (mysqli_query($connexion, $sql)){

    // update stock
    mysqli_query($connexion, "UPDATE stocks 
            SET quantite='$quantite'
            WHERE article_id='$id' AND id='$stock_id'");
    mysqli_error($connexion);
    $_SESSION['update_success_message'] = "Mise ?? jour de l'article ??ffectuer avec succ??s";
    header("Location:/chaussure/pages/chaussure-detail.php?id=". $id);
    exit();
} else {
    $_SESSION['update_error_message'] = "une ??rreur est survenu lors de la mise ?? jour de l'article";
    header("Location:". $_SESSION['redirect_if_update_error']);
    exit();
}

