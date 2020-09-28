<form action="index.php?menu=forums" method="GET" class="form-inline">


    <!-------- POUR GARDER MENU=FORUMS EN GET -------->
    <input type="hidden" value="forums" name="menu"/>


    <div class="col-md-3">

        <label>Catégorie </label><br>


        <!-------- MENU DEROULANT CATEGORIE -------->

        <select name="categorie" class="form-control text-center">
        <?php

            $liste_cat = recup_liste_categorie($cnx);

            foreach($liste_cat as $cat)
            {
                echo '<option value="'.$cat['id'].'"'.($cat['id']==$_GET['categorie']?'selected':'').'>'.$cat['nomCategorie'].'</option>';
            }
        ?>
        </select>

    </div>

    <div class="col-md-3">

        <?php

            $get_reponse = null;

            // -------- RECUPERATION GET REPONSE --------
            if(isset($_GET['reponse']) and $_GET['reponse'] != null)
            {
                $get_reponse = $_GET['reponse'];
            }

        ?>


        <!-------- MENU DEROULANT FILTRE REPONSE -------->

        <label>Réponse </label><br>

        <select name="reponse" class="form-control">
            <option value="0"> ---- Filtrer par réponse ---- </option>
            <option value="1" <?php if($get_reponse==1){echo 'selected';} ?> >Aucune réponse</option>
            <option value="2" <?php if($get_reponse==2){echo 'selected';} ?> >Moin de 10 réponse</option>
            <option value="3" <?php if($get_reponse==3){echo 'selected';} ?> >Plus de 10 réponse</option>
        </select>


    </div>

    <div class="col-md-3">

        <?php

            $get_vue = null;

            // -------- RECUPERATION GET VUE --------
            if(isset($_GET['vue']) and $_GET['vue'] != null)
            {
                $get_vue = $_GET['vue'];
            }

        ?>


        <!-------- MENU DEROULANT FILTRE VUE -------->

        <label>Vue </label><br>

        <select name="vue" class="form-control">
            <option value="0"> ---- Filtrer par vue ---- </option>
            <option value="1" <?php if($get_vue==1){echo 'selected';} ?> >Aucune vue</option>
            <option value="2" <?php if($get_vue==2){echo 'selected';} ?> >Moin de 10 vues</option>
            <option value="3" <?php if($get_vue==3){echo 'selected';} ?> >Plus de 10 vues</option>
        </select>

    </div>

    <!-------- BOUTTON FILTRER -------->
    <div class="col-md-1">
        <button type="submit" class="btn btn-primary">Filtrer</button>
    </div>

    <!-------- BOUTTON REINITIALISER FILTRE -------->
    <div class="col-md-1">
        <a href="index.php?menu=forums&categorie=1" class="btn btn-primary"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Réinitialiser filtre</a>
    </div>

</form>
