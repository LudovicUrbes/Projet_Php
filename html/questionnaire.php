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
        $reponse = $pdo->query('SELECT id, question, prop1, prop2, prop3, prop4  FROM questions ORDER BY RAND() LIMIT 1');
        while ($donnees = $reponse->fetch())
        {
            echo $donnees['question'] . '<br />';
            echo $donnees['prop1'] . '<br />';
            echo $donnees['prop2'] . '<br />';
            echo $donnees['prop3'] . '<br />';
            echo $donnees['prop4'] . '<br />';
        }
    ?>

    <?php 

        include('../helper/connection.php');
        $query = $pdo->query('SELECT id, question, reponse prop1, prop2, prop3, prop4  FROM questions ORDER BY RAND() LIMIT 1');
        $success = $query->execute([
            'id' => $_POST['id'],
            'question' => $_POST['question'],
            'reponse' => $_POST['reponse'],
            'prop1' => $_POST['prop1'],
            'prop2' => $_POST['prop2'],
            'prop3' => $_POST['prop3'],
            'prop4' => $_POST['prop4'],
        ]);
        mysqli_close($pdo);
    ?>
</body>
</html>



