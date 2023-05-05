<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
$_POST['emaila']        = 'aceituns@gmail.com';

if(isset($_POST['emaila']))
{
    $userMail       = $_POST['emaila'];
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user->deleteUser($userMail);

    if($returnValue == FALSE)
    {
        echo "Usuario borrado.";
    }
}
else
{
    die("Forbidden");
}
?>