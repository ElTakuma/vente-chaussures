

<?php
include "../../chaussure/config/session.php";
include "../../chaussure/config/connexion.php";
//session_start();
$_SESSION['redirect_to_signup'] = $_SERVER['REQUEST_URI'];

if ($_SESSION['user_id'] !== null):
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = $id";
    $r = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($r) == 1):
        $client = mysqli_fetch_assoc($r);
?>
        <link rel="stylesheet" href="../../chaussure/css/login.css">
        <body>
        <div>
            <div style="margin: auto; width: 350px; text-align: center; padding: 20px">
                <h1>Modifiez vos information</h1>
            </div>
            <div class="container">
                <form method="post" action="../../chaussure/requetes/update_user.php">
                    <?php if ($_SESSION['signup_pseudo_error'] != null): echo "<div style='width: 95%; color: red; padding: 10px; background-color: rgba(255,0,0, 0.05); border: 1px red outset; margin-bottom: 15px'>"
                        . $_SESSION['signup_pseudo_error'] ."</div>";  endif; ?>

                    <?php if ($_SESSION['signup_email_error'] != null): echo "<div style='width: 95%; color: red; padding: 10px; background-color: rgba(255,0,0, 0.05); border: 1px red outset; margin-bottom: 15px'>"
                        . $_SESSION['signup_email_error'] ."</div>";  endif; ?>

                    <div>
                        <span>Pseudo</span>
                        <input type="text" name="pseudo" placeholder="pseudo" class="form-input" value="<?= $client['pseudo'] ?>" readonly required>
                        <input type="hidden" name="id" placeholder="id" class="form-input" value="<?= $client['id'] ?>" required>
                    </div>
                    <div>
                        <span>Email</span>
                        <input type="email" name="email" placeholder="Email" class="form-input"  value="<?= $client['email'] ?>" required>
                    </div>
                    <br>
                    <div>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-input" value="" required>
                    </div>
                    <div>
                        <button type="submit" class="detail-btn">Modifier</button>
                        <button type="button" class="detail-btn" style="background-color: #eeeeee!important; color: black" onclick="window.location='../index.php'">Annuler</button>
                    </div>
                </form>
            </div>
            <?php include "../../chaussure/config/reset_messages.php"; ?>
        </div>
        </body>

    <?php
    endif; endif;
        ?>