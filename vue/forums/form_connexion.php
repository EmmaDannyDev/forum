<!-- Formulaire de connexion-->
<div class="col-md-12 background_inscription_connexion">
    
    <!-------- Vérification connexion (Pseudo et Mot de passe) + mise en SESSION -------->
    <?php membre_connexion($cnx); ?>
    
    <div class="col-md-6 col-md-offset-3">
        
        
        <!-------- TITRE CONNEXION -------->
        
        <h1 class="text-center">Connexion</h1>
        <br>
        
        <form action="#" method="POST">
            
            
            <!-------- INPUT PSEUDO -------->
            
            <div class="form-group form_group_inscription_connexion">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                    <input type="pseudo" class="form-control" placeholder="Pseudo (Entre 6 et 20 caractères autorisés)" name="pseudo" pattern=".{6,20}" required title="Entre 6 et 20 caractères">
                </div>
            </div>
            
            
            <!-------- INPUT MOT DE PASSE -------->
            
            <div class="form-group form_group_inscription_connexion">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                    <input type="password" class="form-control" placeholder="Mot de passe (Entre 6 et 20 caractères autorisés)" name="pass" pattern=".{6,20}" required title="Entre 6 et 20 caractères">
                </div>
            </div>
            
            
            <!-------- BOUTTON SUBMIT VALIDER -------->
            
            <button type="submit" class="btn btn-primary center-block" name="connexion">Valider</button>
            
            
        </form>
    </div>
</div>


