<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FestasLista extends Model {
    protected $dates = ['deleted_at'];

	protected $fillable = ['email'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

	public function festa() {
		return $this->belongsTo('App\Models\Festas', 'festas_id');
	}
}
