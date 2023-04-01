<?php

namespace Core;

class Request
{

    public $data;


    public function __construct(){

        $this->data = $_REQUEST;

    }

    public function data(){

        return $this->data;
    }

}