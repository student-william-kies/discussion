<?php
$db = mysqli_connect('localhost', 'root', '', 'discussion');
session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location:connexion.php');
        exit();
    }

    if (isset($_SESSION['id'])){
        if (isset($_POST['modify'])){
            if (isset($_POST['newLogin']) && $_POST['newPassword'] === $_POST['newConfirmPassword']){
                $new_login = htmlspecialchars(trim($_POST['newLogin']));
                $unhashed_password = htmlspecialchars(trim($_POST['newPassword']));
                $new_ConfirmPassword = htmlspecialchars(trim($_POST['newConfirmPassword']));
                $session_id = $_SESSION['id'];

                $update_hashed_password = password_hash($unhashed_password, PASSWORD_BCRYPT);

                $update_user = mysqli_query($db, "UPDATE utilisateurs SET login = '$new_login', password = '$update_hashed_password' WHERE id = '$session_id'");

                if ($update_user){
                    $_SESSION['login'] = $new_login;
                    $_SESSION['password'] = $update_hashed_password;

                    echo '<section class="alert alert-success text-center" role="alert">Modification effectuée ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></section>';
                }
            }
            else{
                echo '<section class="alert alert-danger text-center" role="alert">Echec de la modification, réessayer ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></section>';
            }
        }
    }

?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Planet Chat | Profil</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/profil.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header -->
        <header>
            <nav>
                <section class="sidebar-container">
                    <section class="sidebar-logo"><?php if(isset($_SESSION['id'])){echo '<i class="fas fa-user-circle"></i> ' . $_SESSION['login'];} ?></section>
                    <ul class="sidebar-navigation">
                        <li class="header">Navigation</li>
                        <li id="home"><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li id="chat"><a href="discussion.php"><i class="fa fa-users" aria-hidden="true"></i> Chat</a></li>
                        <?php
                            if (!isset($_SESSION['id'])){
                                echo '<li id="connexion"><a href="connexion.php"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Connexion</a></li>';
                                echo '<li id="inscription"><a href="inscription.php"><i class="fas fa-registered" aria-hidden="true"></i> Inscription</a></li>';
                            }
                        ?>
                        <li id="profil"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Profil</a></li>
                        <?php if(isset($_SESSION['id'])){echo '<form method="POST" action="profil.php" style="margin-left: 15%; margin-top: 10%;"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';} ?>
                    </ul>
                </section>
            </nav>
        </header>

        <!-- Main -->
        <main>
            <article>
                <?php
                    if (isset($_SESSION['id'])){
                        $session_id = $_SESSION['id'];
                        $get_info = mysqli_query($db, "SELECT login FROM utilisateurs WHERE id =  $session_id");

                        $row = mysqli_fetch_assoc($get_info);

                        $inputLogin = $row['login'];

                        echo '
                        <section class="main-login">
                            <section class="container">
                                <section class="row">
                                    <section class="col-md-6">
                                        <form class="box" action="profil.php" method="post">
                                            <h1>Gestion du compte</h1>
                                            <p class="text-muted"> Gérer votre compte Planet Chat ici !</p>
                                            <input type="text" name="newLogin" placeholder="Login" value='."$inputLogin".' required>
                                            <input type="password" name="newPassword" placeholder="Password" required>
                                            <input type="password" name="newConfirmPassword" placeholder="Confirm Password" required>
                                            <input type="submit" name="modify" value="Modifier">
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
                        </section>';
                    }
                    else{
                        echo '
                        <section class="container-fluid elsecontain text-center">
                            <h1>Gestion du compte</h1>
                            <p>Un compte est nécessaire afin de modifier son profil, <a href="inscription.php">inscrit toi</a> ou <a href="connexion.php">connecte toi</a> sans plus attendre !</p>
                        </section>';
                    }
                ?>
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
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="#">Profil</a></li>
                    </ul>
                    <p style="margin-left: 33.1%;">Copyright @2020 | Designed By William KIES for <a href="#">Planet Chat.</a></p>
                </section>
            </section>
        </footer>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>