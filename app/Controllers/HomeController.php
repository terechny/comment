<?php

namespace App\Controllers;

use Core\Controller;
use Core\Files;

class HomeController extends Controller{

    public function index(){

        Files::view('home');       
    }
}
