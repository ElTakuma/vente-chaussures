<?php
include "config/connexion.php";

$sql = "SELECT * FROM articles";

/**
 * Execuxion de la requete $sql
 **/
$result_get_all = mysqli_query($connexion, $sql);

