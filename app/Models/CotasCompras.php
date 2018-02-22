<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotasCompras extends Model {
	protected $fillable = ['cotas_id', 'nome', 'email', 'rg', 'mensagem', 'numero_pedido', 'estado', 'cidade', 'bairro', 'complemento', 'numero', 'endereco', 'cep', 'final_cartao', 'nascimento', 'cpf', 'pagamento_codigo', 'pagamento_status'];

	protected $dates = ['deleted_at'];
	
	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $softDelete = true;

	public function cotas() {
		return $this->belongsTo('App\Models\Cotas');
	}
}