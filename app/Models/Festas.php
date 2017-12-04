<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festas extends Model {

	protected $fillable = ['nome', 'sexo', 'clientes_id', 'idade_anos', 'idade_meses', 'festa_dia', 'festa_mes', 'festa_ano', 'festa_hora', 'festa_minuto', 'foto', 'confirma_presenca', 'endereco', 'endereco_latitude', 'endereco_longitude', 'referencia', 'referencia_latitude', 'referencia_longitude', 'observacoes', 'ciclo_vida', 'tamanho_camiseta', 'tamanho_calca', 'tamanho_sapato', 'observacoes_2', 'layout_id', 'receber_recados', 'step', 'codigo', 'slug', 'ativo'];

	protected $dates = ['deleted_at'];
	
	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $softDelete = true;

	public function cliente() {
		return $this->hasOne('App\Models\Clientes');
	}

	public function layout() {
		return $this->belongsTo('App\Models\FestasLayouts');
	}

	public function produto() {
		return $this->belongsToMany('App\Models\Produtos')
					->withPivot('nome', 'email', 'rg', 'mensagem');
	}

	public function tipo() {
		return $this->belongsToMany('App\Models\ProdutosTipos');
	}

    public function cotas() {
        return $this->hasMany('App\Models\Cotas', 'festa_id');
    }

    public function confirmacaoPresenca() {
        return $this->hasMany('App\Models\ConfirmacaoPresenca');
    }

    public function mensagem() {
        return $this->hasMany('App\Models\Mensagem');
    }

    public function lista() {
        return $this->hasMany('App\Models\FestasLista');
    }
}