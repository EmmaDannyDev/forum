<?php

    function nbre_message($cnx,$id)
    {
		$query = $cnx->prepare("select count(*) as nbre_message from msg_discussion where id_discussion = :id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }

	function nbre_reponse($cnx,$id)
	{
        //Récupération du nombre de Message Par sujet
        $nbre_message = nbre_message($cnx,$id);

        //Insertion Du nombre de reponse (Nombre reponse == Nombre Message -1), on enleve le 1er Message de l'auteur
        $reponse = ($nbre_message['nbre_message']-1);

        $query = $cnx->prepare("update discussions set reponse = :reponse where id = :id");
        $query->bindValue(':reponse',$reponse,PDO::PARAM_INT);
        $query->bindValue(':id',$id,PDO::PARAM_INT);

        $query->execute();

        //Récupération du nombre de réponse
        $query2 = $cnx->prepare("select reponse from discussions where id = :id");
        $query2->bindValue(':id',$id,PDO::PARAM_INT);

		$query2->execute();

		return $query2->fetch();
	}
	function infos_message($cnx,$id)
	{
		$query = $cnx->prepare("select message,DATE_FORMAT(msg_discussion.date,'%d/%c/%Y à %k:%i') as date_message,sujet,pseudo,users.id,DATE_FORMAT(users.date,'%d/%c/%Y') as date_inscription from msg_discussion,discussions,users where
		discussions.id = id_discussion and users.id = id_user and id_discussion = :id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll();
	}
	function new_message($cnx)
	{
		if(isset($_POST['repondre']) and isset($_POST['message']))
		{

            //On ajoute un message que si le champ n'est pas vide Sinon erreur
            if($_POST['message'] != null)
            {
                $query = $cnx->prepare("insert into msg_discussion (message,id_discussion,id_user,date) VALUES (:message, :id, :id_pseudo,NOW())");
                $query->bindValue(':message',$_POST['message'], PDO::PARAM_STR);
                $query->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
                $query->bindValue(':id_pseudo',$_SESSION['id_pseudo'], PDO::PARAM_INT);

                $query->execute();

                ?>
                    <script type="text/javascript">window.location.replace("index.php?menu=msg_discussion&id=<?php echo $_GET['id'].'&categorie='.$_GET['categorie'];?>");</script>
                <?php
            }
            else
            {
                msg_erreur_ajout_discussion_and_message();
            }
		}
	}
	function update_nbre_vue($cnx,$id)
	{
        //Etape 1 - On repurer le nombre de vue actuel
		$query = $cnx->prepare("select vues from discussions where id= :id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
		$query->execute();

		$tab = $query->fetch();

        //Etape 2 - On incrémente le nombre de vue
		$vues = $tab['vues']+1;

        //Etape 3 - On met à jour
		$query2= $cnx->prepare("update discussions set vues= :vues where id= :id");
		$query2->bindValue(':vues',$vues,PDO::PARAM_INT);
		$query2->bindValue(':id',$id,PDO::PARAM_INT);

        $query2->execute();
	}

    //Toute les informations necéssaire pour 1 page
    function pagination_msg_discussion($cnx,$pageActuelle,$nbreElementPage,$id)
    {
        $debut = ($pageActuelle-1) * $nbreElementPage;

        $query = $cnx->prepare("select id_message,message,DATE_FORMAT(msg_discussion.date,'%d/%c/%Y à %k:%i') as date_message,sujet,pseudo,users.id as user_id,DATE_FORMAT(users.date,'%d/%c/%Y') as date_inscription
        from msg_discussion,discussions,users
        where discussions.id = id_discussion and users.id = id_user and id_discussion = :id
        limit :debut, :nbreElementPage");

        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->bindValue(':debut',$debut,PDO::PARAM_INT);
        $query->bindValue(':nbreElementPage',$nbreElementPage,PDO::PARAM_INT);

        $query->execute();

        return $query->fetchAll();
    }
?>
