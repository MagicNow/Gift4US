<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festas extends Model {

	protected $fillable = ['nome', 'idade_anos', 'idade_meses', 'festa_dia', 'festa_mes', 'festa_ano', 'festa_hora', 'festa_minuto', 'foto', 'step'];

	protected $dates = ['deleted_at'];
	
	protected $hidden = [
		'created_at',
		'updated_at',
	];
}