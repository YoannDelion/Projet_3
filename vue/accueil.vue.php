<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Home</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <header class="row accueilBanner">
        <div class="headerTitle">
            <div class="title col-sm-8 mx-auto">
                <h1 class="mt-2">BILLET SIMPLE POUR L' ALASKA</h1>
                <h2>Jean FORTEROCHE</h2>
            </div>
            <div class='bandeau mx-auto'></div>
            <div class="col-sm-6 mx-auto subtitle">
                <div class="center-block">
                    <a href="#content"><h3>Derniers chapitres</h3></a>
                    <a href="articles.vue.php"><h3>Tous les chapitres</h3></a>
                    <a href="connexion.vue.php"><h3>Connexion</h3></a>
                </div>
            </div>

        </div>
    </header>

    <div id="content" class="row content">
        <section class="col-sm-9 ">
            <h4>Les derniers chapitres publiés</h4>
            <article class="post">
                <h5>Titre du chapitre</h5>
                <p class="text-right">Publié le 19/11/2018</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="chapitre.vue.php" class="readMore">Lire la suite <span class="fas fa-arrow-right"></span></a>
            </article>

            <article class="post">
                <h5>Titre du chapitre</h5>
                <p class="text-right">Publié le 19/11/2018</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="chapitre.vue.php" class="readMore">Lire la suite <span class="fas fa-arrow-right"></span></a>
            </article>

            <article class="post">
                <h5>Titre du chapitre</h5>
                <p class="text-right">Publié le 19/11/2018</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="chapitre.vue.php" class="readMore">Lire la suite <span class="fas fa-arrow-right"></span></a>
            </article>

            <div class="text-center">
                <a href="articles.vue.php" class="readMore">Lire tous les articles</a>
            </div>

        </section>
        <section class="col-sm-3">
            <h4>A propos de l'auteur</h4>
            <aside>
                <img src="https://usatftw.files.wordpress.com/2017/05/spongebob.jpg?w=1000&h=600&crop=1"
                     alt="Jean Forteroche, auteur de Billet Simple pour l'Alaska" height="160" width="170"
                     class="mx-auto d-block">
                <h5>Jean Forteroche</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</p>
            </aside>
            <h4>Réseaux sociaux</h4>
            <aside id="social">
                    <span id="facebook" class="socialLink">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </span>
                <span id="twitter" class="socialLink">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </span>
                <span id="instagram" class="socialLink">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </span>
                <span id="linkedin" class="socialLink">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </span>
            </aside>
        </section>
    </div>

    <?php
    include_once 'includes/footer.inc.vue.php';
    ?>

</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
