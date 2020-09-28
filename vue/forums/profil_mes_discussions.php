<form action="#" method="POST">
    
    <div class="col-md-2 col-md-offset-5">
        <button type="submit" class="btn btn-primary" name="modifier_mes_discussions">Modifier</button>
    </div>
    
    <br><br><br>

    <div class="container panel" id="block_discussion">
        
        <!-------- TITRE DU TABLEAU DE DISCUSSION -------->
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
                
                    $elementsPage = mes_discussions($cnx);
                    
                
                    //-------- AFFICHAGE DES DISCUSSIONS DE LA PAGE -------->
                
                    for($i = 0; $i<count($elementsPage); $i++)
                    {
                        $nbre_reponse = nbre_reponse($cnx,$elementsPage[$i]['id']);
                        $dernier_post = infos_message($cnx,$elementsPage[$i]['id']);
                        $nbre_vues = nbre_vue($cnx,$elementsPage[$i]['id']);
                        
                        ?>
                            <div class="container-fluid row liste_discussion"> 
                                <div class="col-md-4">
                                    
                                    <!-- Titre de la discussion -->
                                    <a href="index.php?menu=msg_discussion&categorie=<?php echo $elementsPage[$i]['id_categorie']; ?>&id=<?php echo $elementsPage[$i]['id']; ?>"><?php echo $elementsPage[$i]['sujet']; ?></a>

                                    <br>
                                    
                                    <!-- Auteur + Date Discussion -->
                                    <cite>par <strong><?php echo $elementsPage[$i]['pseudo']; ?> </strong> » <?php echo $elementsPage[$i]['date']; ?></cite>
                                
                                </div>
                                <div class="col-md-1 center_reponse">
                                    
                                    <!-- Nombre de Réponse -> Rouge si < 0 ; Vert si > 0 -->
                                    <span style="<?php echo ($nbre_reponse['reponse']== 0?'color: red;':'color: green;'); ?>"><?php echo $nbre_reponse['reponse']; ?></span> 
                               
                                </div>
                                
                                <!-- Nombre de Vue -->
                                <div class="col-md-1 center_vue "><?php echo $nbre_vues['vues']; ?></div>
                        <?php
                        
                        
                        // -------- IF -> AFFICHAGE DERNIERE REPONSE -- ELSE -> AFFICHE "Aucune" --------
                        
                        if($nbre_reponse[0]>=1)
                        {
                            echo '<div class="col-md-4"><cite>par <strong>'.$dernier_post[$nbre_reponse['reponse']]['pseudo'].' </strong><br>'.$dernier_post[$nbre_reponse['reponse']][1].'</cite></div>';
                        }
                        else
                        {
                            echo '<div class="col-md-4">Aucune</div>';
                        } 
                        ?>
                                  
                                <!-------- INPUT RADIO RESOLUE / PAS ENCORE RESOLUE -------->
                                
                                <div class="col-md-2">
                                    <input type="radio" name="<?php echo 'etat'.$i;?>" value="1"<?php echo ($elementsPage[$i]['etat']==1?'checked':'');?> >
                                    <?php echo ($elementsPage[$i]['etat']==1?'<strong>Résolue</strong>':'Résolue'); ?>
                                    <br>                         
                                    <input type="radio" name="<?php echo 'etat'.$i;?>" value="0"<?php echo ($elementsPage[$i]['etat']==0?'checked':''); ?> >
                                    <?php echo ($elementsPage[$i]['etat']==0?'<strong>Pas encore résolue</strong>':'Pas encore résolue'); ?>
                                </div>
                                
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</form>