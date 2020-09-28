<?php

    function membre_inscription($cnx)
	{
        //SI l'utilisateur à cliquer sur le boutton Valider
		if(isset($_POST['inscription']))
		{
            //Pseudo en minuscule
            $pseudo = strtolower($_POST['pseudo']);

            $query = $cnx->prepare("select * from users where pseudo= :pseudo ");
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->execute();

            //Verification que le même pseudo n'est pas déja utiliser
            if($membre = $query->fetch())
            {
                //Message erreur inscription
                msg_erreur_inscription();
            }
            else
            {
                //Cryptage mot de passe
                $pass = md5($_POST['pass']);

                //Insertion du pseudo et du password
                $query = $cnx->prepare("insert into users (pseudo,password,date) values (:pseudo, :password, NOW())");
                $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                $query->bindValue(':password',$pass, PDO::PARAM_STR);
                $query->execute();

                //Message inscription réussie
                include('../../vue/forums/msg_success_inscription.php');
            }
		}
	}

    function membre_connexion($cnx)
	{
        if(isset($_POST['connexion']) and $_POST['pseudo'] != null and $_POST['pass'] != null)
        {
            //Pseudo en minuscule
            $pseudo = strtolower($_POST['pseudo']);

            //Cryptage mot de passe
            $pass = md5($_POST['pass']);

            //Execution de la requête
            $query = $cnx->prepare("select * from users where pseudo= :pseudo and password= :password");
            $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
            $query->bindValue(':password',$pass, PDO::PARAM_STR);
            $query->execute();

            //fetch() --> Retourne faux si la reqûete ne retourne aucun resultat
            if($membre = $query->fetch())
            {
                //Mise en Session
                $_SESSION['pseudo'] = $membre['pseudo'];
                $_SESSION['id_pseudo'] = $membre['id'];
                $_SESSION['avatar_profil'] = $membre['avatar_profil'];
                $_SESSION['sexe'] = $membre['sexe'];
                $_SESSION['age'] = $membre['age'];
                $_SESSION['moderateur'] = $membre['moderateur'];

                //Redirection vers le forums
                echo '<script type="text/javascript">window.location.replace("index.php?menu=forums&categorie=1")</script>';
            }
            else
            {
                //Message Erreur
                msg_erreur_connexion();
            }
        }
	}

    function membre_deconnexion($cnx)
    {
        //On détruit la session
        unset($_SESSION);
        session_destroy();

        //Redirection vers la page de connexion
        echo '<script type="text/javascript">window.location.replace("index.php?menu=connexion")</script>';
    }

?>
