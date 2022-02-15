<?php
include "../config/connexion.php";

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

/**
 * Get number of rows
 */
$sql = "SELECT id FROM articles";

$req = mysqli_query($connexion,$sql);

if ($req !== false) {
    $result_total_row = $req->num_rows;
}
else {
    $result_total_row = 0;
}
//echo $result_total_row;

/**
 * Check if there is a custom number of rows in page. if not, take 25 by page
 */
if (isset($_GET['b_p']) && !empty($_GET['b_p'])){
    $by_page = $_GET['b_p'];
} else {
    $by_page = 20;
}

/**
 * Define the number of page to paginate
 */
$nbr_pages = ceil($result_total_row / $by_page);

/**
 * Get the first element of the page
 */
$first = ($currentPage * $by_page) - $by_page;

/**
 * Selecting rows by limiting the interval for pagination
 */
$sql = "SELECT * FROM articles ORDER BY 'id' DESC LIMIT ".$first.", ".$by_page.";";
$result_page = mysqli_query($connexion, $sql);


