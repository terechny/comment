<?php

namespace Core;

class Model
{
    private $connection;
    private $fields;

    public function __construct(){

        $this->connect();      
    }

    private function connect(){

        $this->connection = new \mysqli("db", "root", "root", "comments");
        if($this->connection->connect_error) {
            echo '<br>connection failed: ' . $this->connection->connect_error; 
        } 
    }

    private function close(){

        $this->connection->close();
    }

    public function create(array $params){

        $field = '';
        $values = '';

        foreach( $params as $key => $value ){

            $field .=  "`". $key ."`,";
            $values .= "'" . $value  . "',";
        }

        $sql = "INSERT INTO `comments` ( ".  substr($field, 0, -1)  ." ) VALUES ( ". substr($values, 0, -1)  .");";
       
        $this->qw($sql);
  
    }

    private function qw($query){

        $res = $this->connection->query($query);
        if($res){
            return $res;
        } else{
            return $this->connection->error;
        } 
    }

    public function all(){

        $sql = "SELECT * FROM comments";
        $result = $this->connection->query($sql);
        $rows = [];
        if($result){
            foreach($result as $row){

                $rows[] = $row;
                
            }
        }
        return $rows;
    }

    public function createTable(){

        $query =  'START TRANSACTION;
  
                  CREATE TABLE `comments` (
                  `id` int(11) NOT NULL,
                  `text` text,
                  `user` varchar(250) DEFAULT NULL,
                  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
                  ALTER TABLE `comments`
                  ADD PRIMARY KEY (`id`);
  
                  ALTER TABLE `comments`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
                  COMMIT;';

        $this->qw($query);
  
    }   
    
    function __destruct() {
        
        $this->close();
    }

}
