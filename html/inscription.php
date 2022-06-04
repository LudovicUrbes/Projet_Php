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
            <p>Username</p>
            <input type="text" name="username">
            <p>Password</p>
            <input type="password" name="password">
            <p>Répetez votre password</p>
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
                    echo "L'utilisateur a bien été créé vous pouvez désormais vous connecter \n";
                    sleep(2);
                    header('Location: /login.php');
                    die();
                    }
                    else echo "Les mots de passe ne sont pas identiques";
                }
                else echo "Le mot de passe est trop court !";
            }
            else echo "Veuillez saisir tous les champs !";
        }
    ?>

</body>
</html>
    