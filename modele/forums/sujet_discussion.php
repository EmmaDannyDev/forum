<?php

	function nbre_sujet($cnx)
    {
        $query = $cnx->prepare("select count(*) as nbre_sujet from discussions where id_categorie= :id_categorie");
        $query->bindValue(':id_categorie',$_GET['categorie'],PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }

    // -------- Ajout d'un nouveau sujet, d'une nouvelle discussion --------
	function new_sujet($cnx)
	{
		if(isset($_POST['creer']) and $_POST['sujet'] != null)
		{
            if($_POST['message'] != null)
            {
                $sujet = ucfirst($_POST['sujet']);

                $query = $cnx->prepare("insert into discussions (sujet,id_pseudo,discussions.date,id_categorie) values(:sujet, :id_pseudo,NOW(),:id_categorie)");
                $query->bindValue(':sujet',$sujet,PDO::PARAM_STR);
                $query->bindValue(':id_pseudo',$_SESSION['id_pseudo'],PDO::PARAM_INT);
                $query->bindValue(':id_categorie',$_POST['categorie'],PDO::PARAM_INT);
                // die('sujet: '.$sujet.'id_pseudo: '.$_SESSION['id_pseudo'].'id_categorie: '.$_POST['categorie']);

                $query->execute();

                $query2 = $cnx->prepare("select id from discussions where id_pseudo = :id_pseudo and sujet = :sujet order by id desc");
                $query2->bindValue(':id_pseudo',$_SESSION['id_pseudo'],PDO::PARAM_INT);
                $query2->bindValue(':sujet',$sujet,PDO::PARAM_STR);

                $query2->execute();

                $tab = $query2->fetch();

                // -------- Insertion du 1er Message ajouter l'auteur --------
                $query3 = $cnx->prepare("insert into msg_discussion (message,id_discussion,id_user,date) values (:message, :id, :id_pseudo,NOW())");
                $query3->bindValue(':message',$_POST['message'],PDO::PARAM_STR);
                $query3->bindValue(':id',$tab['id'],PDO::PARAM_INT);
                $query3->bindValue(':id_pseudo',$_SESSION['id_pseudo'],PDO::PARAM_INT);

                $query3->execute();

                ?>
                    <script type="text/javascript">window.location.replace("index.php?menu=forums&categorie=<?php echo $_POST['categorie']; ?>");</script>
                <?php
            }
            else
            {
                msg_erreur_ajout_discussion_and_message();
            }
		}
	}

	function nbre_vue($cnx,$id)
	{
		$query = $cnx->prepare("select vues from discussions where id= :id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();

		return $query->fetch();
	}

    // -------- Récupération des éléménts à afficher pour une page + filtrage par Option choisi si existant --------
    function pagination_discussion($cnx,$pageActuelle,$nbreElementPage,$option_vue,$option_reponse)
    {
        // -------- Limitation de la page à récupérer --------
        $debut = ($pageActuelle-1) * $nbreElementPage;
        $fin = $nbreElementPage;

        if(isset($_GET['categorie']) and $_GET['categorie'] != null)
        {
            $requete = "select sujet,pseudo,DATE_FORMAT(discussions.date,'%d/%c/%Y à %k:%i') as date,discussions.id as id,etat
            from discussions,users,categories
            where id_pseudo = users.id
            and id_categorie = categories.id
            and id_categorie = :id_categorie ";

            // -------- Filtrage Reponse et Vue --------
            $requete = filtrage_vue($cnx,$option_vue,$requete);
            $requete = filtrage_reponse($cnx,$option_reponse,$requete);

            $requete['requete'] .= " order by discussions.date desc limit :debut, :fin";

            $query = $cnx->prepare($requete['requete']);

            //Effectuer bindValue que si les options son choisi
            if($requete['nb_vue'] != -1)
            {
                $query->bindValue(':nb_vue',$requete['nb_vue'],PDO::PARAM_INT);
            }
            if($requete['nb_reponse'] != -1)
            {
                $query->bindValue(':nb_reponse',$requete['nb_reponse'],PDO::PARAM_INT);
            }

            $query->bindValue(':id_categorie',$_GET['categorie'],PDO::PARAM_INT);
            $query->bindValue(':debut',$debut,PDO::PARAM_INT);
            $query->bindValue(':fin',$fin,PDO::PARAM_INT);

            $query->execute();

            return $query->fetchAll();
        }
    }

    // -------- Liste des catégories de discussion existante --------
    function recup_liste_categorie($cnx)
    {
        $query = $cnx->prepare("select * from categories");
		$query->execute();

        return $query->fetchAll();
    }

    // -------- Filtrage pour les vues -> 3 Options possible --------
    function filtrage_vue($cnx,$option,$requete)
    {
        if($option == 1)
        {
            $requete .= "and vues = :nb_vue";
            $nb = 0;
        }
        elseif($option == 2)
        {
            $requete .= "and vues <= :nb_vue";
            $nb = 10;
        }
        elseif($option == 3)
        {
            $requete .= "and vues >= :nb_vue";
            $nb = 10;
        }
        else
        {
            $nb = -1;
        }

        return array("requete" => $requete, "nb_vue" => $nb);
    }

    // -------- Filtrage pour les réponses -> 3 Options possible --------
    function filtrage_reponse($cnx,$option,$requete)
    {
        if($option == 1)
        {
            $requete['requete'] .= " and reponse = :nb_reponse";
            $nb = 0;
        }
        elseif($option == 2)
        {
            $requete['requete'] .= " and reponse <= :nb_reponse";
            $nb = 10;
        }
        elseif($option == 3)
        {
            $requete['requete'] .= " and reponse >= :nb_reponse";
            $nb = 10;
        }
        else
        {
            $nb = -1;
        }

        $requete['nb_reponse'] = $nb;

        return $requete;
    }

    function mes_discussions($cnx)
    {
        $query = $cnx->prepare("select sujet,pseudo,DATE_FORMAT(discussions.date,'%d/%c/%Y à %k:%i') as date,discussions.id as id,id_categorie,etat
        from discussions,users,categories
        where id_pseudo = users.id
        and id_categorie = categories.id
        and id_pseudo = :id_pseudo
        order by discussions.date desc");

        $query->bindValue(':id_pseudo',$_SESSION['id_pseudo'],PDO::PARAM_INT);

        $query->execute();

        return $query->fetchAll();
    }
?>
