<div class="row">
    <div class="text-center">
        <h1>Nouvelle Discussion</h1><br><hr><br>
    </div>
</div>

<form action="#" method="POST" class="form-horizontal">


    <!-------- INPUT SUJET -------->

    <div class="row">
       <label for="sujet" class="col-sm-2 control-label">Sujet</label>
       <div class="col-md-9">
           <input type="text" class="form-control" id="sujet" name="sujet" pattern=".{6,100}" required title="Entre 6 et 100 caractères.">
        </div>
    </div>
    <br>
    

    <!-------- INPUT DISABLE AUTEUR -------->

    <div class="row">
        <label for="auteur" class="col-sm-2 control-label">Auteur</label>
        <div class="col-md-9">
           <input class="form-control" id="auteur" type="text" placeholder="<?php echo $_SESSION['pseudo']?>" disabled>
        </div>
    </div>
    <br>
    
    
    <!-------- LISTE CATEGORIE -------->

    <div class="row">
        <label class="col-sm-2 control-label">Catégorie </label>
        <div class="col-md-9">
            <select name="categorie" class="form-control text-center">
                <?php
                    foreach($liste_cat as $cat)
                    {
                        echo '<option value="'.$cat['id'].'"'.($cat['id']==$_GET['categorie']?'selected':'').'>'.$cat['nomCategorie'].'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <br>


    <!-------- TEXTAREA MESSAGE -------->
    
    <div class="row">
        <label class="col-sm-2 control-label">Message</label>

        <!-- Editeur de texte Ckeditor -->
        <div class="col-md-9">
            <textarea id="editor" name="message"></textarea>

            <!-- Boutton Créer la Discussion -->
            <div class="col-md-1 col-md-offset-5">
                <br><button type="submit" class="btn btn-primary" name="creer">Créer la Discussion</button>
            </div> 
            
        </div>
        
        <script> initSample(); </script> 
        
    </div>
    
</form>
