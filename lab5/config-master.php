<?php
$host = "project-rds-mysql-prod.cz2mgu6u6cca.eu-central-1.rds.amazonaws.com"; 
$user = "admin";
$pass = "Nikitaqweasdzxc123";
$db   = "project_db";

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
