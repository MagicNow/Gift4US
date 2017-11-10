<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model {
	protected $table = 'mensagens';

	protected $dates = ['deleted_at'];

	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $fillable = ['nome', 'mensagem'];

    public function festa() {
        return $this->belongsTo('App\Models\Festas');
    }
}
