<?php
//CARTAS
    require_once (__DIR__."/../model/Cards.php");

    //Creamos nuestros modelos
    $cards = new Cards();

//USUARIOS
    require_once (__DIR__."/../model/Users.php");

    //Creamos nuestros modelos
    $user = new User();

    //USUARIOS
    require_once (__DIR__."/../model/AllUsers.php");

    //Creamos nuestros modelos
    $allUsers = new AllUsers();

?>