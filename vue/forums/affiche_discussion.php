<div class="container panel" id="block_discussion">


    <!-------- ENTETE DU TABLEAU DES DISCUSSIONS -------->

    <div class="row panel-heading header_discussion_message">
        <div class="col-md-4">DISCUSSIONS</div>
        <div class="col-md-1">REPONSE</div>
        <div class="col-md-1">VUES</div>
        <div class="col-md-4">DERNIERE REPONSE</div>
        <div class="col-md-2">ETAT</div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php


                // -------- AFFICHAGE DES DISCUSSIONS DE LA PAGE COURANTE --------

                for($i = 0; $i<count($elementsPage); $i++)
                {
                    $nbre_reponse = nbre_reponse($cnx,$elementsPage[$i]['id']);
                    $dernier_post = infos_message($cnx,$elementsPage[$i]['id']);
                    $nbre_vues = nbre_vue($cnx,$elementsPage[$i]['id']);


                    ?>

                        <div class="container-fluid row liste_discussion">
                            <div class="col-md-4">

                                <!-- Titre de la discussion -->
                                <a href="index.php?menu=msg_discussion&categorie=<?php echo $_GET['categorie']; ?>&id=<?php echo $elementsPage[$i]['id']; ?>"><?php echo $elementsPage[$i]['sujet']; ?></a>

                                <br>

                                <!-- Auteur + Date Discussion -->
                                <cite>par <strong><?php echo $elementsPage[$i]['pseudo']; ?></strong> » <?php echo $elementsPage[$i]['date']; ?></cite>

                            </div>
                            <div class="col-md-1 center_reponse">

                                <!-- Nombre de Réponse -> Rouge si < 0 ; Vert si > 0 -->
                                <span style="<?php echo ($nbre_reponse['reponse']== 0?'color: red;':'color: green;'); ?>"> <?php echo $nbre_reponse['reponse']; ?></span>

                            </div>

                            <!-- Nombre de Vue -->
                            <div class="col-md-1 center_vue "><?php echo $nbre_vues['vues']; ?></div>

                    <?php


                    // -------- IF -> AFFICHAGE DERNIERE REPONSE -- ELSE -> AFFICHE "Aucune" --------

                    if($nbre_reponse['reponse']>=1)
                    {
                        echo '<div class="col-md-4"><cite>par <strong>'.$dernier_post[$nbre_reponse['reponse']]['pseudo'].' </strong><br>'.$dernier_post[$nbre_reponse['reponse']]['date_message'].'</cite></div>';
                    }

                    else
                    {
                        echo '<div class="col-md-4">Aucune</div>';
                    }
                    ?>
                            <div class="col-md-2">

                                <?php

                                    //Affichage du boutton supprimer si Modérateur
                                    if(isset($_SESSION['moderateur']) and $_SESSION['moderateur'] == 1)
                                    {
                                        // Boutton supprimer MODERATEUR
                                        echo
                                        '
                                            <form action="index.php?menu=forums&categorie='.$_GET['categorie'].'" method="POST" onsubmit="return confirm(\'Etes vous sûr de vouloir supprimer cette discussion ?\')">
                                                <input type="hidden" name="supp_discussion" value="'.$elementsPage[$i]['id'].'"/>
                                                <input type="submit" class="btn btn-danger" value="Supprimer"/>
                                            </form>

                                            <br>
                                        ';
                                    }

                                    //Etat de la discussion
                                    echo ($elementsPage[$i]['etat'] == 0?'Pas encore résolue':'<strong>Résolue</strong>');
                                ?>

                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
