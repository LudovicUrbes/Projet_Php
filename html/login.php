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
    <div class="pure-u-7-8">
            <div class="container">
                <?php if(isset($_POST['username']) && isset($_POST['password'])){ 
                    include('../helper/connection.php');
                    $query = $pdo->prepare('SELECT password FROM users WHERE username=:username');

                    $success = $query->execute([
                        "username" => $_POST['username']
                    ]);
                    $user = $query->fetch(PDO::FETCH_ASSOC);
                    if($user){
                        if($_POST['password'] === $user['password']){
                            $_SESSION['logon'] = true;
                        } else {
                            echo "username/password erroné"; 
                        }
                    } else {
                        echo "username/password erroné"; 
                    }
                
                $_SESSION['username']=$_POST['username'];
                sleep(1);
                header('Location: /login.php');   
                }?>

                <?php if(isset($_SESSION['logon']) && $_SESSION['logon'] === true): ?> 
                    <p>
                        Bienvenue sur Quizz R&T :<br> <br>
                        Votre nom d'utilisateur est <?php echo $_SESSION['username'] ?>. <br>
                        A vous de jouez pour devenir le plus fort :) <br>
                        Bonne chance !! 
                    </p>
                <?php else: ?>

                <h2>Connexion </h2>
                <form class="pure-form pure-form-aligned" action="/login.php" method="post">
                    <fieldset>
                        <div class="pure-control-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" name="username" placeholder="username" />
                        </div>
                        <div class="pure-control-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" placeholder="password" />
                        </div>
                        <div class="pure-controls">
                            <button type="submit" class="pure-button pure-button-primary">Connexion</button>
                        </div>
                    </fieldset>
                </form>
                <div class="pure-controls">
                    <button class="pure-button pure-button-primary"> <a href="/inscription.php"> Inscription </a></button>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</body>
</html>
