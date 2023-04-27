<?php

require_once (__DIR__."/../controller/Controller.php");



if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
{
    $newUser['emaila']              = $_POST['emaila'];
    $password['pasahitza']          = $_POST['pasahitza'];
    $izen_abizena['izen_abizena']   = $_POST['izen_abizena'];
    $zenbakia['zenbakia']           = $_POST['zenbakia'];
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user->insertUser($newUser, $password, $izen_abizena);

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