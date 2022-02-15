<?php

if (isset($_GET['ctgr'])) {
    include "../../chaussure/config/connexion.php";

    $cat = $_GET['ctgr'];
    $sql = "SELECT * FROM articles WHERE categorie LIKE '$cat'";

    $resultFilter = mysqli_query($connexion, $sql);
}