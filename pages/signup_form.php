<?php
include "../../chaussure/config/session.php";
//session_start();
$_SESSION['redirect_to_signup'] = $_SERVER['REQUEST_URI'];

?>
<link rel="stylesheet" href="../../chaussure/css/login.css">
<body>
<div>
    <div style="margin: auto; width: 350px; text-align: center; padding: 20px">
        <h1>Cree un compte</h1>
    </div>
    <div class="container">
        <form method="post" action="../../chaussure/config/signup.php">
            <?php if ($_SESSION['signup_pseudo_error'] != null): echo "<div style='width: 95%; color: red; padding: 10px; background-color: rgba(255,0,0, 0.05); border: 1px red outset; margin-bottom: 15px'>"
                . $_SESSION['signup_pseudo_error'] ."</div>";  endif; ?>

            <?php if ($_SESSION['signup_email_error'] != null): echo "<div style='width: 95%; color: red; padding: 10px; background-color: rgba(255,0,0, 0.05); border: 1px red outset; margin-bottom: 15px'>"
                . $_SESSION['signup_email_error'] ."</div>";  endif; ?>

            <div>
                <span>Pseudo</span>
                <input type="text" name="pseudo" placeholder="pseudo" class="form-input">
            </div>
            <div>
                <span>Email</span>
                <input type="email" name="email" placeholder="Email" class="form-input">
            </div>
            <br>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-input">
            </div>
            <div>
                <button type="submit" class="detail-btn">S'inscrire</button>
            </div>
        </form>
    </div>
<?php include "../../chaussure/config/reset_messages.php"; ?>
</div>
</body>
