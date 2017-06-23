<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model {

    protected $table = 'produtos';
    protected $dates = ['deleted_at'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
   
    
}
