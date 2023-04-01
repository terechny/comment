<?php

namespace App\Models;

use Core\Model;

class Comment extends Model{

    public $table = 'comments';
    public $fields = ['text', 'user'];

}