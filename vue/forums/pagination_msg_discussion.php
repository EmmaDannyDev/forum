
        <nav class="nav_pagination">
            <ul class="pagination"> 
                <?php
                    //On récupere l'id du sujet en GET
                    $id_sujet = null;
                    $nbre_message = nbre_message($cnx,$_GET['id']);
                    if(isset($_GET['id']))
                    {
                        $id_sujet = $_GET['id'];
                    }

                    /* ---- PAGINATIONS HAUT ---- */

                    //Lien Précédent
                    if($pageActuelle != 1)
                    {
                        echo '<li><a href="index.php?menu=msg_discussion&id='.$id_sujet.'&page='.($pageActuelle-1).'&categorie='.$_GET['categorie'].'" aria-label="Previous"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Précédent</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="#" aria-label="Previous"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Précédent</a></li>';
                    }

                    //Liens pages
                    $nbre_page = ceil($nbre_message['nbre_message']/$nbreElementPage);
                
                    for($i=1; $i<=$nbre_page;$i++)
                    {
                        if($i == $pageActuelle)
                        {
                            echo '<li class="active"><a href="index.php?menu=msg_discussion&id='.$id_sujet.'&page='.$i.'&categorie='.$_GET['categorie'].'">'.$i.'</a></li>';
                        }
                        else
                        {
                            echo '<li><a href="index.php?menu=msg_discussion&id='.$id_sujet.'&page='.$i.'&categorie='.$_GET['categorie'].'">'.$i.'</a></li>';
                        }
                    }

                    //Lien Suivant
                    if($pageActuelle != $nbre_page)
                    {
                        echo '<li><a href="index.php?menu=msg_discussion&id='.$id_sujet.'&page='.($pageActuelle+1).'&categorie='.$_GET['categorie'].'" aria-label="Previous">Suivant <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></li>';
                    }
                    else
                    {
                        echo '<li><a href="#" aria-label="Previous">Suivant <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></li>';
                    }
                ?>
            </ul>
        </nav>

