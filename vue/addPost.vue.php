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
        <h3>Publier un chapitre</h3>
        <form class="mt-4" action='/addPost' method="post">
            <?php if (isset($erreursForm['insertion'])) :
                echo '<div class="alert alert-danger mx-auto text-center" style="font-size: large"><b>' . $erreursForm['insertion'] . '</b></div>';
            elseif (isset($erreursForm['success'])) :
                echo '<div class="alert alert-success mx-auto text-center" style="font-size: large"><b>' . $erreursForm['success'] . '</b></div>';
            endif; ?>
            <div class="form-group ">
                <label class="control-label " for="title">Titre du chapitre</label>
                <input class="form-control <?php if (isset($erreursForm['title'])) :
                    echo ' erreur-form';
                endif; ?>" id="title" name="title" type="text"
                       required <?php if (isset($_POST['title'])) :
                    echo 'value="' . htmlspecialchars($_POST['title']) . '"';
                endif; ?>/>
                <?php
                if (isset($erreursForm['title'])) :
                    echo '<p class="erreur-text"> ' . $erreursForm['title'] . '</p>';
                endif; ?>
            </div>
            <div class="form-group ">
                <label class="control-label" for="tinyMCE">Contenu</label>
                <textarea class="form-control <?php if (isset($erreursForm['content'])) :
                    echo ' erreur-form';
                endif; ?>" id="tinyMCE" name="content"><?php if (isset($_POST['content'])) :
                        echo htmlspecialchars($_POST['content']);
                    endif; ?></textarea>
                <?php
                if (isset($erreursForm['content'])) :
                    echo '<p class="erreur-text"> ' . $erreursForm['content'] . '</p>';
                endif; ?>
            </div>
            <div class="form-group">
                <div>
                    <button class="btn btn-primary" name="envoyer" value="envoyer" type="submit">
                        Publier le chapitre
                    </button>
                </div>
            </div>
        </form>

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