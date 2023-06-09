<?php

/* ModelBase.php Será nuestra clase padre gestora de modelos, de la cual heredarán todos los modelos.

Definira los Siguientes atribuos:

$table_name: Nombre de la tabla asociada al modelo 
$conexion: OBjeto de la clase conexion. Se usara para interactuar con la BD */

require_once (__DIR__."/../db/Conexion.php");


class ModelBase extends Conexion 
{
    protected $conexion;
    protected $table_name;

    function __construct()
    {
        $this->conexion = parent::getInstance();
    }


    // OBtiene todos los elementos de la tabla
    function getAll()
    {
        $query = $this->selectDB($this->table_name);
        
        // echo "Table name: " . $this->table_name;
        $result = $this->conexion->query($query);
        
        // Creamos el array asociativo para devolver los datos
        $array = $this->createArray($result);
   

        $result->close();
        return $array;
    }


    // Obtiene todos los elementos de la tabla,l filtrados por un valor de una columna
    function getLinks()
    {
        $query = $this->selectDB2();
        $result = $this->conexion->query($query);

        // Creamos el array asociativo para devolverlos datos
        $array= $this->createArray($result);

        $result->close();
        
        return $array;
    }

    function getUsers()
    {
        $query = $this->selectErabiltzaileDB($this->$mail);
        $result = $this->conexion->query($query);

        // Creamos el array asociativo para devolverlos datos
        $array= $this->createArray($result);

        $result->close();
        
        return $array;
    }

    function getAllUsers()
    {
        $query = $this->selectAllUsersDB($this->table_name);
        
        // echo "Table name: " . $this->table_name;
        $result = $this->conexion->query($query);
        
        // Creamos el array asociativo para devolver los datos
        $array = $this->createArray($result);
   

        $result->close();
        return $array;
    }

    // Función que añade un elemento nuevo a la tabla 
    function addNew($array) 
    {
        $query = $this->insertDB($this->table_name, $array);
        // echo $query; - Solucion del Error

        $result = $this->conexion->query($query);
        // echo $query;
        return $result;
    }



    protected function createArray($data)
    {

        $array = [];
        // Creamos el array asociativo para devolver los datos
        while($row = $data->fetch_array(MYSQLI_ASSOC))
        {
            // Añadimos la siguiente fila
            $array[] = $row;
        }

        return $array;
    }
    


    // Devuelve Un Query de la forma "SELECT * FROM table WHERE authors = 'Jane Austen' "
    // parametros:
    // $tale: NOmbre de la tabla (FROM)
    // $fcolumns: Columnas a extraer {SELECT}. Si no se pasa este parametro se entiende que se extraen todas (*)
    // $conditions: condicion de búsqueda (WHERE). Si no se pasa este parametro se entiende que no hay Condicion de busqueda
    
    protected function selectDB($table, $columns = "*", $name = "", $value = "")
    {
        // echo "entra";
        
        $query = "SELECT $columns FROM $table";
        if( $name != "" && $value != "")
            $query .= " WHERE $name = '$value'";

            // echo $query;
            return $query;
    }

    protected function selectDB2()
    {
        //echo("entra en select 2");
        
        $query = "SELECT URL FROM LINKS";

            // echo $query;
            return $query;
    }

    protected function selectErabiltzaileDB($mail)
    {
        // echo $mail;
        $query = "SELECT rol, irudia, izen_abizena, pasahitza, emaila from erabiltzaileak order by izen_abizena where emaila = $mail ";

        // echo $query;
        return $query;
    }

    protected function selectAllUsersDB($table, $columns = "*", $name = "", $value = "")
    {
        // echo "entra";
        
        $query = "SELECT $columns FROM $table where egoera = 1";
        if( $name != "" && $value != "")
            $query .= " WHERE $name = '$value'";

            // echo $query;
            return $query;
    }

    // Devuelve un Query de la forma "INSERT INTO table (author, title, category) VALUES ('JRR tolkien', 'Lord of the rings', 'Fiction')"
    // PArametros:
    // $table: Nombre d ela tabla 
    // $array: Array asociativo con los pares (name, value) correspondientes l nombre de la columna y valor

    protected function insertDB($table, $array)
    {

        foreach ($array as $name => $value)
        {
            $insert_name[] = $name;
            $insert_value[] = $value;
        }

        $query = "INSERT INTO $table(";

        $num_elem = count($insert_name);
        FOR($i = 0; $i < $num_elem; ++$i)
        {
            $query .= "$insert_name[$i]";
            if($i != $num_elem - 1)
                $query .= ", ";
            else
                $query .= ") ";

        }

        $query .= "VALUES(";
        for ($i = 0; $i < $num_elem; ++$i)
        {
            
            $query .= "'$insert_value[$i]'";
            if($i != $num_elem -1)
                $query .= ", ";
            
            else
                $query .= ") "; 
        }

        return $query;
    }

    function getAllBy2Columns($search_name1, $search_value1)
    {
        $query = $this->selectDBMultiple($this->table_name, "*", $search_name1, $search_value1);
        $result = $this->conexion->query($query);

        //Creamos el array asociativo para devolver los datos
        $array = $this->createArray($result);

        $result->close();
        return $array;
    }

