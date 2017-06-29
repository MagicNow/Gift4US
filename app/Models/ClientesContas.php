<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientesContas extends Model {
	protected $dates = ['deleted_at'];

	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $fillable = ['cliente_id', 'bancos_id', 'tipo_conta', 'agencia', 'conta', 'cpf'];
}
