<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
//ejemplo del update en mysql -> update erabiltzaileak set rol = 'admin' where emaila = 'iker.mendoza@ikasle.aeg.eus';

    $_POST['partida_irabazlea']             = 4; 
    $_POST['partida_kod']                   = "pkod_00008";

    // $_POST['newEmaila']        = "igoroi.ocon@ikasle.aeg.eus";   
    // $_POST['newIzenAbizena']   = "Igor Ocon2";

    $_POST['ronda_kod']                     = "rkod0008_1"; 
    $_POST['ronda_irabazlea']               = 8;
    $_POST['irabazlearen_puntuazioa']       = 100;   
    $_POST['galtzaidearen_puntuazioa']      = 33;
    $_POST['partida_ronda']                 = "pkod_00008";

// Partida
if( isset($_POST['partida_irabazlea']) || isset($_POST['partida_kod']))
{
    $gameWinner                     = $_POST['partida_irabazlea'];
    $gameCode                       = $_POST['partida_kod'];

    $gameSend['error']              = "";

    //Añadimos el nuevo objeto a la BD
    $returnValue = $gameData-> insertGame($gameWinner, $gameCode);

    if($returnValue == FALSE)
    {
        $gameSend['error']     = "Informacion de juego enviada.";
    }
    echo json_encode($gameSend);
}

else
{
    die("Forbidden");
}

// //===================================
// //             RONDAS
// //===================================

if(isset($_POST['ronda_kod']) || isset($_POST['ronda_irabazlea']) || isset($_POST['irabazlearen_puntuazioa']) || isset($_POST['galtzaidearen_puntuazioa']) || isset($_POST['partida_ronda']))
{ 
    $roundCode                          = $_POST['ronda_kod'];
    $roundWinner                        = $_POST['ronda_irabazlea'];
    $winnerPoints                       = $_POST['irabazlearen_puntuazioa'];
    $losserPoints                       = $_POST['galtzaidearen_puntuazioa'];
    $gameRound                          = $_POST['partida_ronda'];
    $roundSend['error']                 = "";

    //Añadimos el nuevo objeto a la BD
    $returnValue = $round-> insertRound($roundCode, $roundWinner, $winnerPoints, $losserPoints, $gameRound);

    if($returnValue == FALSE)
    {
        $roundSend['error'] =  "Informacion de ronda enviada";
    }
    echo json_encode($roundSend);
}
else
{
    die("Forbidden");
}



// // Usuarios
// if(isset($_POST['rola']) || isset($_POST['emaila']) || isset($_POST['izen_abizena']))
// {
//     $newRol                     = $_POST['newRola'];
//     $mail                       = $_POST['emaila'];
//     $newMail                    = $_POST['newEmaila'];
//     $newName                    = $_POST['newIzenAbizena'];
//     $userSend['error']          = "";

//     //Añadimos el nuevo objeto a la BD
//     $returnValue = $user-> updatePlayer($newRol, $mail, $newMail, $newName);

//     if($returnValue == FALSE)
//     {
//         $userSend['error'] =  "Usuario modificiado correctamente.";
//     }
//     echo json_encode($userSend);
// }
// else
// {
//     die("Forbidden");
// }


?>