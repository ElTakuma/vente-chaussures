<?php
session_start();

$url = $_SESSION['redirect_after_login'];

session_unset();

session_destroy();

header("Location:/chaussure/index.php");