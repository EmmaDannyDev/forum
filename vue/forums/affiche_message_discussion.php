<?php


    // ---- AFFICHAGE DES MESSAGES POUR UNE DISCUSSION----

    for ($i = 0; $i<count($elementsPage); $i++)
    {

        $infos_profil = infos_profil($cnx,$elementsPage[$i]['user_id']);

        ?>
            <div class="panel block_message">
                <div class="header_discussion_message panel-heading">
                    <div class="container">
                        <div class="row">

                            <!-------- TITRE DE LA DISCUSSION T DANS L'ENTETE -------->
                            <div class="col-md-2"><?php echo $elementsPage[$i]['sujet']; ?></div>


                            <!-------- NUMERO DU MESSAGE DANS L'ENTETE -------->

                            <div class="col-md-1 col-md-offset-11">
                                <?php
                                    echo ($i == 0?'<span style="font-size: 18px;" class="glyphicon glyphicon-file" aria-hidden="true"></span>':'<span>#'.$i.'</span>');
                                ?>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="block_info_user_message col-md-2 text-center">


                            <!-------- INFORMATIONS UTILISATEUR -------->

                            <strong><?php echo $elementsPage[$i]['pseudo']; ?></strong> <br><br>
                            inscrit le: <?php echo $elementsPage[$i]['date_inscription']; ?> <br>
                            <?php

                                echo
                                    ($infos_profil['sexe']!=null?'Sexe: '.$infos_profil['sexe'].'<br>':'').
                                    ($infos_profil['age']!=0?'Age: '.$infos_profil['age'].'<br>':'').
                                    ($infos_profil['avatar_profil'] != null ?'<img src="../../vue/forums/img/avatar/'.$infos_profil['avatar_profil'].'"/>':'')
                                ;
                            ?>


                        </div>
                        <div class="col-md-10 body_message">


                            <!-------- TITRE DU SUJET DANS LE CORP DU MESSAGE -------->
                            <h4><?php echo ($i == 0?'[Auteur]':'Re:').' '.$_SESSION['discussion']; ?></h4>


                            <?php

                                //-------- AFFICHAGE BOUTTON SUPPRIMER, SI MODERATEUR --------

                                if(isset($_SESSION['moderateur']) and $_SESSION['moderateur'] == 1)
                                {

                                    echo
                                    '
                                        <form action="index.php?menu=msg_discussion&categorie=1&id='.$_GET['id'].'" method="POST" onsubmit="return confirm(\'Etes vous sûr de vouloir supprimer ce message ?\')">
                                            <input type="hidden" name="supp_message" value="'.$elementsPage[$i]['id_message'].'"/>
                                            <input type="submit" class="btn btn-danger" value="Supprimer"/>
                                        </form>

                                        <br>
                                    ';
                                }

                            ?>                      

                            <hr>

                            <!-------- MESSAGE-------->
                            <p><?php echo $elementsPage[$i]['message']; ?></p>

                        </div>
                    </div>
               </div>

               <div class="panel-footer footer_message">

                    <!-------- REPONDRE AU SUJET -------->

                    <?php $repondre = (isset($_SESSION['pseudo']))?'?menu=ajout_msg&id='.$_GET['id'].'&categorie='.$_GET['categorie'].'':'?menu=msg_discussion&categorie=1&id='.$_GET['id'].'&msg=msg_erreur_session'; ?>
                    <div class="row"><a class="pull-right" href="index.php<?php echo $repondre; ?> ">Répondre au sujet</a></div>

                </div>

            </div>
        <?php
    }
?>
