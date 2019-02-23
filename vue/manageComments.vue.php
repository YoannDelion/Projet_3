<?php
include_once __DIR__ . '/includes/headerHTML.inc.vue.php';
?>

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

    <div class="container">
        <h3>Commentaires signalés</h3>
        <div class="row">
            <?php if (isset($erreur)) :
                echo '<div class="alert alert-danger text-center mx-auto" style="font-size: large"><b>' . $erreur . '</b></div>';
            elseif (isset($success)) :
                echo '<div class="alert alert-success text-center mx-auto" style="font-size: large"><b>' . $success . '</b></div>';
            endif; ?>
        </div>
        <div class="row">
            <?php if (isset($reports) && count($reports) > 0) :
                foreach ($reports as $report) :
                    ?>
                    <div class="card col-6 col-sm-3">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Signalé le
                                : <?= date("d-m-Y à H:i", strtotime($report->getCreatedAt())); ?></h6>
                            <p class="card-text"><?= htmlspecialchars($report->getComment()); ?></p>
                            <a href="/manageComments?action=valider&id=<?= $report->getId(); ?>"
                               class="btn btn-primary">Valider</a>
                            <a href="/manageComments?action=supprimer&id=<?= $report->getId(); ?>"
                               class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                <?php endforeach;
            else : ?>
                <div class="alert alert-primary text-center mx-auto">
                    <b>Aucun commentaire n'a été signalé !</b>
                </div>
            <?php endif; ?>

        </div>


    </div>
    <!-- /.container -->


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