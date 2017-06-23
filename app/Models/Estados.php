<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model {

    protected $table = 'estados';
    protected $dates = ['deleted_at'];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
   
    public function cidades() {
        return $this->hasMany('App\Models\Cidades','estado_id','id');
    }
}
