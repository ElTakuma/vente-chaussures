<?php
include "../../chaussure/layout/header.php";
include "../../chaussure/config/connexion.php";

$_SESSION['redirect_if_update_error'] = $_SERVER['REQUEST_URI'];

if ($_SESSION['connected'] == null || $_SESSION['user_role'] !== "admin"){
    header("Locatin:/chaussure/index.php");
    exit();
}
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id = $id";
    $r = mysqli_query($connexion, $sql);

   if (mysqli_num_rows($r) == 1){
       $result_fine_one =  mysqli_fetch_assoc($r);
       $sql = "SELECT * FROM stocks WHERE article_id = $id";
       $r2 = mysqli_query($connexion, $sql);

       /**
        * testing if there is no stock and create one if not
        */
       if (mysqli_num_rows($r2) < 1) {
           $sql2 = "INSERT INTO stocks (article_id, quantite) VALUES ('$id', '0')";
           mysqli_query($connexion, $sql2);

           $sql = "SELECT * FROM stocks WHERE article_id = $id";
           $r2 = mysqli_query($connexion, $sql);
       }
       $stock = mysqli_fetch_assoc($r2);

    echo "<h1 style='margin-left: 20px; text-decoration: underline; font-size: 35px'>Edité votre chaussure</h1>";

    echo "<form method='post' action='../requetes/chaussure/update-chaussure.php' enctype='multipart/form-data'>
            <div style='display: flex; flex-flow: row wrap; background-color: #eeeeee'>
                <div class='content_form_update'>
                <span>Nom</span>
                <input type='text' name='nom' class='form-input2' value='". $result_fine_one['nom']."'>
                <input type='hidden' name='id' class='form-input2' value='". $result_fine_one['id']."'>
                <input type='hidden' name='oldImg1' class='form-input2' value='". $result_fine_one['img1']."'>
                <input type='hidden' name='oldImg2' class='form-input2' value='". $result_fine_one['img2']."'>
            </div>
            <div class='content_form_update'>
                <span>Marque</span>
                <input type='text' name='marque' class='form-input2' value='". $result_fine_one['marque']."'>
            </div>
            <div class='content_form_update'>
                <span>Categorie</span>
                <input type='text' name='categorie' class='form-input2' value='". $result_fine_one['categorie']."'>
            </div>
            <div class='content_form_update'>
                <span>Couleur</span>
                <select name='couleur' class='form-input2'>
                    <option value='blanche'"; if ($result_fine_one['couleur'] == 'blanche'): echo 'selected'; endif; echo "> Blanche</option>
                    <option value='noire'"; if ($result_fine_one['couleur'] == 'noire'): echo 'selected'; endif; echo "> Noire</option>
                    <option value='bleue'"; if ($result_fine_one['couleur'] == 'bleue'): echo 'selected'; endif; echo "> Bleue</option>
                </select>
            </div>
            <div class='content_form_update'>
                <span>Pointure</span>
                <select name='pointure' class='form-input2'>
                    <option value='43'"; if ($result_fine_one['pointure'] == '43'): echo 'selected'; endif; echo "> 43</option>
                    <option value='44'"; if ($result_fine_one['pointure'] == '44'): echo 'selected'; endif; echo "> 44</option>
                    <option value='45'"; if ($result_fine_one['pointure'] == '45'): echo 'selected'; endif; echo "> 45</option>
                </select>
            </div>
            <div class='content_form_update'>
                <span>Prix</span>
                <input type='number' name='prix' min='0'  class='form-input2' value='". $result_fine_one['prix']."'>
            </div>
            <div class='content_form_update'>
                <span>Quantite</span>
                <input type='number' name='quantite' min='0'  class='form-input2' value='". $stock['quantite']."'>
                <input type='hidden' name='stock_id' class='form-input2' value='". $stock['id']."'>
            </div>
            <div class='content_form_update'>
                <span>Disponible</span>
                <select name='dispo' class='form-input2'>
                    <option value='oui'"; if ($result_fine_one['dispo'] == 'oui'): echo 'selected'; endif; echo "> oui</option>
                   <option value='non'"; if ($result_fine_one['dispo'] == 'non'): echo 'selected'; endif; echo ">non</option>
                </select>
            </div>
            <div class='content_form_update' style='width: 100%'>
                <span>Description</span>
                <input type='text' name='abstract' class='form-input2' value='". $result_fine_one['abstract']."'>
            </div>
            <div class='content_form_update'>
                <span>Image 1 <i style='color: red'>(Selectionnez une image pour remplacer la deuxième image)</i></span>
                <input type='file' accept='image/*' name='img1' class='form-input2'>";
    if ($_SESSION['file_upload_error_1'] !== null)  echo "<i style='color: red; font-size: 13px;'>". $_SESSION['file_upload_error_1'] ."</i>";
    echo   "</div>
            <div class='content_form_update'>
                <span>Image 2 <i style='color: red'>(Selectionnez une image pour remplacer la deuxième image)</i></span>
                <input type='file' accept='image/*'  name='img2' class='form-input2'>";
    if ($_SESSION['file_upload_error_2'] !== null)  echo "<i style='color: red; font-size: 13px;'>". $_SESSION['file_upload_error_2'] ."</i>";
    echo   "</div>
                <div class='content_form_update'>
                    <img src='../../chaussure/photos/". $result_fine_one["img1"] ."' alt='". $result_fine_one["marque"] ."' class='image3'>
                    <img src='../../chaussure/photos/". $result_fine_one["img2"] ."' alt='". $result_fine_one["marque"] ."' class='image3'>
                </div>
                <br><hr style='width: 100%'>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href='chaussure-detail.php?id=". $result_fine_one['id'] ."'>
                    <button type='button' class='detail-btn' style='background-color: lightgray; color: black'>Annuler</button>
                </a>&nbsp;&nbsp;
                <button type='submit' class='detail-btn'>Sauvegarder</button>
                <br><hr style='width: 100%'>
            </div>
        </form>";
   }
}
include "../../chaussure/config/reset_messages.php";
