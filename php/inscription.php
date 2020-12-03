<?php
    /* Connexion a la base de données */
    $db = mysqli_connect('localhost', 'root', '', 'discussion');
    /* Démarrage de la session */
    session_start();

    /* Condition if qui permet de se créer un compte */
    if (isset($_POST['register'])){
        $login = mysqli_real_escape_string($db, htmlspecialchars(trim($_POST['login'])));
        $password = mysqli_real_escape_string($db, htmlspecialchars(trim($_POST['password'])));
        $confirm_password = mysqli_real_escape_string($db, htmlspecialchars(trim($_POST['confirmPassword'])));

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        if ($password === $confirm_password){

            $create_user = mysqli_query($db, "INSERT INTO utilisateurs(login, password) VALUES('$login', '$hashed_password')");

            header('location:connexion.php');
            exit();
        }
        else{
            echo '<section class="text-center alert alert-dark">Erreur ! Login/Mot de passe incorrect. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></section>';
        }
    }
    /* Condition if qui permet de vérifier l'id en base de données */
    $control_id = mysqli_num_rows(mysqli_query($db, 'SELECT * FROM utilisateurs'));

    if ($control_id == 0){
        mysqli_query($db, "ALTER TABLE utilisateurs AUTO_INCREMENT = 1");
    }

?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Planet Chat | Inscription</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/inscription.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
    <!-- Header -->
        <header>
            <nav>
                <section class="sidebar-container">
                    <section class="sidebar-logo"></section>
                    <ul class="sidebar-navigation">
                        <li class="header">Navigation</li>
                        <li id="home"><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li id="chat"><a href="discussion.php"><i class="fa fa-users" aria-hidden="true"></i> Chat</a></li>
                        <li id="connexion"><a href="connexion.php"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Connexion</a></li>
                        <li id="inscription"><a href="#"><i class="fas fa-registered" aria-hidden="true"></i> Inscription</a></li>
                        <li id="profil"><a href="profil.php"><i class="fa fa-cog" aria-hidden="true"></i> Profil</a></li>
                    </ul>
                </section>
            </nav>
        </header>

        <!-- Main -->
        <main>
            <article>
                <section class="main-login">
                    <section class="container">
                        <section class="row">
                            <section class="col-md-6">
                                <form class="box" action="inscription.php" method="post">
                                    <h1>Inscription</h1>
                                    <p class="text-muted"> Créer votre compte gratuitement sur Planet Chat !</p>
                                    <input type="text" name="login" placeholder="Login" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                                    <input type="submit" name="register" value="S'inscrire">
                                    <section class="col-md-12">
                                        <ul class="social-network social-circle">
                                            <p class="text-muted"> Retrouvez nous sur nos réseaux !</p>
                                            <li><a class="icoFacebook" href="https://www.facebook.com/planet.chat2077" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a class="icoTwitter" href="https://www.twitter.com/planet.chat" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a class="icoLinkedin" href="https://www.linkedin.com/planet.chat" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a class="icoInstagram" href="https://www.instagram.com/planet.chat2077" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </section>
                                </form>
                            </section>
                        </section>
                    </section>
                </section>
            </article>
        </main>

        <!-- Footer -->
        <footer>
            <section class="footer">
                <section class="container">
                    <ul class="footer_ul">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="discussion.php">Chat</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                        <li><a href="#">Inscription</a></li>
                        <li><a href="profil.php">Profil</a></li>
                    </ul>
                    <p class="text-center">Copyright @2020 | Designed By William KIES for <a href="#">Planet Chat.</a></p>
                </section>
            </section>
        </footer>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>