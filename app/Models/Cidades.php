<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model {

    protected $table = 'cidades';
    protected $dates = ['deleted_at'];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
   
    public function estado() {
        return $this->belongsTo('App\Models\Estados', 'estado_id', 'id');
    }
}
