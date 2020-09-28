<?php

    if(isset($_GET['msg']))
    {
        switch ($_GET['msg'])
        {
            // -------- PAGE MESSAGE ERREUR SESSION --------

            case 'msg_erreur_session':

                msg_erreur_session();

                break;  
                
        }
    }

?>