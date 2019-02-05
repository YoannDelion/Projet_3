<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/vue/css/admin.css" rel="stylesheet">
</head>

<body>

<!-- Menu -->
<?php
include_once __DIR__ . '/includes/adminMenu.inc.vue.php';
?>


<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once __DIR__ . '/includes/adminSidebar.inc.vue.php';
    ?>


    <div class="container-fluid">

        <h2>Bonjour <?= $_SESSION['identifiant']; ?> !</h2>

        <p>Il y a <b><?= $nbArticles; ?></b> articles publiés sur le site.</p>
        <p><b><?= $nbCommentaires; ?></b> commentaires ont été publiés par des visiteurs.</p>
        <?php
        if (isset($nbReports) && $nbReports>0) {
            if ($nbReports>1) { ?>
            <p><b><?= $nbReports; ?></b> sont signalés, vous devez les analyser.</p>
        <?php } else { ?>
                <p><b><?= $nbReports; ?></b> a été signalé, vous devez l'analyser.</p>
            <?php }
        } ?>
        <p>Rendez-vous sur le menu de gauche pour effectuer différentes actions sur le site !</p>

    </div>
    <!-- /.container-fluid -->


</div>
<!-- /#wrapper -->


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
