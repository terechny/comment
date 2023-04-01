<?php

namespace Core;

class Controller
{
    public function responce_json($data){

        header("Content-Type: application/json");
        print json_encode($data);   
    }
}