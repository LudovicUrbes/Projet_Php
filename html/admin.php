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
    <h1>Inscription<h1>
     
    <form method="post" action="">
        <p>Question</p>
        <input type="text" name="question">
        <p>Réponse</p>
        <input type="text" name="reponse">
        <p>Détail réponse</p>
        <input type="text" name="detail">
        <p>Proposition 1</p>
        <input type="text" name="prop1">
        <p>Proposition 2</p>
        <input type="text" name="prop2">
        <p>Proposition 3</p>
        <input type="text" name="prop3">
        <p>Proposition 4</p>
        <input type="text" name="prop4">
        <p>Récompense</p>
        <input type="text" name="reward"><br><br>
        <input type="submit" name="submit" value="Valider">
    </form>
    
    <?php
      
        if (isset($_POST['submit']))
        {
            if(!empty($_POST['question']) and !empty($_POST['reponse']) and !empty($_POST['detail']) and !empty($_POST['prop1']) 
            and !empty($_POST['prop2']) and !empty($_POST['prop3']) and !empty($_POST['prop4']) and !empty($_POST['reward']))
            {
                include('../helper/connection.php');
                $query = $pdo->prepare("INSERT INTO questions (question, reponse, detail, prop1, prop2, prop3, prop4, reward) VALUES 
                (:question, :reponse, :detail, :prop1, :prop2, :prop3, :prop4, :reward)");
                $success = $query->execute([
                    'question' => $_POST['question'],
                    'reponse' => $_POST['reponse'],
                    'detail' => $_POST['detail'],
                    'prop1' => $_POST['prop1'],
                    'prop2' => $_POST['prop2'],
                    'prop3' => $_POST['prop3'],
                    'prop4' => $_POST['prop4'],
                    'reward' => $_POST['reward']
                ]);
                mysqli_close($pdo);
            }
            else echo "Veuillez saisir tous les champs !";
        echo "La question a bien été ajouté à la base de donnée\n";
        }
    ?>
</body>
</html>
