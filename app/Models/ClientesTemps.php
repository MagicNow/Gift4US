<?php

namespace App\Models;

use App\Models\Clientes_Contas;
use Illuminate\Database\Eloquent\Model;

class ClientesTemps extends Model {
	protected $dates = ['deleted_at'];

	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $fillable = ['clientes_id', 'email', 'token'];

    public function cliente() {
        return $this->belongsTo('App\Models\Clientes', 'clientes_id');
    }
}
