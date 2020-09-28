<?php
	session_start();

    // -------- Vérification de l'Url --------
    if(!isset($_GET['menu']) or $_GET['menu'] == null)
    {
        echo '<script type="text/javascript">window.location.replace("http://localhost/17forums/controleur/forums/index.php?menu=forums&categorie=1")</script>';
    }

    // -------- Connexion à la base de donnée --------
    include('../../modele/connexion_bdd.php');
    $cnx = connexion_bdd();

	// -------- Import des fonctions du Modele --------
	include('../../modele/forums/sujet_discussion.php');
	include('../../modele/forums/msg_discussion.php');
	include('../../modele/forums/mon_profil.php');
    include('../../modele/forums/membre.php');
    include('../../modele/forums/modo.php');
    
    // -------- Import des fonctions de la Vue --------
    include('../../vue/forums/msg_erreur.php');
    
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf8"/>
        <title>Forums</title>
        
        <!-------- CKeditor -------->
        <script src="../../vue/forums/ckeditor/ckeditor.js"></script>
        <script src="../../vue/forums/ckeditor/samples/js/sample.js"></script>
        <link rel="stylesheet" href="../../vue/forums/ckeditor/samples/css/samples.css">
        <link rel="stylesheet" href="../../vue/forums/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
        
        <!-------- BOOTSTRAP -------->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../vue/forums/bootstrap/css/bootstrap.min.css">
        <script src="../../js/jquery/1.11.3/jquery.min.js"></script>
        <script src="../../vue/forums/bootstrap/js/bootstrap.min.js"></script>
        
        <!-------- MOI -------->
        <link rel="stylesheet" type="text/css" href="../../vue/forums/css/style.css"/>
        <script type="text/javascript" src="../../js/nav_anim.js"></script>
        
        
    </head>
    
    <?php
    
        //Récupération du GET MENU pour l'animation des étiquettes
        $get_menu = (isset($_GET['menu']))?$_GET['menu']:'';
    
    ?>
    
	<body onload="nav_animation('<?php echo $get_menu; ?>')">
           
        
        <!-------- HEADER -------->
        
        <?php include("header.php"); ?>
        
        
		<div class="container-fluid" id="container">
        <?php
         
            
            // -------- SWITCH GET MSG ERREUR --------
            
            include('switch_GET_msg_erreur.php');
            
            
            // -------- SWITCH GET MENU --------
            
            include('switch_GET_menu.php');
            
                
        ?>
		</div>
        
        
        <!-------- FOOTER -------->
        
        <?php include("footer.html"); ?>
        
        
	</body>
</html>
