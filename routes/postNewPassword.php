<?php

require_once (__DIR__."/../controller/Controller.php");



if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
{
    $user['emaila']       = $_POST['emaila'];
    $pasahitza['pasahitza']    = $_POST['pasahitza'];
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user->alterPassword($user, $pasahitza);

    if($returnValue == FALSE)
    {
        echo "Error en la introduccion de nuevo elemento en la BD";
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