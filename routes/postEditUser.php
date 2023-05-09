<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
//ejemplo del update en mysql -> update erabiltzaileak set rol = 'admin' where emaila = 'iker.mendoza@ikasle.aeg.eus';

    // $_POST['newRola']          = "";
    // $_POST['emaila']           = "igor.ocon@ikasle.aeg.eus";
    // $_POST['newEmaila']        = "igoroi.ocon@ikasle.aeg.eus";   
    // $_POST['newIzenAbizena']   = "Igor Ocon2";

if(isset($_POST['rola']) || isset($_POST['emaila']) || isset($_POST['izen_abizena']))
{
    $newRol         = $_POST['newRola'];
    $mail           = $_POST['emaila'];
    $newMail        = $_POST['newEmaila'];
    $newName        = $_POST['newIzenAbizena'];
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $user-> updatePlayer($newRol, $mail, $newMail, $newName);

    if($returnValue == FALSE)
    {
        // echo "Usuario modificiado correctamente.";
    }
    echo json_encode($userSend);
}
else
{
    die("Forbidden");
}
?>