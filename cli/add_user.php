#!/usr/bin/php
<?php
require '../helper/connection.php';

$username = $argv[1];
$role = $argv[2];

$password = readline("mot de passe : ");

$query = $pdo->prepare('INSERT INTO users  (username, password, role) VALUES (:username, :password, :role)');

$success = $query->execute([
    "id" => $id,
    "username" => $username,
    "password" => $password,
    "role" => $role
]);

if($success){
    echo "L'utilisateur $username a été créé \n";
} else {
    $error = $query->errorInfo()[2];
    echo "Erreur : $error \n";
}