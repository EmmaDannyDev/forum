<div class="row">
    <div class="text-center">
        <h1>Nouveau Message</h1><br><hr><br>
    </div>
</div>

<br>

<form action="#" method="POST" class="form-horizontal">

    <!-------- INPUT DISABLE SUJET -------->

    <div class="row">
        <label class="col-sm-2 control-label">Sujet</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" placeholder="<?php echo $_SESSION['discussion'];?>" disabled>
        </div>
    </div>
    <br>


    <!-------- INPUT DISABLE AUTEUR -------->

    <div class="row">      
        <label class="col-sm-2 control-label">Auteur</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" placeholder="<?php echo $_SESSION['pseudo'];?>" disabled>
        </div>   
    </div>
    <br>


    <!-------- TEXTAREA MESSAGE -------->
    
    <div class="row">
        <label class="col-sm-2 control-label">Message</label>

        <!-- Editeur de texte Ckeditor -->
        <div class="col-md-9">
            <textarea id="editor" name="message"></textarea>
            
            <!-- Boutton Répondre -->
            <div class="col-md-1 col-md-offset-5">
                <br><button type="submit" class="btn btn-primary" name="repondre">Répondre</button>
            </div> 
            
        </div>

    </div>
    
    <script> initSample(); </script> 

</form>
