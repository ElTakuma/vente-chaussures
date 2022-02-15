<?php
include "../../chaussure/layout/header.php";
include "../../chaussure/requetes/customList.php";

$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];

echo "<div style='display: flex; margin-bottom: 30px'>
    <div style='padding-left: 20px'><span style='text-decoration: underline; font-size: 35px'>Liste de chaussures</span></div>";
    if ($_SESSION['user_role'] == "admin") {
    echo "<div><a href='chaussure-create.php'><button type='button' class='detail-btn' style='position: absolute; right: 5%;'>Ajouter Article</button></a> </div>";
    }
    echo "</div>";

echo "<table class='table'>
    <thead>
    <th width='7%'>N article</th>
    <th width='20%'>nom</th>
    <th width='15%'>categorie</th>
    <th width='11%'>Marque</th>
    <th width='15%'>Photos</th>
    <th width='13%'>Prix(€)/dispo</th>
    <th width='16%'>+ de details</th>
    </thead>
    <tbody>";
    if (mysqli_num_rows($resultFilter) > 0 ){
    while ($row = mysqli_fetch_assoc($resultFilter)){
    echo "<tr>
        <td c><b>". $row["id"] ."</b></td>
        <td>". $row["nom"] ."</td>
        <td>". $row["categorie"] ."</td>
        <td>". $row["marque"] ."</td>
        <td>
            <img src='../../chaussure/photos/". $row["img1"] ."' alt='". $row["marque"] ."' class='image'>
            <img src='../../chaussure/photos/". $row["img2"] ."' alt='". $row["marque"] ."' class='image'>
            " . "</td>
        <td>". $row["prix"] ."€ <br> ". $row["dispo"] ."</td>
        <td style='padding-top: 20px;'><a  href='../pages/chaussure-detail.php?id=".$row["id"] ."' class='detail-btn'> voir l'article</a></td>
    </tr>";
    }
    }

        echo "</tbody></table>";

include "../../chaussure/config/reset_messages.php";
