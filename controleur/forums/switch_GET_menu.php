<?php
    if(isset($_GET['menu']))
    {
        switch ($_GET['menu'])
        {

            // -------- PAGE ACCUEIL --------

            case 'accueil':

                include('../../vue/forums/accueil.php');

                break;

            // -------- PAGE FORUMS --------

            case 'forums':

                $nbreElementPage = 10;

                // -------- Vérification de la page actuelle --------
                if(isset($_GET['page']) and $_GET['page'] != null)
                {
                    $pageActuelle = $_GET['page'];
                }
                else
                {
                   $pageActuelle = 1;
                }

                // -------- On initialise a null, pour qu'il n'y ai pas d'erreur -> undefined --------
                $option_vue = null;
                $option_reponse = null;

                // -------- Récupération des options de filtrage, Réponse et Vue --------
                if(isset($_GET['reponse']) and $_GET['reponse'] != null)
                {
                    $option_reponse = $_GET['reponse'];
                }
                if(isset($_GET['vue']) and $_GET['vue'] != null)
                {
                    $option_vue = $_GET['vue'];
                }

                // -------- Suppression d'une discussion par un Modérateur --------
                modo_supp_discussion($cnx);

                // -------- On affiche les éléments de la page actuelle --------
                $elementsPage = pagination_discussion($cnx,$pageActuelle,$nbreElementPage,$option_vue,$option_reponse);

                include('../../vue/forums/sujet_discussion.php');

                break;

            // -------- PAGE CONTACTS --------

            case 'contact':

                // -------- Formulaire de contact --------
                include('../../vue/forums/contact.php');

                break;

            // -------- PAGE CONNEXION --------

            case 'connexion':

                // -------- Formulaire de connexion --------
                include('../../vue/forums/form_connexion.php');

                break;

            // -------- PAGE INSCRIPTION --------

            case 'inscription':

                // -------- Formulaire d'inscription --------
                include('../../vue/forums/form_inscription.php');

                break;

            // -------- PAGE MON PROFIL --------

            case 'mon_profil':

                // -------- Formulaire de Profil --------
                include('../../vue/forums/mon_profil.php');

                update_profil($cnx);

                break;

            // -------- PAGE PROFIL MES DISCUSSIONS --------

            case 'mes_discussions':

                // -------- Mes discussions --------

                mes_discussions_etat($cnx);

                include('../../vue/forums/profil_mes_discussions.php');

                break;

            // -------- PAGE MESSAGE DISCUSSION --------

            case 'msg_discussion':

                $update_nbre_vue = update_nbre_vue($cnx,$_GET['id']);
                $nbreElementPage = 5;


                // -------- Vérification de la page actuelle ---------

                if(isset($_GET['page']) and $_GET['page'] != null)
                {
                    $pageActuelle = $_GET['page'];
                }
                else
                {
                   $pageActuelle = 1;
                }

                //Suppression d'un message par un Modérateur
                modo_supp_message($cnx);

                //Toutes informations nécessaire pour 1 page
                $elementsPage = pagination_msg_discussion($cnx,$pageActuelle,$nbreElementPage,$_GET['id']);

                $_SESSION['discussion'] = $elementsPage[0]['sujet'];



                include('../../vue/forums/msg_discussion.php');

                break;

            // -------- PAGE AJOUT DISCUSSION --------

            case 'ajout_discussion':

                $liste_cat = recup_liste_categorie($cnx);
                new_sujet($cnx);
                include('../../vue/forums/form_ajout_discussion.php');

                break;

            // -------- PAGE AJOUT MESSAGE --------

            case 'ajout_msg':

                new_message($cnx);

                // -------- Formulaire de Ajout_Message --------
                include('../../vue/forums/form_ajout_message.php');

                break;


            // -------- DECONNEXION --------

            case 'deconnexion':

                membre_deconnexion($cnx);

                break;
        }
    }
?>
