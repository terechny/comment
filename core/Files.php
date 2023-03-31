<?php

namespace Core;

class Files
{

    public static function view($template){

        require_once '../resources/template/'. $template .'.html';
    }

}