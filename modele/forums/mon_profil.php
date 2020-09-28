<?php

	function update_profil($cnx)
	{
		if(isset($_POST['modifier_profil']))
		{
            $query = $cnx->prepare("update users set avatar_profil= :avatar, age= :age, sexe= :sexe where id= :id");
            $query->bindValue(':avatar',$_POST['avatar'],PDO::PARAM_STR);
            $query->bindValue(':age',$_POST['age'],PDO::PARAM_INT);
            $query->bindValue(':sexe',$_POST['sexe'],PDO::PARAM_STR);
            $query->bindValue(':id',$_SESSION['id_pseudo'],PDO::PARAM_INT);
			$query->execute();
        
            //Modification des variables de session en cours
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['sexe'] = $_POST['sexe'];
            $_SESSION['avatar_profil'] = $_POST['avatar'];
            
			?> <script type="text/javascript">window.location.replace("index.php?menu=forums&categorie=1")</script> <?php
		}
	}

	function infos_profil($cnx,$id)
	{
		$query = $cnx->prepare("select sexe, age, avatar_profil from users where id= :id");
        $query->bindValue(':id' ,$id, PDO::PARAM_INT);
		$query->execute();

		return $query->fetch();
	}

    function mes_discussions_etat($cnx)
    {
        $elementsPage = mes_discussions($cnx);
        
        for($i = 0; $i<count($elementsPage); $i++)
        {
            if(isset($_POST['etat'.$i]))
            {
                $query = $cnx->prepare("update discussions set etat= :etat where id_pseudo= :id_pseudo and id= :id ;");
                $query->bindValue(':etat',$_POST['etat'.$i],PDO::PARAM_INT);
                $query->bindValue(':id_pseudo',$_SESSION['id_pseudo'],PDO::PARAM_INT);
                $query->bindValue(':id',$elementsPage[$i]['id'],PDO::PARAM_INT);
                $query->execute();
            }
        }
    }
?>