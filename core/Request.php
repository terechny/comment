<?php

namespace Core;

class Request
{

    public $data = [];

    public function __construct(){
    
        foreach( $_REQUEST as $kay => $field ){

            $this->data[$kay] = $this->checkField($field);
        }
    }

    public function data(){

        return $this->data;
    }

    private function checkField($field){

        return  $this->symbolsRemoval($field);
    }

    private function symbolsRemoval($string){

        $symbols = [ "'", '"', "-", "/", 
                     "*", "<", ">", ";", 
                     "=", "_", "#", "^", 
                     "|", "~", "`", "@", 
                     "&", "%", "$", ")",
                     "(", "{", "}", ":", 
                     "EXEC", "sp_executesql", 
                     "xp_cmdshell", "DROP" ];

        return str_replace($symbols, "", $string);
    }

}