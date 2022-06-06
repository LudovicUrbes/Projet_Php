<?php require '../helper/head.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css" />
</head>
<body>
    <h1 class="noir">Inscription<h1> 
     
        <form method="post" action="inscription.php">
            <p>________________________</p>
            <p>Nom d'utilisateur</p>
            <input type="text" name="username">
            <p>________________________</p>
            <p>Mot de passe</p>
            <input type="password" name="password">
            <p>________________________</p>
            <p>Répetez votre mot de passe</p>
            <input type="password" name="repeatpassword"><br><br>
            <input type="submit" name="submit" value="Valider">
        </form>
   
    <?php
  
        if (isset($_POST['submit']))
        {
            if(!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['repeatpassword']))
            {
                if (strlen($_POST['password'])>=6)
                {
                    if ($_POST['password']==$_POST['repeatpassword'])
                    {
                        include('../helper/connection.php');
                        $query = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
                        $success = $query->execute([
                            'username' => $_POST['username'],
                            'password' => $_POST['password']
                        ]);
                    mysqli_close($pdo);
                    sleep(2);
                    header('Location: /login.php');
                    die();
                    }
                    else echo '<span style="color:#000000;"> <big> Les mots de passe ne sont pas identiques </big> </span>';
                }
                else echo '<span style="color:#000000;"> <big> Le mot de passe est trop court ! </big> </span>';
            }
            else echo '<span style="color:#000000;"> <big> Veuillez saisir tous les champs ! </big> </span>';
        }
    ?>

</body>
</html>
    