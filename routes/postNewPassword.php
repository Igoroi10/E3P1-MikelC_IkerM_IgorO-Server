<?php

require_once(__DIR__."/../routes/functions.php");
require_once (__DIR__."/../controller/Controller.php");

//Verificamos que se hayan enviado las variables 'name' y 'pasahitza' a trabés del formulario

//TEST OIST ROUTE QUITAR OISTERIORMENTE
$_POST['emaila']          = 'iker.mendoza@ikasle.aeg.eus';
$_POST['pasahitza']      = '1234';


if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
{
    // echo "entra en UserVerify";
    $usuario        = sanitizeString($_POST['emaila']);
    $pasahitza      = sanitizeString($_POST['pasahitza']);
    $userSend['error'] = "";

    
    $confirmEmail = $user->getAllByColumn("emaila", $usuario);

    if(empty($confirmEmail))
    {
        $userSend['error'] = "No existe email";
    }
    else
    {
        //hasheo de contraseña
        $hash = password_hash($pasahitza, PASSWORD_DEFAULT);
        $pasahitza = $hash;

        //Añadimos el nuevo objeto a la BD
        $returnValue = $user->alterPassword($usuario, $pasahitza);
        
        if($returnValue == FALSE)
        {
            $userSend['error'] = "Changed succesfully";
        }
        
    }
    
    echo json_encode($userSend);
   
}
else
{
    die("Forbidden");
}
?>