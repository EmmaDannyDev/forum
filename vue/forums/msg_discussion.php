<div class="container">
    <div class="row">

        <!-------- LIEN RETOUR AUX SUJETS TOP -------->
        <!-- <div class="col-md-6">
            <a href="index.php?menu=forums&categorie=<?php echo $_GET['categorie'];?>" class="retour_sujet"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Retour aux sujets</a>
        </div> -->

        <!-------- PAGINATION TOP -------->
        <!-- <div class="col-md-6">
            <?php include('../../vue/forums/pagination_msg_discussion.php'); ?>
        </div> -->

    </div>
</div>

<?php

    // -------- AFFICHAGE DE LA LISTE DES MESSAGES POUR UNE DISCUSSION --------
    include('../../vue/forums/affiche_message_discussion.php');

?>


<div class="container">
    <div class="row">

        <!-------- LIEN RETOUR AUX SUJETS BOTTOM -------->
        <div class="col-md-6">
            <a href="index.php?menu=forums&categorie=<?php echo $_GET['categorie'];?>" class="retour_sujet"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Retour aux sujets</a>
        </div>

        <!-------- PAGINATION BOTTOM -------->
        <div class="col-md-6">
            <?php  include('../../vue/forums/pagination_msg_discussion.php'); ?>
        </div>

    </div>
</div>