    function getAllByColumn($search_name, $search_value)
        {
            $query = $this->selectDB($this->table_name, "*", $search_name, $search_value);
            $result = $this->conexion->query($query);
            
            //Creamos al array asociativo para devolver los datos
            $array = $this->createArray($result);


            $result->close();
            return $array;
        }
        
    protected function selectDBMultiple($table, $columns = "*", $name1 = "", $value1 = "" )
    {
        // echo $table;
        $query = "SELECT $columns FROM $table where egoera = 1";
        if( $name1 != "" && $value1 != "")
            $query .= " AND $name1 = '$value1'";
        // if( $name2 != "" && $value2 != "")
        //     $query .= " AND $name2 = '$value2'";

        //echo $query;
        return $query;
    }

    function alterPassword($usuario, $pasahitza){

        $query = "UPDATE $this->table_name set pasahitza = '$pasahitza' where emaila = '$usuario'";

        $result = $this->conexion->query($query);
    }

    function checkIfMailExists($emaila){
        $query = "SELECT emaila from erabiltzaileak where emaila = '$emaila'";
    
        $result = $this->conexion->query($query);

        $array = $this->createArray($result);

        return $array;
    
        //si hay algun email llamamos a countUsers pasando los argumentos sino tiene que devolver un error 
    }
    

    
    function insertUser($emaila, $pasahitza, $izen_abizena, $zenbakia){
        

        $num = $zenbakia[0];
    
        $query = "INSERT INTO erabiltzaileak(user_kod,rol,izen_abizena,pasahitza,emaila) VALUES ('usr00$num', 'player', '$izen_abizena', '$emaila')";
        $result = $this->conexion->query($query);

    }

    function deleteUser($mail){
        $query = "update $this->table_name set egoera = 0 where emaila = '$mail';";
        $result = $this->conexion->query($query);

    }

    function deleteCard($card){
        $query = "delete from $this->table_name where karta_kod = '$card';";
        $result = $this->conexion->query($query);
    }

    function insertCard($cardCode, $cardEffect, $cardValue, $cardType, $cardDescEu, $cardDescEn, $cardCategory, $cardName, $cardImg, $cardRarity){

        $query = "insert into $this->table (karta_kod, kategoria, izena, irudia, urritasun_karta";

        if($cardEffect != "")
            $query .= ", efektua";
        
        if($cardValue != "")
            $query .= ", balioa";

        if($cardType != "")
            $query .= ", mota";

        if($cardDescEu != "")
            $query .= ", deskribapena";
    
        if($cardDescEn!= "")
            $query .= ", description";

        $query .= ") values ('$cardCode', '$cardCategory', '$cardName', '$cardImg', '$cardRarity'"; 

        if($cardEffect != "")
            $query .= ", '$cardEffect'";
        
        if($cardValue != "")
            $query .= ", '$cardValue'";

        if($cardType != "")
            $query .= ", '$cardType'";

        if($cardDescEu != "")
            $query .= ", '$cardDescEu'";
    
        if($cardDescEn!= "")
            $query .= ", '$cardDescEn'";

        $query .= ");";

        $result = $this->conexion->query($query);

    }

    function updatePlayer($newRol, $mail, $newMail, $newName){
        $query = "update $this->table_name set";

        if($newRol != ""){
            $query .= " rol = '$newRol'";
            if($newMail != "" || $newName != "")
                $query .= ",";
        }
   
        if($newMail != ""){
            $query .= " emaila  = '$newMail'";
            if($newName != "")
                $query .= ",";
        }

        if($newName != "")
            $query .= " izen_abizena = '$newName'";

        $query .= " where emaila = '$mail';";

        $result = $this->conexion->query($query);

    }

    function insertGame($gameWinner, $gameCode)
    {
        // $query = "INSERT INTO partida where $gameWinner = 'BBBB'";
        $query = "INSERT INTO partida(partida_irabazlea, partida_kod) VALUES ('$gameWinner', '$gameCode')";

        $result = $this->conexion->query($query);

        return $result;
    }

    function insertRound($roundCode, $roundWinner, $winnerPoints, $losserPoints, $gameRound)
    {
        $query = "INSERT INTO ronda(ronda_kod, ronda_irabazlea, irabazlearen_puntuazioa, galtzailearen_puntuazioa, partida_ronda) VALUES ('rkod_0000$gameRound_$roundcode', '$roundWinner', '$winnerPoints', '$losserPoints', 'pkod_0000$gameRound')";

        $result = $this->conexion->query($query);

        return $result;
    }

    function insertJolastu($gamePlayer_game, $gamePlay_game)
    {
        // $query = "INSERT INTO partida where $gameWinner = 'BBBB'";
        $query = "INSERT INTO jolastu(user_jolastu, partida_jolastu) VALUES ('$gamePlayer_game', ' pkod_0000$gamePlay_game')";

        $result = $this->conexion->query($query);

        return $result;
    }

}



?>
