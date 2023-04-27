<?php

require_once (__DIR__."/../controller/Controller.php");



if(isset($_POST['emaila']) && isset($_POST['pasahitza']))
{
    $user_mail['emaila']              = $_POST['emaila'];
    $password['pasahitza']          = $_POST['pasahitza'];
    $name['izen_abizena']           = $_POST['izen_abizena'];

    $userSend = "";

    //Añadimos el nuevo objeto a la BD
    $mailCheck = $user->comprobeIfMailExists($user_mail);

    if($mailCheck == "")
    {
        $user_num = countUsers();
        echo "Error en la introduccion de nuevo elemento en la BD";

        $returnValue = $user -> insertUser($user_mail, $password, $name, $user_num);   
        
        $userSend['message'] = "user registered succesfully"

    }
    else
    {
        $userSend['message'] = "Invalid loggin attempt";
    }

    echo json_encode($userSend);
}
else
{
    die("Forbidden");
}
?>