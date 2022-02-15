<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le coin de la chaussure!!</title>
    <link rel="stylesheet" href="../../chaussure/css/style.css">

</head>
<body>
<div class="body-head">
    <h1 style="color: white">Le coin de la chaussure!!</h1>
    <div style="display: inline-grid">
        <div class="menu">
            <a href="../../chaussure/index.php">
                <div>Home</div></a>
            <a href="../../chaussure/pages/customListe.php?ctgr=basket">
                <div>Baskets</div></a>
            <a href="../../chaussure/pages/customListe.php?ctgr=mocassin">
                <div>Mocassins</div></a>
            <a href="../../chaussure/pages/customListe.php?ctgr=richelieu">
                <div>Richelieu</div></a>
            <div class="menu_dropdown">
                <span>+ de choix &#9662;</span>
                <a href="../../chaussure/pages/customListe.php?ctgr=airmax">
                    <div class="menu_dropdown_content">
                        Airmax
                    </div></a>
                <a href="../../chaussure/pages/customListe.php?ctgr=airmax">
                    <div class="menu_dropdown_content">
                        Cebago
                    </div></a>
            </div>
        </div>
        <div style="position: absolute; right: 5%;">
            <?php
            include "../../chaussure/config/session.php";
            if ($_SESSION['connected']):
                ?>
                <div class='profil_dropdown'>
                    <span class='detail-btn'> <?=   $_SESSION['user_pseudo'] ?> &#9662;</span>
                    <div class='profil_dropdown_content'>
                        <a href='../../chaussure/pages/user_update_form.php'>
                                Editer informations
                        </a>
                        <?php if ($_SESSION['user_role'] === "admin"): ?>
                        <hr>
                        <a href='../../chaussure/pages/users-manager.php'>
                                Gestion Clients
                        </a>
                        <?php endif; ?>
                        <hr>
                        <a href='../../chaussure/config/logout.php'>
                                Deconnexion
                        </a>
                    </div>
                </div>
            <?php else:
                echo "<a class='detail-btn' href='../../chaussure/pages/login_form.php'> Connexion !!</a>";
            endif;
            ?>
        </div>
    </div>

</div>
<?php
include "../../chaussure/config/messages.php";
?>
<!--<i class="fa fa-cloud"></i> fa-lg-->