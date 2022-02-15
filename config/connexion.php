<?php
/**
 * Connexion a la base de donnee chaussures
 */
$connexion = mysqli_connect("localhost", "root", "", "chaussures");

// Teste is erreur de connexion
if($connexion->connect_error) die("Erreur de connection: " . mysqli_connect_error());

