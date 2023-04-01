<?php

namespace App\Controllers;

use Core\Controller;
use Core\Request;
use App\Models\Comment;

class CommentController extends Controller{

    private Comment $model;

    public function __construct(){

        $this->model = new Comment;
    }

    public function index(){

        $this->responce_json(['data' => $this->model
                                             ->all()
                                             ->execute()
                                             ->rows() 
                                        
                             ]);        
    }

    public function store(Request $request){

        $this->responce_json(['result' => $this->model
                                               ->create($request->data())
                                               ->execute()
                                               ->result          
                            ]);
    }

}
