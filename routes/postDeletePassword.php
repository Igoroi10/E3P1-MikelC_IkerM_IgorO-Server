<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
// $_POST['emaila']        = 'aimar.cascada@ikasle.aeg.eus';

if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
{
    $userMail['emaila']       = $_POST['emaila'];
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user->deleteUser($userMail);

    if($returnValue == FALSE)
    {
        echo "Error en el borrado de usuario";
    }
    else
    {
        //Devolvemos el resultado añadido de la BD como JSON
        echo json_encode($newUser);
    }
}
else
{
    die("Forbidden");
}
?>