<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
// $_POST['emaila']        = 'aceituns@gmail.com';

if(isset($_POST['emaila']))
{
    $userMail       = $_POST['emaila'];
    $userSend['error'] = "";
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user->deleteUser($userMail);

    if($returnValue == FALSE)
    {
        $userSend['error'] = "Usuario borrado.";
    }
    echo json_encode($userSend);
}
else
{
    die("Forbidden");
}
?>