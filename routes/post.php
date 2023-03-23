<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
// $_POST['emaila']        = 'aimar.cascada@ikasle.aeg.eus';
// $_POST['pasahitza']     = '$2y$10$YbjPWuyZAu9ZnJRuYqNx0eEgKxrHPSNETuQp7uQH.ZJnm7lqDA1h2';
// $_POST['user_kod']      = 'usr0009';
// $_POST['rol']           = 'player';
// $_POST['izen_abizena']  = 'Aimar Cascada';

if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
{
    $newUser['emaila']       = $_POST['emaila'];
    $newUser['pasahitza']    = $_POST['pasahitza'];
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user->addNew($newUser);

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