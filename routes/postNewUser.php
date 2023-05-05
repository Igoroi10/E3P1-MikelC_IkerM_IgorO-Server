<?php

require_once (__DIR__."/../controller/Controller.php");


// $_POST['emaila']                = 'mikel.gurutze2134@ikasle.aeg.eus';
// $_POST['pasahitza']             = 'querty123';
// $_POST['izen_abizena']          = 'Mikel gurutze';


if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
{
    $result['emaila']           = $_POST['emaila'];
    $result['pasahitza']        = $_POST['pasahitza'];
    $result['izen_abizena']     = $_POST['izen_abizena'];
    $result['rol']              = 'player';
    $result['egoera']           = 1;

    $userSend['message'] = "";

    //Añadimos el nuevo objeto a la BD
    $mailCheck =  $user->checkIfMailExists($result['emaila']);

    if(empty($mailCheck))
    {       
        // echo "Mail disponible";

        $hash = password_hash($result['pasahitza'], PASSWORD_DEFAULT);
        $result['pasahitza'] = $hash;

        $returnValue = $user-> addNew($result);   
        
        $userSend['message'] = 'user registered succesfully';

    }
    else
    {
        $userSend['message'] = 'Invalid register attempt';
    }

    echo json_encode($userSend);
}
else
{
    die("Forbidden");
}
?>