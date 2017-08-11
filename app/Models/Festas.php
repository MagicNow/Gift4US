<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festas extends Model {

	protected $fillable = ['nome', 'sexo', 'clientes_id', 'idade_anos', 'idade_meses', 'festa_dia', 'festa_mes', 'festa_ano', 'festa_hora', 'festa_minuto', 'foto', 'confirma_presenca', 'endereco', 'endereco_latitude', 'endereco_longitude', 'referencia', 'referencia_latitude', 'referencia_longitude', 'observacoes', 'ciclo_vida', 'tamanho_camiseta', 'tamanho_calca', 'tamanho_sapato', 'observacoes_2', 'layout_id', 'receber_recados', 'step'];

	protected $dates = ['deleted_at'];
	
	protected $hidden = [
		'created_at',
		'updated_at',
	];

    public function cliente() {
        return $this->hasOne('App\Models\Clientes');
    }
}