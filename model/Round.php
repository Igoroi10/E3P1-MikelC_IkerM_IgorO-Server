<?php

require_once "ModelBase.php";

class Round extends ModelBase
{
    function __construct()
    {
        //Inicializamos el nombre de la tabla
        $this->table_name  = 'ronda';
         
        //Llamamos al constructor de la base ModelBase
        parent::__construct();
        
       
    }
}

?>