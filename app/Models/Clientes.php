<?php

namespace App\Models;

use App\Models\Clientes_Contas;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {
	protected $dates = ['deleted_at'];

	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $fillable = ['nome', 'email', 'telefone_ddd', 'telefone_numero', 'senha'];

    public function conta() {
        return $this->hasOne('App\Models\ClientesContas');
    }
}
