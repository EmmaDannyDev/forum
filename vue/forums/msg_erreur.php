<?php 

    function msg_erreur_connexion()
    {
        ?>
            <div class="container">
                <div class="alert alert-danger col-md-8 col-md-offset-2 text-center" role="alert">
                    <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Veuillez verifier vos identifiants
                </div>
            </div>
        <?php
    }

    function msg_erreur_session()
    {
        ?>
            <div class="container">
                <div class="alert alert-danger col-md-8 col-md-offset-2 text-center" role="alert">
                    <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Veuillez vous connecter au site pour accéder au service.
                </div>
            </div>
        <?php
    }

    function msg_erreur_inscription()
    {
        ?>
            <div class="container">
                <div class="alert alert-danger col-md-8 col-md-offset-2 text-center" role="alert">
                    <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Ce Pseudo est déja utilisé, veuillez en choisir un autre.
                </div>
            </div>
        <?php
    }

    function msg_erreur_ajout_discussion_and_message()
    {
        ?>
            <div class="container">
                <div class="alert alert-danger col-md-8 col-md-offset-2 text-center" role="alert">
                    <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Votre message ne dois pas être vide.
                </div>
            </div>
        <?php
    }
 
?>