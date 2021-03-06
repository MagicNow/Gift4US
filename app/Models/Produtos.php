<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model {
    protected $dates = ['deleted_at'];

	protected $fillable = ['categoria', 'titulo', 'descricao', 'codigo', 'sexo', 'preco', 'preco_venda', 'imagem', 'marca_id', 'tipo_id', 'cor', 'festas_id', 'adicionado', 'cpf', 'telefone', 'nascimento', 'final_cartao', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'numero_pedido'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
   
    public function tipo() {
        return $this->belongsTo('App\Models\ProdutosTipos');
    }

	public function marca() {
		return $this->belongsTo('App\Models\ProdutosMarcas');
	}

    public function lojas() {
        return $this->hasMany('App\Models\ProdutosLojas');
    }
}
