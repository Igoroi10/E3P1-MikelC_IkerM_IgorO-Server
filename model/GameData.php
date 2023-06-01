<?php

require_once "ModelBase.php";

class GameData extends ModelBase
{
    function __construct()
    {
        //Inicializamos el nombre de la tabla
        $this->table_name  = 'partida';
         
        //Llamamos al constructor de la base ModelBase
        parent::__construct();
        
       
    }
}

?>