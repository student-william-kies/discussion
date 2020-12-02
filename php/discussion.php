<?php
$db = mysqli_connect('localhost', 'root', '', 'discussion');
session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location:connexion.php');
        exit();
    }

    date_default_timezone_set('UTC');

    if (isset($_POST['send'])){
        $chat = htmlspecialchars(trim($_POST['new_chat']), ENT_QUOTES);
        $user_id = $_SESSION['id'];
        $date_chat = date("Y-m-j H:i:s");

        $create_chat = mysqli_query($db,"INSERT INTO messages(message, id_utilisateur, date) VALUES ('" . mysqli_real_escape_string($db, $chat) . "', '" . mysqli_real_escape_string($db, $user_id) . "', '" . mysqli_real_escape_string($db, $date_chat) . "')");
    }

?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Planet Chat | Chat</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/discussion.css">
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
                        <li id="chat"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Chat</a></li>
                        <?php
                        if (!isset($_SESSION['id'])){
                            echo '<li id="connexion"><a href="connexion.php"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Connexion</a></li>';
                            echo '<li id="inscription"><a href="inscription.php"><i class="fas fa-registered" aria-hidden="true"></i> Inscription</a></li>';
                        }
                        ?>
                        <li id="profil"><a href="profil.php"><i class="fa fa-cog" aria-hidden="true"></i> Profil</a></li>
                        <?php if(isset($_SESSION['id'])){echo '<form method="POST" action="discussion.php" style="margin-left: 15%; margin-top: 10%;"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';} ?>
                    </ul>
                </section>
            </nav>
        </header>

        <!-- Main -->
        <main>
            <article>
                <section class="container-fluid text-center main-chat">
                    <h1>Chat</h1>
                    <section class="container text-center box-chat scrollbar scrollbar-morpheus-den">
                        <?php
                            if (isset($_SESSION['id'])){
                                $check_chat = mysqli_query($db, "SELECT u.login, m.date, m.message FROM utilisateurs AS u INNER JOIN messages AS m WHERE m.id_utilisateur = u.id");

                                while($chat_list = mysqli_fetch_assoc($check_chat)){
                                    echo '<table><tr style="text-align: left;"><td><b>' . htmlspecialchars($chat_list['login']) . '</b></td></tr><br /><tr><td>' . html_entity_decode($chat_list['message']) . '</td></tr></table>';
                                }
                            }
                            else{
                                echo 'A MODIFIER';
                            }
                        ?>
                    </section>
                    <section class="container form-chat">
                        <?php
                            if (isset($_SESSION['id'])){
                                echo '
                                <form action="discussion.php" method="post">
                                <section class="panel-footer">
                                    <section class="input-group">
                                        <input id="btn-input" type="text" class="form-control input-sm chat_input" name="new_chat" placeholder="Message..." required />
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" id="btn-chat" name="send" style="margin-left: 10%;"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                                    </span>
                                    </section>
                                </section>
                            </form>';
                            }
                        ?>
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
                        <li><a href="#">Chat</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="profil.php">Profil</a></li>
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