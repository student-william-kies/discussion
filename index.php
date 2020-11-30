<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Planet Chat</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <header>
            <nav>
                <section class="sidebar-container">
                    <section class="sidebar-logo">Discussion</section>
                    <ul class="sidebar-navigation">
                        <li class="header">Navigation</li>
                        <li id="home"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li id="chat"><a href="php/discussion.php"><i class="fa fa-users" aria-hidden="true"></i> Chat</a></li>
                        <li id="connexion"><a href="php/connexion.php"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Connexion</a></li>
                        <li id="inscription"><a href="php/inscription.php"><i class="fas fa-registered" aria-hidden="true"></i> Inscription</a></li>
                        <li id="profil"><a href="php/profil.php"><i class="fa fa-cog" aria-hidden="true"></i> Profil</a></li>
                    </ul>
                </section>
            </nav>
        </header>

        <main>
            <article>
                <section class="container-fluid main-info-section text-center">
                    <h1>Planet<br />Chat</h1>
                    <section class="container link-info">
                        <a class="who-link" href="#who">Qui sommes-nous ?</a>
                        <p class="distinct-link">-</p>
                        <a class="services-link" href="#services">Nos services</a>
                    </section>
                    <img src="images/planet.gif" id="planet_gif" alt="Planet Gif">
            </article>
        </main>

        <section class="container-fluid who-section text-center" id="who">
            <h1>Qui sommes-nous ?</h1>
            <section class="container who-info">
                <p>Entreprise inter-galactique créée tout récemment, nous mettons à disposition des différents univers une possibilitée de discuter les uns avec les autres sans
                prendre en compte la distance qui vous sépare !<br /><br /> Vous êtes Terrien, et vous avez de la famille ou des amis sur d'autres planètes ? Alors nous sommes là pour vous !
                Discutez grâce à nos 200To de <b>Nano-Fibres spatiale</b> créés par nos soins ! En plus de vous offrir une fibre de qualité, nous proposons nos services gratuitement !<br /><br />
                N'hésitez plus, créez sans plus attendre un compte tout droit sorti de l'espace !</p>
            </section>
            <section class="container who-img">
                <img src="images/detail-sattelit.svg" id="sattelit" alt="Explication schématique">
                <p>(<i>Grâce à la Nano-fibre spatiale, plus besoin de se soucier de la distance !</i>).</p>
            </section>
        </section>

        <section class="container-fluid services-section text-center" id="services">
            <h1>Nos services</h1>
            <section class="progress-section">
                <section class="container">
                    <section class="row">
                        <section class="col-md-3">
                            <h1>Confiance</h1>
                            <section class="progress-bars">
                                <h2>100%</h2>
                            </section>
                        </section>
                        <section class="col-md-3">
                            <h1>fiabilité</h1>
                            <section class="progress-bars-two">
                                <h2>98%</h2>
                            </section>
                        </section>

                        <section class="col-md-3">
                            <h1>Rapidité</h1>
                            <section class="progress-bars-three">
                                <h2>94%</h2>
                            </section>
                        </section>

                        <section class="col-md-3">
                            <h1>Sécurité</h1>
                            <section class="progress-bars-four">
                                <h2>99.9%</h2>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>

        <footer>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>