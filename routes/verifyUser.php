<?php

    require_once(__DIR__."/../functions.php");
    require_once (__DIR__."/../controller/Controller.php");

    //Verificamos que se hayan enviado las variables 'name' y 'pasahitza' a trabés del formulario

    //TEST OIST ROUTE QUITAR OISTERIORMENTE
    // $_POST['emaila']          = 'iker.mendoza@ikasle.aeg.eus';
    // $_POST['pasahitza']      = '$2y$10$kSL/Yle4VVBAQa8a0TypYeiJzNk8aqGAiy/7zHx30KELBYXyQy9vu';


    if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
    {
        // echo "entra en UserVerify";
        $mail           = sanitizeString($_POST['emaila']);
        $pasahitza      = sanitizeString($_POST['pasahitza']);

        // echo $mail;
        // echo $pasahitza;

        $userSend['emaila']       = "";
        $userSend['pasahitza']   = "";
        $userSend['error']      = "";

        if ($mail == "" ||$pasahitza == "")
        {
            //Error. No se ha insertado todos los campos
            $userSend['error'] = "Not all the fields were entered";
        }
        
        else
        {
            // echo "Entra en Else";
            //Buscamos el elemento de la tabla USERS
            $resultArray = $user->getAllBy2Columns("emaila", $mail, "pasahitza", $pasahitza);

            if($resultArray == null)
            {
                // echo "entra if";
                //Usuario no encontrado en la base de datos
                $userSend['error'] = "Invalid loggin attempt";
            }
            else
            {
                // echo "entra else";
                //Si el usuario esta en la base de datos lo guardamos
                $userSend['emaila']           =$mail;
                $userSend['pasahitza']        =$pasahitza;
            }

        }

        //Devolvemos el usuario 
        echo json_encode($userSend);
    }

    else
    {
        die("Forbidden");
    }


?>