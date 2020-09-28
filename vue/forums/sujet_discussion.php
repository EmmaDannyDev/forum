<div class="container well">

    <div class="row">

        <!-- Soit On peux ajouter une discussion, soit il y a un message d'erreur -->
        <?php
            $get_categorie = (isset($_GET['categorie'])?$_GET['categorie']:'');
            $url_new_sujet = (isset($_SESSION['pseudo']))?'?menu=ajout_discussion&categorie='.$get_categorie:'?menu=forums&categorie='.$get_categorie.'&msg=msg_erreur_session';
        ?>

        <!-- Lien Nouvelle Discussion -->
        <div class="col-md-2">
            <a href="index.php<?php echo $url_new_sujet;?>"><img src="../../vue/forums/img/icon.svg" alt="Nouvelle Discussion"/></a>
            <a href="index.php<?php echo $url_new_sujet;?>">Nouvelle Discusison</a>
        </div>

    </div>

    <!-- Ligne de séparation -->
    <hr class="hr_separation_filtrage_discussion">

    <div class="row" id="block_filtrage">

        <!-- Formulaire de filtrage -->
        <?php include('../../vue/forums/form_filtrage_discussion.php'); ?>

    </div>

</div>

<!-- Titre de la Categorie Filtrer -->
<?php
    foreach($liste_cat as $cat)
    {
        if($cat['id'] == $_GET['categorie'])
        {
            echo
            '
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-4">
                            <h1>'.$cat['nomCategorie'].'</h1>
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>

<!-- Tableau des discussions -->
<?php include('../../vue/forums/affiche_discussion.php'); ?>

<!-- Pagination -->
<?php include('../../vue/forums/pagination_discussion.php'); ?>
