<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
// $_POST['irabazlea']        = 'miguel';

if(isset($_POST['irabazlea']))
{
    $irabazlea       = $_POST['irabazlea'];
    $userSend['error'] = "";
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user->playedGames($irabazlea);


    if($returnValue == FALSE)
    {
        $userSend['error'] = "Irabazlea jasota";
    }
    echo json_encode($userSend);
}
else
{
    die("Forbidden");
}
?>