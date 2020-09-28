<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav class="nav_pagination">
        <ul class="pagination">
          <?php

          $nbre_sujet = nbre_sujet($cnx);
          $nbre_page = ceil($nbre_sujet['nbre_sujet']/$nbreElementPage);

          // --------- PAGINATIONS --------

          // -------- Lien Précédent --------
          if($pageActuelle != 1)
          {
            echo '<li><a href="index.php?menu=forums&categorie='.$_GET['categorie'].'&page='.($pageActuelle-1).'" aria-label="Previous"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Précédent</a></li>';
          }
          else
          {
            echo '<li><a href="#" aria-label="Previous"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Précédent</a></li>';
          }

          // -------- Lien Numéros Pages --------
          for($i=1; $i<=$nbre_page;$i++)
          {
            if($i == $pageActuelle)
            {
              echo '<li class="active"><a href="index.php?menu=forums&page='.$i.'&categorie='.$_GET['categorie'].'">'.$i.'</a></li>';
            }
            else
            {
              echo '<li><a href="index.php?menu=forums&page='.$i.'&categorie='.$_GET['categorie'].'">'.$i.'</a></li>';
            }
          }

          // -------- Lien Suivant --------
          if($pageActuelle != $nbre_page)
          {
            echo '<li><a href="index.php?menu=forums&categorie='.$_GET['categorie'].'&page='.($pageActuelle+1).'" aria-label="Previous">Suivant <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></li>';
          }
          else
          {
            echo '<li><a href="#" aria-label="Previous">Suivant <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></li>';
          }

          ?>
        </ul>
      </nav>
    </div>
  </div>
</div>
