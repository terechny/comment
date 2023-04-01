<?php

namespace Core;

class Model
{
    private $connection;
    public $fields;
    public $table;
    public $query;
    public $result;

    public function __construct(){

        $this->connect();      
    }

    private function connect(){

        $this->connection = new \mysqli("db", "root", "root", "comments");
        if($this->connection->connect_error) {
            return $this->connection->connect_error; 
        } 
    }

    private function query(){

        $res = $this->connection->query($this->query);

        return $res ? $res : $this->connection->error;
    }

    public function create(array $params) : Model
    {

        $values = '';
        $fielde = '';

        foreach( $this->fields as $field ){

            if( isset(  $params[$field] ) ){

                $fielde .=  "`". $field ."`,";
                $values .= "'" . $params[$field]  . "',";
            }         
        }

        $this->query = "INSERT INTO `". $this->table ."` ( ".  substr($fielde, 0, -1)  ." ) VALUES ( ". substr($values, 0, -1)  .");";

        return $this;  
    }

    public function all() : Model
    {

        $this->query = "SELECT * FROM " . $this->table;

        return $this;
    }

    public function execute() : Model
    {

        $this->result = $this->query($this->query );

        return $this;
    }

    public function rows() : array
    {

        $rows = [];

        if($this->result){
            foreach($this->result as $row){
                $rows[] = $row;          
            }
        }
        return $rows;
    }    
      
    function __destruct() {
        
        $this->connection->close();
    }

}
