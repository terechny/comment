<?php

namespace Core;

class Router{

    protected array $routes = [];
    protected string $method;

    public function __construct($routs)
    {

        $this->routes = $routs;
        $this->method = $_SERVER['REQUEST_METHOD']; 
        $this->uri =  $this->getUri();
    }

    private function getUri(){

      return  $_SERVER['REQUEST_URI'] == '/' ? 'home' : substr( $_SERVER['REQUEST_URI'], 1);

    }

    public function exec(){
        
        if( isset(  $this->routes[ $this->method ][ $this->uri ]  ) ){

            $paramsArray = explode('/', $this->routes[ $this->method ][ $this->uri ]);

            $this->callMethod($paramsArray[0], $paramsArray[1]);

        }else{

            http_response_code(404);
        }        
    }

    private function callMethod(string $contreller, string  $method)
    {

        $namespace = 'App\\Controllers\\' . $contreller;

        $exemplar = new $namespace();
        $exemplar->$method( new Request );
    }

}
