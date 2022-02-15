<?php
include "../../chaussure/layout/header.php";
include "../../chaussure/config/connexion.php";

$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
$_SESSION['redirect_to_after_request'] = $_SERVER['REQUEST_URI'];


if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id = $id";
    $result_fine_one = mysqli_query($connexion, $sql);

    echo "<h1 style='margin-left: 20px; text-decoration: underline; font-size: 35px'>Votre chaussure</h1>";

    echo "<table class='table' >
        <thead>
            <th width='22%'>nom</th>
            <th width='27%'>Photos</th>
            <th width='20%'>Description</th>
            <th width='12%'>caractéristiques </th>
            <th width='10%'>Prix(€)/dispo</th>
            <th width='15%'>+ de details</th>
        </thead>
        <tbody style='text-align: start; background-color: #eeeeee'>";
    if (mysqli_num_rows($result_fine_one) > 0) {
        while ($row = mysqli_fetch_assoc($result_fine_one)){

            $stock = mysqli_fetch_assoc(mysqli_query($connexion, "SELECT * FROM stocks WHERE article_id=" . $row['id']));
            if ($stock == null): $stock['quantite'] = 0; endif;
            echo "<tr>
                <td>
                <b style='box-shadow: 0 3px 4px lightgray; color: blue; font-size: 20px'>" . $row["nom"] . "</b><br><br>
                <b>Ref article N*</b> ". $row["id"] ."<br><br>
                <b>Catégorie:</b> ". $row["categorie"] ." <br><br><b>Quantité :</b>". $stock['quantite'] ."</td>
                <td>
                <img src='../photos/" . $row["img1"] . "' alt='" . $row["marque"] . "' class='image2'>
                <img src='../photos/" . $row["img2"] . "' alt='" . $row["marque"] . "' class='image2'>
                 " . "</td>
                <td>" . $row["abstract"] . "</td>
                <td><b>Pointure: </b>" . $row["pointure"] . "<br><br><b>Couleur: </b>". $row["couleur"] ."</td>
                <td>" . $row["prix"] . "€ <br> " . $row["dispo"] . "</td>
                <td style='padding-top: 20px;'>";
            if ($_SESSION['user_role'] == null) {
                echo "<a  href='../pages/login_form.php'><button class='option-btn'>Commandez</button></a>";
            } else {
                if ($stock['quantite'] > 0){
                    echo "<a  href='../requetes/commander.php?id=" . $row["id"] . "'><button class='option-btn'>Commandez</button></a>";
                } else {
                    echo "<a  href=''><button class='option-btn' style='background-color: rgba(20,20,20, 0.5); cursor: not-allowed' disabled>Commandez</button></a>";
                }
            }
            if ($_SESSION['user_role'] == "admin") {
                echo "<a  href='../pages/chaussure-edit.php?id=" . $row["id"] . "'><button class='option-btn' style='background-color: deepskyblue!important;'>Edité</button></a>
                <button class='option-btn' style='background-color: red!important;'onclick='confirmDelect(". $row['id'] .")'>Supprimer</button>";
            }
            echo "</td>
                </tr>";
        }
    }
    echo "</tbody></table>";
}
?>

<script>
    function confirmDelect(id) {
        if (confirm("Voulez vous vraiment supprimer cet article ??") === true) {
            window.location="../requetes/chaussure/delete-chaussure.php?id=" + id;
        }
    }
</script>

<?php
include "../../chaussure/config/reset_messages.php";