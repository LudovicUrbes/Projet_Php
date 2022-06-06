<?php require '../helper/head.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
        include('../helper/connection.php');
        $reponse = $pdo->query("SELECT username, score FROM users WHERE is_published= 1 ORDER BY score DESC");
        while ($donnees = $reponse->fetch())
    {
        echo '<span style="color:#FFFFFF;"> <big> Utilisateur : '.$donnees['username'] . ' </big> </span> <br/>';
        echo '<span style="color:#FFFFFF;"> <big> Score : '.$donnees['score'] . ' </big> </span> <br/> <br/>';
    }
    $reponse->closeCursor();
    ?>
</body>
</html>
