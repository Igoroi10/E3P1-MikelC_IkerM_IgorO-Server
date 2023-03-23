<?php

require_once "ModelBase.php";

class Cards extends ModelBase
{
    function __construct()
    {
         //Inicializamos el nombre de la tabla
         $this->table_name  = 'karta';
         
        //Llamamos al constructor de la base ModelBase
        parent::__construct();
        
       
    }
}

?>