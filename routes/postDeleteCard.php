<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
$_POST['karta_kod']       = '01un01';

if(isset($_POST['karta_kod']))
{
    $cardCode       = $_POST['karta_kod'];
    

    //Añadimos el nuevo objeto a la BD
    $returnValue = $cards->deleteCard($cardCode);

    if($returnValue == FALSE)
    {
        echo "Carta borrada.";
    }
}
else
{
    die("Forbidden");
}
?>