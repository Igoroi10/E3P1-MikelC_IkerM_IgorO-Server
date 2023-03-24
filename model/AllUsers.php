<?php

require_once "ModelBase.php";

class AllUsers extends ModelBase
{
    function __construct()
    {
        //Inicializamos el nombre de la tabla
        $this->table_name  = 'erabiltzaileak';
         
        //Llamamos al constructor de la base ModelBase
        parent::__construct();
        
       
    }
}

?>