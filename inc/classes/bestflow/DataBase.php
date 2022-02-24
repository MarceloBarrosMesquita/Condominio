<?php

require_once "../inc/php/public.php";

class DataBase {
    
    protected $conn;
    
    private $last_sql = "";
    
    protected $DB_HOST = "localhost";
    protected $DB_USER = "root";
    protected $DB_PASS = "123456";
    protected $DB_NAME = "teste";
    
    function getLastSQL(){
        return $this->last_sql;
    }
    
    function conectar(){        
        //Cria a conexao com o banco de dados
        $this->conn = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
        
        //defini o charset da conexao 
        $this->conn->set_charset("utf8");
        
        //verifica se deu erro.
        if ($this->conn->connect_errno) {
            echo "Erro ao conectar com o banco de dados.";
            exit;
        }        
    }
    
    function mysqlnull($value){
        if($value == 'Null')
            return $value;
        if($value == 'null')
            return $value;
        elseif(ereg('^[a-zA-Z_][0-9a-zA-Z]*\([^}]*)$', $value))
            return $value;
        elseif(is_null($value))
            return "null";
        elseif(trim($value) == "")
            return "null";
        else
            return "'" . $this->conn->real_escape_string($value) . "'";
    }
    
    function desconectar(){
        $this->conn->close();
    }
    
    function execSQL($strSQL){
        $strSQL = $this->conn->real_escape_string($strSQL);
        $this->last_sql = $strSQL;
        $result = $this->conn->query($strSQL);
    }
    
    function execQuery($strSQL){
        
        $this->last_sql = $strSQL;
        
        $arrRetorno = array();
        if(!$result = $this->conn->query($strSQL)){
            echo "Erro ao executar a consulta no banco de dados";
        }
               
        if (method_exists('mysqli_result', 'fetch_all')){ # Compatibility layer with PHP < 5.3
            $arrRetorno = $result->fetch_all(MYSQLI_ASSOC);
        }
        else{
            $i = 0;
            while($row = $result->fetch_assoc()){
                $arrRetorno[$i] = $row;
                $i++;
            }
        }
        $result->free();
        
        return $arrRetorno;
    }
        
    function execInsert($table, $fields){
        
	if(empty($table)) return null;
 
	if(!is_array($fields)) return null;

	$into = array();
	$values = array();
	foreach($fields as $field => $value){
            $value = (!is_null($value) && empty($value) && $value != 0?'null':$value);
            $into[] = $field;
            $values[] = $this->mysqlnull($value);
	}
	$into = implode(", ", $into);
	$values = implode(", ", $values);

	$sql = "Insert Into $table ($into) Values (" . $values . ")";
        //echo $sql."<br>";
        $this->last_sql = $sql;
  
        $this->conn->query($sql);
        
        return $this->conn->insert_id;
        
    }
    
    function execDelete($table, $where = null){
	$sql = "delete from $table where ".$where;
        //echo $sql."<br>";
        $this->last_sql = $sql;
  
        $this->conn->query($sql);
    }    
    
    function execUpdate($table, $fields, $where = null){

        if(empty($table)) return null;
        if(!is_array($fields)) return null;
        $set = array();
        $into = array();
        foreach($fields as $field => $value){
            $value = (!is_null($value) && empty($value) && $value != 0?'null':$value);
            $campos[] = $field;
            $into[] = $field;
            if(!empty($value) || $value == '0')
                $set[] = "$field = " . $this->mysqlnull($value);
        }
        if(empty($set)) return null;

        $into = implode(",", $into);
        $campos = implode(",", $campos);
        $sql = "Update $table Set ". implode(", ", $set);
 
        if(!empty($where)){
            $sql .= " Where $where";		
        }
       
        //echo $sql."<br>";
        
        $this->last_sql = $sql;
        $this->conn->query($sql);
    }    
    


}
