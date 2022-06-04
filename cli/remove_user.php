#!/usr/bin/php
<?php
require '../helper/connection.php';

$username = $argv[1];

$query = $pdo->prepare('DELETE FROM users WHERE username=:username');

$success = $query->execute([
    "username" => $username
]);

if($success){
    echo "L'utilisateur $username a été supprimé \n";
} else {
    $error = $query->errorInfo()[2];
    echo "Erreur : $error \n";
}