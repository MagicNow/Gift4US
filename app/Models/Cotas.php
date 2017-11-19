<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotas extends Model {
    protected $dates = ['deleted_at'];

	protected $fillable = ['foto', 'nome', 'observacao', 'valor_total', 'dividir_cota', 'quantidade_cotas', 'festa_id'];

    public function festa() {
        return $this->belongsTo('App\Models\Festas');
    }
}
