<?php
    function connexion_bdd()
    {
        try
        {
            $cnx = new PDO('mysql:host=localhost;dbname=17forums;charset=utf8', 'root', '');
        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        return $cnx;
    }
?>
