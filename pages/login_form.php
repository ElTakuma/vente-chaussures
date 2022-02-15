<?php
include "../../chaussure/config/session.php";
//session_start();
$_SESSION['redirect_to_onError'] = $_SERVER['REQUEST_URI'];
echo $_SESSION['connected'];
?>
<head>
    <title>Connexion !</title>
    <link rel="stylesheet" href="../../chaussure/css/login.css">
</head>

<body>
<div>
    <div style="margin: auto; width: 350px; text-align: center; padding: 20px">
        <h1>Connexion</h1>
    </div>
    <div class="container">
        <form method="post" action="../../chaussure/config/login.php">
            <?php if ($_SESSION['login_error'] != null): echo "<div style='width: 95%; color: red; padding: 10px; background-color: rgba(255,0,0, 0.05); border: 1px red outset; margin-bottom: 15px'>"
                . $_SESSION['login_error'] ."</div>";  endif; ?>
            <?php if ($_SESSION['login_info'] != null): echo "<div style='width: 95%; color: green; padding: 10px; background-color: rgba(0,255,0, 0.05); border: 1px green outset; margin-bottom: 15px'>"
                . $_SESSION['login_info'] ."</div>";  endif; ?>

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
                <button type="submit" class="detail-btn">Connexion</button>
            </div>
        </form>
        <div style="text-align: right">
            <a href="../../chaussure/pages/signup_form.php">Cree un compte</a>
        </div>
    </div>
<?php include "../../chaussure/config/reset_messages.php"; ?>
</div>
</body>
