<?php

    function modo_supp_discussion($cnx)
    {
        if(isset($_POST['supp_discussion']))
        {
            //Etape 1 - Suppression des messages d'une discussion
            $query = $cnx->prepare("delete from msg_discussion where id_discussion = :id");
            $query->bindValue(':id', $_POST['supp_discussion'], PDO::PARAM_INT);
            $query->execute();

            //Etape 2 - Suppression de la discussion
            $query2 = $cnx->prepare("delete from discussions where id = :id");
            $query2->bindValue(':id', $_POST['supp_discussion'], PDO::PARAM_INT);
            $query2->execute();
        }
    }

    function modo_supp_message($cnx)
    {
        if(isset($_POST['supp_message']))
        {
            //Suppression d'un message
            $query = $cnx->prepare("delete from msg_discussion where id_message = :id");
            $query->bindValue(':id',$_POST['supp_message'], PDO::PARAM_INT);
            $query->execute();
        }
    }

?>