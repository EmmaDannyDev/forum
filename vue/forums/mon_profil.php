<div class="container">
	
    <h1 class="text-center">MON PROFIL</h1>

    <form class="form-horizontal" method="POST">

        
        <!-------- INPUT AGE -------->
        
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <h5>Age</h5>
                    <?php 
                        $placeholder_input = ($_SESSION['age']!=0?$_SESSION['age']:'Age');
                        $value_input = ($_SESSION['age']!=0?$_SESSION['age']:'');
                    ?>
                    <input type="number" name="age" class="form-control" value="<?php echo $value_input?>" placeholder="<?php echo $placeholder_input; ?>">
                </div>
            </div>
        </div>
        
        <hr>  
        
        <!-------- RADIO SEXE -------->
        
        <div class="row">
            <div class="col-md-2">
                <h5>Sexe</h5>
                <div class="radio">
                    <label for="homme">
                        
                        <!-------- SI homme le boutton radio est checked
                                    et si son sexe n'est pas encore defini, par defaut Homme est checked -------->
                        <input type="radio" name="sexe" id="homme" value="homme"<?php echo ($_SESSION['sexe']!='femme'?'checked':'')?> >
                        Homme
                    </label>
                </div>
                <div class="radio">
                    <label for="femme">
                        <input type="radio" name="sexe" id="femme" value="femme" <?php echo ($_SESSION['sexe']=='femme'?'checked':'')?> >
                        Femme
                    </label>
                </div>
            </div>
        </div>
     
        <hr>
        
        <!-------- RADIO IMAGE -------->
        
        <div class="row">
            <h5>Image</h5>
            <?php
                
                //Récupération du numéro de l'image, exemple: 1.png -> 1, $num_image == 1
                $num_image = explode('.',$_SESSION['avatar_profil']);
               
                for($i = 1; $i <= 8; $i++)
                {
                    echo 
                    '
                    <div class="col-md-2">
                        <label class="radio-inline" for="inlineRadioOptions'.$i.'">
                            <input type="radio" name="avatar" id="inlineRadioOptions'.$i.'" value="'.$i.'.png" '.($num_image[0] == $i?'checked':'').'>
                            <img src="../../vue/forums/img/avatar/'.$i.'.png"/>
                        </label>
                    </div>
                    ';
                }
            ?>
        </div>
        
        <hr>
        
        <!-------- BOUTTON SUBMIT MODIFIER -------->
        
        <button type="submit" class="btn btn-primary center-block" name="modifier_profil">Modifier</button>
        <i class="fa fa-male"></i>
        
    </form>
</div>
