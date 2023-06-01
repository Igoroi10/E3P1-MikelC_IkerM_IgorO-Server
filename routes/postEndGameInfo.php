<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
//ejemplo del update en mysql -> update erabiltzaileak set rol = 'admin' where emaila = 'iker.mendoza@ikasle.aeg.eus';

    // $_POST['newRola']          = "";
    // $_POST['emaila']           = "igor.ocon@ikasle.aeg.eus";
    // $_POST['newEmaila']        = "igoroi.ocon@ikasle.aeg.eus";   
    // $_POST['newIzenAbizena']   = "Igor Ocon2";


// Partida
if(isset($_POST['partida_kod']) ||  isset($_POST['partida_irabazlea']))
{
    $gameWinner                     = $_POST['partida_irabazlea'];
    $gameCode                       = $_POST['partida_kod'];

    $gameErrorSend['error']         = "";

    //Añadimos el nuevo objeto a la BD
    $returnValue = $gameData-> updatePlayer($gameCode, $gameWinner);

    if($returnValue == FALSE)
    {
        $gameErrorSend['error']     = "Error! Informacion invalida";
    }
    echo json_encode($gameData);
}

else
{
    die("Forbidden");
}



// Segundo User
if(isset($_POST['rola']) || isset($_POST['emaila']) || isset($_POST['izen_abizena']))
{
    $newRol                     = $_POST['newRola'];
    $mail                       = $_POST['emaila'];
    $newMail                    = $_POST['newEmaila'];
    $newName                    = $_POST['newIzenAbizena'];
    $userSend['error']          = "";

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user-> updatePlayer($newRol, $mail, $newMail, $newName);

    if($returnValue == FALSE)
    {
        $userSend['error'] =  "Usuario modificiado correctamente.";
    }
    echo json_encode($userSend);
}
else
{
    die("Forbidden");
}


?>