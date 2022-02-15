<?php
include "../../chaussure/layout/header.php";
include "../../chaussure/config/connexion.php";
$_SESSION['redirect_if_update_error'] = $_SERVER['REQUEST_URI'];
if ($_SESSION['connected'] == null){
    header("Locatin:/chaussure/index.php");
    exit();
}


echo "<h1 style='margin-left: 20px; text-decoration: underline; font-size: 35px'>Créé un article</h1>";

echo "
<form method='post' action='../requetes/chaussure/create-chaussure.php' enctype='multipart/form-data'>
    <div style='display: flex; flex-flow: row wrap; background-color: #eeeeee'>
        <div class='content_form_update'>
        <span>Nom</span>
        <input type='text' name='nom' class='form-input2' placeholder='nom' '>
    </div>
    <div class='content_form_update'>
        <span>Marque</span>
        <input type='text' name='marque' class='form-input2' placeholder='marque'>
    </div>
    <div class='content_form_update'>
        <span>Categorie</span>
        <input type='text' name='categorie' class='form-input2' placeholder='categorie'>
    </div>
    <div class='content_form_update'>
        <span>Couleur</span>
        <select name='couleur' class='form-input2'>
            <option value='blanche'>Blanche</option>
            <option value='noire'>Noire</option>
            <option value='bleue'>Bleue</option>
        </select>
    </div>
    <div class='content_form_update'>
        <span>Pointure</span>
        <select name='pointure' class='form-input2'>
            <option value='43'>43</option>
            <option value='44'>44</option>
            <option value='45'>45</option>
        </select>
    </div>
    <div class='content_form_update'>
        <span>Prix</span>
        <input type='number' name='prix' min='0'  class='form-input2' placeholder='prix'>
    </div>
    <div class='content_form_update'>
                <span>Quantite</span>
                <input type='number' name='quantite' min='0'  class='form-input2' value='0'>
            </div>
            <div class='content_form_update'>
                <span>Disponible</span>
                <select name='dispo' class='form-input2'>
                    <option value='oui'> oui</option>
                   <option value='non'>non</option>
                </select>
            </div>
    <div class='content_form_update' style='width: 100%'>
        <span>Description</span>
        <input type='text' name='abstract' class='form-input2' placeholder='abstract'>
    </div>
    <div class='content_form_update'>
        <span>Image 1 </span>
        <input type='file' accept='image/*' name='img1' class='form-input2'>";
if ($_SESSION['file_upload_error_1'] !== null)  echo "<i style='color: red; font-size: 13px;'>". $_SESSION['file_upload_error_1'] ."</i>";
echo   "</div>
    <div class='content_form_update'>
        <span>Image 2</span>
        <input type='file' accept='image/*'  name='img2' class='form-input2'>";
if ($_SESSION['file_upload_error_2'] !== null)  echo "<i style='color: red; font-size: 13px;'>". $_SESSION['file_upload_error_2'] ."</i>";
echo   "</div>

        <br><hr style='width: 100%'>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href='chaussure-index.php'>
            <button type='button' class='detail-btn' style='background-color: lightgray; color: black'>Annuler</button>
        </a>&nbsp;&nbsp;
        <button type='submit' class='detail-btn'>Sauvegarder</button>
        <br><hr style='width: 100%'>
    </div>
</form>";

include "../../chaussure/config/reset_messages.php";