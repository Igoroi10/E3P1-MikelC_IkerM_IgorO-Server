<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
//ejemplo del update en mysql -> update erabiltzaileak set rol = 'admin' where emaila = 'iker.mendoza@ikasle.aeg.eus';

    $_POST['partida_irabazlea']             = 4; 
    $_POST['partida_kod']                   = "8";

    // $_POST['newEmaila']        = "igoroi.ocon@ikasle.aeg.eus";   
    // $_POST['newIzenAbizena']   = "Igor Ocon2";

    $_POST['ronda_kod']                     = "rkod0008_1"; 
    $_POST['ronda_irabazlea']               = 8;
    $_POST['irabazlearen_puntuazioa']       = 100;   
    $_POST['galtzaidearen_puntuazioa']      = 33;
    $_POST['partida_ronda']                 = "8";
    // $_POST['partida_ronda']                 = "pkod_00008";

    $_POST['user_jolastu']                  = 8;
    $_POST['partida_jolastu']               = "8";

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

if(isset($_POST['ronda_irabazlea']) || isset($_POST['irabazlearen_puntuazioa']) || isset($_POST['galtzaidearen_puntuazioa']) || isset($_POST['partida_ronda']))
{ 
    $gameRound                              = $_POST['partida_ronda'];

    $roundWinner1                           = $_POST['ronda_irabazlea'];
    $winnerPoints1                          = $_POST['irabazlearen_puntuazioa'];
    $losserPoints1                          = $_POST['galtzaidearen_puntuazioa'];
    

    $roundWinner2                           = $_POST['ronda_irabazlea'];
    $winnerPoints2                          = $_POST['irabazlearen_puntuazioa'];
    $losserPoints2                          = $_POST['galtzaidearen_puntuazioa'];
    

    $roundWinner3                           = $_POST['ronda_irabazlea'];
    $winnerPoints3                          = $_POST['irabazlearen_puntuazioa'];
    $losserPoints3                          = $_POST['galtzaidearen_puntuazioa'];

    // $roundWinner                            = $_POST['ronda_irabazlea'];
    // $winnerPoints                           = $_POST['irabazlearen_puntuazioa'];
    // $losserPoints                           = $_POST['galtzaidearen_puntuazioa'];
    // $gameRound                              = $_POST['partida_ronda'];
    // $roundSend['error']                     = "";

    //Añadimos el nuevo objeto a la BD
    $returnValue = $round-> insertRound(1, $roundWinner1, $winnerPoints1, $losserPoints1, $gameRound);
    $returnValue = $round-> insertRound(2, $roundWinner2, $winnerPoints2, $losserPoints2, $gameRound);
    
    //Sentencia que guarda la tercera ronda en caso de que exista
    if($winnerPoints3 != "" && $losserPoints3 != "")
    {
        $returnValue = $round-> insertRound(3, $roundWinner3, $winnerPoints3, $losserPoints3, $gameRound);
    }
   

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



// Jolastu
if(isset($_POST['user_jolastu']) || isset($_POST['partida_jolastu']))
{
    $gamePlay_game                          = $_POST['partida_jolastu'];

    $gamePlayer1_game                       = $_POST['user_jolastu'];
    $gamePlayer2_game                       = $_POST['user_jolastu'];
    
    $gameSend_game['error']                 = "";

    //Añadimos el nuevo objeto a la BD
    $returnValue = $play-> insertJolastu($gamePlayer1_game, $gamePlay_game);
    $returnValue = $play-> insertJolastu($gamePlayer2_game, $gamePlay_game);

    if($returnValue == FALSE)
    {
        $gameSend_game['error'] =  "Informacion de juego correctamente enviada.";
    }
    echo json_encode($gameSend_game);
}
else
{
    die("Forbidden");
}


?>