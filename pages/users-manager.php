<?php
session_start();
if ($_SESSION['connected'] == null || $_SESSION['user_role'] !== "admin"){
header("Locatin:/chaussure/index.php");
exit();
}
include "../../chaussure/layout/header.php";
include "../../chaussure/config/connexion.php";

$_SESSION['redirect_to_after_request'] = $_SERVER['REQUEST_URI'];



$_SESSION['redirect_after_delete'] = $_SERVER['REQUEST_URI'];

echo "<div style='display: flex; margin-bottom: 30px'>
        <div style='padding-left: 20px'><span style='text-decoration: underline; font-size: 35px'>Liste des comptes client</span></div>";
if ($_SESSION['user_role'] == "admin") {
    echo "<div></div>";
}
echo "</div>";

$sql = "SELECT * FROM clients WHERE role NOT LIKE 'admin'";
$result_page = mysqli_query($connexion, $sql);

echo "<table class='table'>
        <thead>
            <th width='10%'>Identifiant</th>
            <th width='30%'>Pseudo</th>
            <th width='40%'>Email</th>
            <th width='16%'>+ de details</th>
        </thead>
        <tbody>";
if (mysqli_num_rows($result_page) > 0 ){
    while ($row = mysqli_fetch_assoc($result_page)){
        echo "<tr>
                <td c><b>". $row["id"] ."</b></td>
                <td>". $row["pseudo"] ."</td>
                <td>". $row["email"] ."</td>
                <td style='padding-top: 20px;'>
                    <button type='button' class='detail-btn' style='background-color: red'  onclick='confirmDelect(". $row['id'] .")'>Supprimer</button>
                </td>
                </tr>";
    }
}

echo "</tbody></table>";
?>

<script>
    function confirmDelect(id) {
        if (confirm("Voulez vous vraiment supprimer ce client ??") === true) {
            window.location="../requetes/delete-user.php?id=" + id;
        }
    }
</script>

<?php

include "../../chaussure/config/reset_messages.php";


