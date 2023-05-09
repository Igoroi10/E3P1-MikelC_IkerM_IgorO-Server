<?php

require_once (__DIR__."/../controller/Controller.php");

//TEST OIST ROUTE QUITAR OISTERIORMENTE
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$_POST['karta_kod']       = '01un01';
$userSend['error'] = "";

if(isset($_POST['karta_kod']))
{
    $cardCode       = $_POST['karta_kod'];
    $cardEffect     = $_POST['karta_kod'];
    $cardValue      = $_POST['karta_kod'];
    $cardType       = $_POST['karta_kod'];
    $cardDescEu     = $_POST['karta_kod'];
    $cardDescEn     = $_POST['karta_kod'];
    $cardCategory   = $_POST['karta_kod'];
    $cardName       = $_POST['karta_kod'];
    $cardImg        = $_POST['karta_kod'];
    $cardRarity     = $_POST['karta_kod'];

    //Añadimos el nuevo objeto a la BD
    $returnValue = $cards->insertCard($cardCode, $cardEffect, $cardValue, $cardType, $cardDescEu, $cardDescEn, $cardCategory, $cardName, $cardImg, $cardRarity);

    if($returnValue == FALSE)
    {
        $userSend['error'] = "Carta borrada.";
    }
}
else
{
    die("Forbidden");
}
?>