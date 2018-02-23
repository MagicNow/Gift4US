<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FestasProdutos extends Model {

	protected $fillable = ['nome', 'email', 'rg', 'mensagem', 'numero_pedido', 'estado', 'cidade', 'bairro', 'complemento', 'numero', 'endereco', 'cep', 'final_cartao', 'nascimento', 'cpf', 'pagamento_codigo', 'pagamento_status', 'visualizado'];

	protected $dates = ['deleted_at'];
	
	protected $hidden = [
		'created_at',
		'updated_at',
	];

	public function produto() {
		return $this->hasOne('App\Models\Produtos');
	}

	public function festa() {
		return $this->hasOne('App\Models\Festas');
	}
}