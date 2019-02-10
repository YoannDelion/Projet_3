<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/vue/css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">

    <!-- MENU -->
    <div class="row">
        <?php
        include_once __DIR__ . '/includes/menu.inc.vue.php';
        ?>
    </div>

    <header class="row articlesBanner" >
    </header>


        <section class="row">
            <div class="mx-auto col-sm-10 ">

                <h4>Les chapitres</h4>

                <?php
                if(isset($posts) && count($posts)>0) {
                    foreach ($posts as $post) {
                        ?>
                        <article class="post">
                            <h5><?= htmlspecialchars($post->getTitle()); ?></h5>
                            <p class="text-right">Publié le <?= date("d-m-Y à H:i", strtotime($post->getCreatedAt())); ?></p>
                            <p><?= strip_tags(html_entity_decode(mb_substr($post->getContent(), 0, 200))).'...'; ?></p>
                            <a href="chapitre?id=<?= $post->getId(); ?>" class="readMore">Lire la suite <span
                                        class="fas fa-arrow-right"></span></a>
                        </article>
                        <?php
                    }
                } else { ?>
                    <div class="alert alert-warning text-center mx-auto">
                        <b>Aucun article n'a été publié pour le moment !</b>
                    </div>
                    <?php
                }
                ?>
            </div>

        </section>
        <div class="row mb-4">
            <div class="mx-auto">
                <a class="submitBtn" href="/articles?page=<?= ($page-1); ?>"
                    <?php if ($page == 1) { echo 'hidden';}?> >
                    <i class="fas fa-chevron-left"></i>
                </a>
                <span class="submitBtn"><?= $page; ?></span>
                <a class="submitBtn" href="/articles?page=<?= ($page+1); ?>"
                    <?php if ($page == $nbPages) { echo 'hidden';}?> >
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>


    <?php
    include_once __DIR__ . '/includes/footer.inc.vue.php';
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
