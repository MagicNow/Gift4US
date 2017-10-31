<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmacaoPresenca extends Model {
	protected $dates = ['deleted_at'];

	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $fillable = ['nome', 'email', 'numero_pessoas', 'festas_id'];

    public function festa() {
        return $this->belongsTo('App\Models\Festas');
    }
}
