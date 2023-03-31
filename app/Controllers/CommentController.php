<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Comment;

class CommentController extends Controller{

    public function index(){

        $model = new Comment;

        $data = [
            'data' => $model->all(),
            'message' => 'index',
        ];

        header("Content-Type: application/json");
        print json_encode($data);          

    }

    public function store(){

        $model = new Comment;

        $data = [
            
            'data' => $model->create([               
                            'text' => $_REQUEST['text'],
                            'user' => 'John Doe'
                        ]),
            'message' => 'store',
            'data' => $_REQUEST
        ];

        header("Content-Type: application/json");
        print json_encode($data);   
    }

}

