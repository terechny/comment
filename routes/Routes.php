<?php

namespace Routes;

class Routes
{

    public static function list(){
    
        return [

            'POST' => [
            
                'store' => 'CommentController/store'
            ],
        
            'GET' => [
        
                'comment' => 'CommentController/index',
                'home' => 'HomeController/index'
            ]

        ];
    }
}
